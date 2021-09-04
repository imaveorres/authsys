<?php
require '../config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// POST login
if(isset($_POST['action']) && $_POST['action'] == 'login') {
    session_start();
    loginUser($conn);
}
// POST register
if(isset($_POST['action']) && $_POST['action'] == 'register') {
    registerUser($conn);
}
// POST forgot
if(isset($_POST['action']) && $_POST['action'] == 'forgot') {
    session_start();
    forgotPassword($conn);
}

// register method
function registerUser($conn) {
    $name = checkInput($_POST['name']);
    $uname = checkInput($_POST['uname']);
    $email = checkInput($_POST['email']);
    $pass = checkInput(sha1($_POST['pass']));
    $cpass = checkInput(sha1($_POST['cpass']));
    $created_at = date('Y-m-d');
    if($pass != $cpass){
        echo 'Password did not match!';
        exit();
    }else{
        $stmt_sql_select_query = $conn->prepare("SELECT username, email FROM users WHERE username=? OR email=?");
        $stmt_sql_select_query->bind_param('ss', $uname,$email);
        $stmt_sql_select_query->execute();
        $result = $stmt_sql_select_query->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row['username'] == $uname){
            echo 'The username is already exist!';
        }else if($row['email'] == $email){
            echo 'The email is already exist!';
        }else{
            $stmt_sql_insert_query = $conn->prepare("INSERT INTO users (name,username,email,pass,created_at) VALUES (?,?,?,?,?)");
            $stmt_sql_insert_query->bind_param('sssss', $name,$uname,$email,$pass,$created_at);
            $stmt_sql_insert_query->execute();
            $stmt_sql_select_query->close();
            echo 'Registered Successfully.';
        }
    }
    exit();
}

// login method
function loginUser($conn) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $stmt_sql_login_query = $conn->prepare("SELECT * FROM users WHERE username=? AND pass=?");
    $stmt_sql_login_query->bind_param('ss', $username,$password);
    $stmt_sql_login_query->execute();
    $user = $stmt_sql_login_query->fetch();
    $stmt_sql_login_query->close();
    if($user != NULL){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        userLogs($username,$password,$conn);
        rememberMe($username,$password);
    }else{
        echo 'Login failed! Check your username and password!';
        exit();
    }
}

// user-logs method
function userLogs($username,$password,$conn) {
    $stmt_sql_select_query = $conn->prepare("SELECT * FROM users WHERE username=? AND pass=?");
    $stmt_sql_select_query->bind_param('ss', $username,$password);
    $stmt_sql_select_query->execute();
    $result = $stmt_sql_select_query->get_result();
    $row = $result->fetch_array(MYSQLI_ASSOC);
    
    $user_id = $row['ID'];
    $user_username = $row['username'];
    $stmt_sql_insert_query = $conn->prepare("INSERT INTO logs (username,user_id) VALUES (?,?)");
    $stmt_sql_insert_query->bind_param('si', $user_username,$user_id);
    $stmt_sql_insert_query->execute();

    $stmt_sql_insert_query->close();
    $stmt_sql_select_query->close();
}

// remember-me method 
function rememberMe($username,$password) {
    if(!empty($_POST['remember-me'])){
        setcookie("username",$username,time()+(10*365*24*60*60));
        setcookie("password",$password,time()+(10*365*24*60*60));
    }else{
        if(isset($_COOKIE['username'])){
            setcookie('username','');
        }
        if(isset($_COOKIE['password'])){
            setcookie('password','');
        }
    }
}

// forgot-password method
function forgotPassword($conn) {
    $femail = $_POST['femail'];
    $stmt_sql_select_query = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt_sql_select_query->bind_param('s', $femail);
    $stmt_sql_select_query->execute();
    $result = $stmt_sql_select_query->fetch();
    $stmt_sql_select_query->close();
    if($result >= 1){
        $token = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = str_shuffle($token);
        $token = substr($token,0,50);
        $generated_token_result = $token;
        $stmt_sql_update_query = $conn->prepare("UPDATE users SET token=?, token_expire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE email=?");
        $stmt_sql_update_query->bind_param('ss', $generated_token_result,$femail);
        $stmt_sql_update_query->execute();
        $stmt_sql_update_query->close();
        sendEmail($generated_token_result,$femail);
    }else{
        echo 'Sorry, this email does not exist!';
    }
}

// send-email method - forgot-password link
function sendEmail($generated_token_result,$femail) {
    $mail = new PHPMailer(true);
    try{
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'sample@gmail.com';
        $mail->Password = 'secret';
        $mail->SMTPSecure = 'TLS';
        $mail->Port = 587;

        $mail->setFrom('kimpng36@gmail.com', 'Sender');
        $mail->addAddress($femail);

        $mail->isHTML(true);
        $mail->Subject = 'Your request reset password.';
        $mail->Body = "<h4>Follow the link below to reset your password.<br><a href='http://localhost/login-system-php/reset_password.php?email=$femail&token=$generated_token_result'>http://localhost/login-system-php/reset_password.php?email={$femail}&token={$generated_token_result}</a></h4>";
        $mail->send();
        echo "We have successfully sent the reset password link to <small>{$femail}</small>, please check your email.";
    }catch(Exception $e){
        //echo "Reset password link could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo 'Could not sent the reset password link!';
    }
}

// input validite method - to avoid sql injection
function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
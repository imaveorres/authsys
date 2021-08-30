<?php 
require 'config.php';
// POST register
if(isset($_POST['action']) && $_POST['action'] == 'register') {
    $name = checkInput($_POST['name']);
    $uname = checkInput($_POST['uname']);
    $email = checkInput($_POST['email']);
    $pass = checkInput(sha1($_POST['pass']));
    $cpass = checkInput(sha1($_POST['cpass']));
    $created_at = date('Y-m-d');
    insertUser($conn,$name,$uname,$email,$pass,$cpass,$created_at);
}
// POST login
if(isset($_POST['action']) && $_POST['action'] == 'login') {
    session_start();
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $stmt_sql_login_query = $conn->prepare("SELECT * FROM users WHERE username=? AND pass=?");
    $stmt_sql_login_query->bind_param("ss", $username,$password);
    $stmt_sql_login_query->execute();
    $user = $stmt_sql_login_query->fetch();
    rememberMe($user, $username);
}

// register method
function insertUser($conn,$name,$uname,$email,$pass,$cpass,$created_at) {
    if($pass != $cpass) {
        echo 'Password did not match!';
        exit();
    }else{
        $stmt_sql_select_query = $conn->prepare("SELECT username, email FROM users WHERE username=? OR email=?");
        $stmt_sql_select_query->bind_param("ss", $uname,$email);
        $stmt_sql_select_query->execute();
        $result = $stmt_sql_select_query->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);
        // Warning: Trying to access array offset on value of type null in line 54 & 56 (in higher version of PHP)
        if($row['username'] == $uname) {
            echo 'This username is already exist!';
        }else if($row['email'] == $email) {
            echo 'This email is already exist!';
        }else{
            $stmt_sql_insert_query = $conn->prepare("INSERT INTO users (name,username,email,pass,created_at) VALUES (?,?,?,?,?)");
            $stmt_sql_insert_query->bind_param("sssss", $name,$uname,$email,$pass,$created_at);
            if($stmt_sql_insert_query->execute()) {
                echo 'Registered Successfully.';
            }else{
                echo 'Something went wrong!';
            }
        }
    }
}

// remember-me method 
function rememberMe($user, $username) {
    if($user != NULL) {
        $_SESSION['username'] = $username;
        echo 'Session successfully set for user.';
        if(!empty($_POST['remember-me'])) {
            setcookie("username", $_POST['username'],time()+(10*365*24*60*60));
            setcookie("password", $_POST['password'],time()+(10*365*24*60*60));
        }else{
            if(isset($_COOKIE['username'])) {
                setcookie('username','');
            }
            if(isset($_COOKIE['password'])) {
                setcookie('password','');
            }
        }
    }else{
        echo 'Login failed! Check your username and password!';
    }
}

// input validite method - to avoid sql injection
function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
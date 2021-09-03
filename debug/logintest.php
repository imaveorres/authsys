<?php 
require 'config.php';
// POST login
if(isset($_POST['login'])) {
    session_start();
    loginUser($conn);
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
        rememberMe($username,$password,$conn);
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
function rememberMe($username,$password,$conn) {
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

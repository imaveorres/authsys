<?php 
require 'config.php';
if(isset($_POST['action']) && $_POST['action'] == 'register') {
    $name = checkInput($_POST['name']);
    $uname = checkInput($_POST['uname']);
    $email = checkInput($_POST['email']);
    $pass = checkInput(sha1($_POST['pass']));
    $cpass = checkInput(sha1($_POST['cpass']));
    $created_at = date('Y-m-d');
    if($pass != $cpass) {
        echo 'Password did not match!';
        exit();
    }else{
       insertUser($conn,$name,$uname,$email,$pass,$created_at);
    }
}

// user 
function insertUser($conn,$name,$uname,$email,$pass,$created_at) {
    $sql_query = $conn->prepare("SELECT username, email FROM users WHERE username=? OR email=?");
    $sql_query->bind_param("ss", $uname,$email);
    $sql_query->execute();
    $result = $sql_query->get_result();
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if($row['username'] == $uname) {
        echo 'This username is already exist!';
    }else if($row['email'] == $email) {
        echo 'This email is already exist!';
    }else{
        $stmt = $conn->prepare("INSERT INTO users (name,username,email,pass,created_at) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $name,$uname,$email,$pass,$created_at);
        if($stmt->execute()) {
            echo 'Registered Successfully.';
        }else{
            echo 'Something went wrong!';
        }
    }
}

// input validity - avoid sql injection
function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
<?php
require '../config/config.php';
$msg = '';
if(isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];
    $stmt_sql_select_query = $conn->prepare("SELECT * FROM users WHERE email=? AND token=? AND token<>'' AND token_expire > NOW()");
    $stmt_sql_select_query->bind_param('ss', $email,$token);
    $stmt_sql_select_query->execute();
    $result = $stmt_sql_select_query->get_result();
    if($result->num_rows > 0) {
        $stmt_sql_select_query->close();
        if(isset($_POST['reset'])){
            $newpass = sha1($_POST['newpass']);
            $cnewpass = sha1($_POST['cnewpass']);
            if($newpass == $cnewpass){
                $stmt_sql_update_query = $conn->prepare("UPDATE users SET pass=?, token='' WHERE email=?");
                $stmt_sql_update_query->bind_param('ss', $newpass,$email);
                $stmt_sql_update_query->execute();
                $msg = "Password changed successfully!<br><a class='text-decoration-none' href='../index.php'>Login here.</a>";
            }else{
                echo 'Password did not match!';
                exit();
            }
            $stmt_sql_update_query->close();
        }
    }else{
        header('location: ../index.php');
        exit();
    }
}else{
    header('location: ../index.php');
    exit();
}
?>
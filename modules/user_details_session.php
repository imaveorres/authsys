<?php
require 'config/config.php';
session_start();
$user = $_SESSION['username'];
$stmt_sql_select_query = $conn->prepare("SELECT * FROM users WHERE username=?");
$stmt_sql_select_query->bind_param('s', $user);
$stmt_sql_select_query->execute();
$result = $stmt_sql_select_query->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);

$username = $row['username'];
$name = $row['name'];
$email = $row['email'];
$created_at = $row['created_at'];
if(!isset($user)) {
    header('location: ./index.php');
}
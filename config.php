<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '62699';
$dbname = 'login_system_php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($conn->connect_error) {
    die("Server error!" . mysqli::$connect_error);
}
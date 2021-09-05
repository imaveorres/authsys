<?php 
session_start();
if(isset($_SESSION['username'])) {
    header('location:profile.php');
}

require 'resources/login.php';

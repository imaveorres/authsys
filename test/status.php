<?php
require 'logintest.php'; 
session_start();
if(isset($_SESSION['username'])) {
    header('location: ../profile.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <!-- login form -->
     <div class="row">
            <div class="col-lg-5 mx-auto" id="login-box">
                <form class="p-4 p-md-4 border rounded-3 bg-light" id="login-frm" method="post">
                    <div class="form-group mb-2 form-floating">
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>" minlength="3" required>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>" class="form-control" minlength="6" required>
                    </div>
                    <div class="form-group mb-2">
                        <div class="custom-control custom-checkbox">
                            <div class="row">
                                <div class="col-lg-6 text-start align-middle">
                                    <input type="checkbox" name="remember-me" class="custom-control-input" id="customCheck" <?php if(isset($_COOKIE['username'])){ ?>checked<?php } ?>>
                                    <label for="customCheck" class="custom-control-label"><small>Remember me</small></label>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <a href="#" id="forgot-btn" class="fw-light text-decoration-none"><small>Forgot password?</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <input type="submit" name="login" id="login" value="Login" class="form-control btn btn-primary btn-block">
                    </div>
                    <div class="form-group">
                        <small><p class="text-center">No have an account? <a href="#" id="register-btn" class="text-decoration-none"">Register here.</a></p></small> 
                    </div>
                </form>
            </div>
        </div>
</body>
</html>
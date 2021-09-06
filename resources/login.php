<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'templates/headmeta.php'; ?>
</head>
<body class="bg-white">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 offset-lg-4" id="alert">
                <div class="alert alert-success alert-shown">
                    <strong id="result">Hello World!</strong>
                </div>
            </div>
        </div>
        <div class="text-center preloader">
            <img src="assets/image/preloader.gif" alt="" class="m-2" id="loader">
        </div>
        <!-- login form -->
        <div class="row">
            <div class="col-lg-5 mx-auto" id="login-box">
                <form class="p-4 p-md-4 border rounded-3 bg-light" id="login-frm">
                    <div class="form-group mb-2 form-floating">
                        <div class="form-group">
                            <!-- <label for="username" class="form-label">Username</label> -->
                            <input type="text" name="username" id="username" class="form-control" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>" minlength="3" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <!-- <label for="password" class="form-label">Password</label> -->
                        <input type="password" name="password" id="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>" class="form-control" minlength="6" placeholder="Password" required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="submit" name="login" id="login" value="Login" class="form-control btn btn-primary btn-block">
                    </div>
                    <div class="form-group mb-2">
                        <div class="custom-control custom-checkbox">
                            <!-- <div class="row">
                                <div class="col-lg-6 text-start align-middle invisible">
                                    <input type="checkbox" name="remember-me" class="custom-control-input" id="customCheck" <?php if(isset($_COOKIE['username'])){ ?>checked<?php } ?>>
                                    <label for="customCheck" class="custom-control-label"><small>Remember me</small></label>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <a href="forgot.php" id="forgot-btn" class="fw-light text-decoration-none"><small>Forgot password?</small></a>
                                </div>
                            </div> -->
                        </div>
                        <div class="text-center">
                            <a href="forgot.php" id="forgot-btn" class="fw-light text-decoration-none"><small>Forgot password?</small></a>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0px;">
                            <small><p class="text-center">No have an account? <a href="register.php" id="register-btn" class="text-decoration-none"">Register here.</a></p></small> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require 'templates/scriptscdn.php' ?>
</body>
</html>
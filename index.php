<?php 
session_start();
if(isset($_SESSION['username'])) {
    header('location:profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login System - PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- internal custom sytle -->
    <style>
        #alert,#register-box,#forgot-box,#loader{display: none;}
    </style>
</head>
<body class="bg-white">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 offset-lg-4" id="alert">
                <div class="alert alert-success">
                    <strong id="result">Hello World!</strong>
                </div>
            </div>
        </div>
        <div class="text-center">
            <img src="src/image/preloader.gif" alt="" class="m-2" id="loader">
        </div>
        <!-- login form -->
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
                <h2 class="text-center mt-2">Login</h2>
                <form class="p-2" id="login-frm">
                    <div class="form-group">
                        <input type="text" name="username" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>" class="form-control" minlength="3" placeholder="Username" required>
                    </div>
                    <div class="form-group pt-3">
                        <input type="password" name="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>" class="form-control" minlength="6" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox p-2">
                            <input type="checkbox" name="remember-me" class="custom-control-input" id="customCheck" <?php if(isset($_COOKIE['username'])){ ?>checked<?php } ?>>
                            <label for="customCheck" class="custom-control-label">Remember Me</label>
                            <a href="#" id="forgot-btn" class="float-right">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <input type="submit" name="login" id="login" value="Login" class="form-control btn btn-primary btn-block">
                    </div>
                    <div class="form-group pt-2">
                        <p class="text-center">New User? <a href="#" id="register-btn">Register Here</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!-- register form -->
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
                <h2 class="text-center mt-2">Register</h2>
                <form action="" class="p-2" id="register-frm">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" minlength="3" placeholder="Full Name" required>
                    </div>
                    <div class="form-group pt-3">
                        <input type="text" name="uname" class="form-control" minlength="3" placeholder="Username" required>
                    </div>
                    <div class="form-group pt-3">
                        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="form-group pt-3">
                        <input type="password" name="pass" class="form-control" id="pass" minlength="6" placeholder="Password" required>
                    </div>
                    <div class="form-group pt-3">
                        <input type="password" name="cpass" class="form-control" id="cpass" minlength="6" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox p-2">
                            <input type="checkbox" name="rem" class="custom-control-input" id="customCheck2">
                            <label for="customCheck2" class="custom-control-label">I agree to the <a href="">terms & conditions.</label>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <input type="submit" name="register" id="register" value="Register" class="form-control btn btn-primary btn-block">
                    </div>
                    <div class="form-group pt-2">
                        <p class="text-center">Already Registered? <a href="#" id="login-btn">Login Here</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!-- forgot password form -->
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="forgot-box">
                <h2 class="text-center mt-2">Reset Password</h2>
                <form action="" class="p-2" id="forgot-frm">
                    <div class="form-group">
                        <small class="text-muted">
                            To reset your password, enter your email address and we will send you a reset password link.
                        </small>
                    </div>
                    <div class="form-group">
                        <input type="email" name="femail" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="form-group pt-2">
                        <input type="submit" name="forgot" id="forgot" value="Reset" class="form-control btn btn-primary btn-block">
                    </div>
                    <div class="form-group pt-2 text-center">
                       <a href="#" id="back-btn">Back</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="src/js/jquery.js"></script>
</body>
</html>
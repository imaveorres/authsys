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
    <!-- custom sytle -->
    <link rel="stylesheet" href="src/css/main.css">
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
            <img src="src/image/preloader.gif" alt="" class="m-2" id="loader">
        </div>
        <!-- login form -->
        <div class="row">
            <div class="col-lg-5 mx-auto" id="login-box">
                <form class="p-4 p-md-4 border rounded-3 bg-light" id="login-frm">
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

        <!-- register form -->
        <div class="row">
            <div class="col-lg-4 mx-auto bg-light border" id="register-box">
                <h2 class="text-center mt-2">Register</h2>
                <form action="" class="p-2 p-md-3" id="register-frm">
                    <div class="form-group mb-2">
                        <input type="text" name="name" class="form-control" minlength="3" placeholder="Full Name" required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="uname" class="form-control" minlength="3" placeholder="Username" required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="password" name="pass" class="form-control" id="pass" minlength="6" placeholder="Password" required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="password" name="cpass" class="form-control" id="cpass" minlength="6" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group mb-2">
                        <p class="text-start"><small>Already have an account? <a href="#" id="login-btn" class="text-decoration-none">Login here.</a></small></p>
                    </div>
                    <div class="form-group mb-2">
                        <input type="submit" name="register" id="register" value="Register" class="form-control btn btn-primary btn-block">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox text-center">
                            <input type="checkbox" name="rem" class="custom-control-input" id="customCheck2">
                            <label for="customCheck2" class="custom-control-label"><small>I agree to the <a href="#" class="text-decoration-none">Terms & Conditions.</small></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- forgot password form -->
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="forgot-box">
                <h2 class="text-center mt-2">Reset Password</h2>
                <form action="" class="pb-2 p-2 p-md-2 pb-md-2" id="forgot-frm">
                    <div class="form-group mb-2">
                        <small class="text-muted">
                            To reset your password, enter your email address and we will send you a password reset link.
                        </small>
                    </div>
                    <div class="form-group mb-1">
                        <input type="email" name="femail" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="submit" name="forgot" id="forgot" value="Reset" class="form-control btn btn-primary btn-block">
                    </div>
                    <div class="form-group mb-2 text-center">
                       <a href="#" class="text-decoration-none" id="back-btn"><small>Back</small></a>
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
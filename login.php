<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                    <div class="form-group">
                        <small><p class="text-center">No have an account? <a href="register.php" id="register-btn" class="text-decoration-none"">Register here.</a></p></small> 
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
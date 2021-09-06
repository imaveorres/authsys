<!DOCTYPE html>
<html lang="en">
<head>
    <?php require './resources/templates/headmeta.php'; ?>
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
                        <p class="text-start"><small>Already have an account? <a href="index.php" id="login-btn" class="text-decoration-none">Login here.</a></small></p>
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
    </div>
    <?php require './resources/templates/scriptscdn.php'; ?>
</body>
</html>
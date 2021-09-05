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
            <img src="src/image/preloader.gif" alt="" class="m-2" id="loader">
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
                       <a href="index.php" class="text-decoration-none" id="back-btn"><small>Back</small></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require './resources/templates/scriptscdn.php'; ?>
</body>
</html>
<?php require '../modules/reset_password.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'templates/headmeta.php'; ?>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 mt-5">
                <div id="mssg-success">
                    <h4 class="text-center lead" id="mssg-success-reset"><?= $msg; ?></h4>
                </div>
                <div class="text-center preloader">
                    <img src="src/image/preloader.gif" alt="" class="m-2" id="loader">
                </div>
                <h5 class="text-center display-6 text-dark p-2 rounded">Reset your password here!</h3>
                <form action="" id="resetpassword-frm" method="post">
                    <div class="form-group mb-2">
                        <!-- <label for="password" class="form-label">Enter New Password</label> -->
                        <input type="password" name="newpass" id="newpass" class="form-control" minlength="6" placeholder="New password" required>
                    </div>
                    <div class="form-group mb-2">
                        <!-- <label for="password" class="form-label">Confirm New Password</label> -->
                        <input type="password" name="cnewpass" id="cnewpass" class="form-control" minlength="6" placeholder="Confirm new password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="reset" id="reset" value="Reset Password" class="btn btn-success btn-block form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require 'templates/scriptscdn.php' ?>
</body>
</html>
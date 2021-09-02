<?php require 'reset_password_conf.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="src/css/main.css">
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
                        <label for="password" class="form-label">Enter New Password</label>
                        <input type="password" name="newpass" id="newpass" class="form-control" minlength="6" placeholder="New password" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password" class="form-label">Confirm New Password</label>
                        <input type="password" name="cnewpass" id="cnewpass" class="form-control" minlength="6" placeholder="Confirm new password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="reset" id="reset" value="Reset Password" class="btn btn-success btn-block form-control">
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
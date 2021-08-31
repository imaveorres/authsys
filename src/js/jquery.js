
// hide & show
$(document).ready(function() {
    $('#register-btn').click(function() {
        $('#register-box').show();
        $('#login-box').hide();
    });
    $('#login-btn').click(function() {
        $('#register-box').hide();
        $('#login-box').show();
    });
    $('#forgot-btn').click(function() {
        $('#forgot-box').show();
        $('#login-box').hide();
    });
    $('#back-btn').click(function() {
        $('#forgot-box').hide();
        $('#login-box').show();
    });

    // form validate
    $('#login-frm').validate();
    $('#register-frm').validate({
        rules: {
            cpass: {
                equalTo: '#pass'
            }
        }
    });
    $('#forgot-frm').validate();
    $('#resetpassword-frm').validate({
        rules: {
            cnewpass: {
                equalTo: '#newpass'
            }
        }
    });

    /* submit form asynchronous */
    // register form - post request
    $('#register').click(function(e) {
        if(document.querySelector('#register-frm').checkValidity()) {
            e.preventDefault();
            $('#loader').show();
            $.ajax({
                url: 'action.php',
                method: 'post',
                data: $('#register-frm').serialize()+'&action=register',
                success: function(res) {
                    $('#alert').show();
                    $('#result').html(res);
                    $('#loader').hide();
                }
            });
            return true;
        }
    });
    // login form - post request
    $('#login').click(function(e) {
        if(document.querySelector('#login-frm').checkValidity()) {
            e.preventDefault();
            $('#loader').show();
            $.ajax({
                url: 'action.php',
                method: 'post',
                data: $('#login-frm').serialize()+'&action=login',
                success: function(res) {
                    if(res === 'Session successfully set for user.') {
                        window.location = 'profile.php';
                    }else{
                        $('#alert').show();
                        $('#result').html(res);
                        $('#loader').hide();
                    }
                }
            });
            return true;
        }
    });
    // forgot-password form - post request
    $('#forgot').click(function(e) {
        if(document.querySelector('#forgot-frm').checkValidity()) {
            e.preventDefault();
            $('#loader').show();
            $.ajax({
                url: 'action.php',
                method: 'post',
                data: $('#forgot-frm').serialize()+'&action=forgot',
                success: function(res) {
                    $('#alert').show();
                    $('#result').html(res);
                    $('#loader').hide();
                }
            });
            return true;
        }
    });
});


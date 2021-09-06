$(document).ready(function() {
    // hide & show
    /*$('#register-btn').click(function() {
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
    });*/
    // check current url for title page
    let curr_url = window.location.href;
    if(curr_url === 'https://localhost/login-system-php/index.php') {
        document.title = 'Login';
    }else if(curr_url === 'https://localhost/login-system-php/register.php'){
        document.title = 'Register';
    }else if(curr_url === 'https://localhost/login-system-php/forgot.php'){
        document.title = 'Forgot';
    }else if(curr_url === 'https://localhost/login-system-php/profile.php'){
        document.title = 'Profile';
    }else{
        document.title = 'Web Login System';
    }

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
    // login form - post request
    $('#login').click(function(e) {
        if(document.querySelector('#login-frm').checkValidity()){
            e.preventDefault();
            $('#loader').show(80);
            $('#login').attr('disabled', true);
            $.ajax({
                url: './modules/action.php',
                method: 'post',
                data: $('#login-frm').serialize()+'&action=login',
                success: function(res) {
                    if(res === 'Login failed! Check your username and password!') {
                        $('.alert').removeClass('alert-success');
                        $('.alert').addClass('alert-danger');
                        $('.alert').show(80);
                        setTimeout(function(){
                            $('.alert').hide(200);
                        }, 2000);
                    }else{
                        $('.alert').css('display','none');
                        window.location = 'profile.php';
                    }
                    $('#login').attr('disabled',false);
                    $('#alert').show();
                    $('#result').html(res);
                    $('#loader').hide(200);
                }
            });
            return true;
        }
    });
    // logout method
    $('#logout').click(function(e) {
        e.preventDefault();
        $('body,html').css('opacity', '0.4');
        $.ajax({   
            url: './modules/logout.php',
            method: 'get',
            success: function(res){
                if(res === 'logout'){
                    window.location = 'index.php';
                }
            }
        });
    });
    // register form - post request
    $('#register').click(function(e) {
        if(document.querySelector('#register-frm').checkValidity()){
            e.preventDefault();
            $('#loader').show(80);
            $('#register').attr('disabled', true);
            $.ajax({
                url: './modules/action.php',
                method: 'post',
                data: $('#register-frm').serialize()+'&action=register',
                success: function(res) {
                    if(res === 'Password did not match!' || res === 'The username is already exist!' || res === 'The email is already exist!') {
                        $('.alert').removeClass('alert-success');
                        $('.alert').addClass('alert-danger');
                        $('.alert').show(80);
                        setTimeout(function(){
                            $('.alert').hide(200);
                        }, 2000);
                    }else{
                        $('.alert').css('display','none');
                        setTimeout(function() {
                            // $('#login-btn').trigger('click');
                            window.location = 'index.php';
                        }, 1000);
                    }
                    $('#register').attr('disabled', false);
                    $('#alert').show();
                    $('#result').html(res);
                    $('#loader').hide(200);
                }
            });
            return true;
        }
    });
    // forgot-password form - post request
    $('#forgot').click(function(e) {
        if(document.querySelector('#forgot-frm').checkValidity()){
            e.preventDefault();
            $('#loader').show();
            $('#forgot').attr('disabled',true);
            $.ajax({
                url: './modules/action.php',
                method: 'post',
                data: $('#forgot-frm').serialize()+'&action=forgot',
                success: function(res) {
                    if(res === 'Sorry, this email does not exist!' || res === 'Could not sent the reset password link!') {
                        $('.alert').removeClass('alert-success');
                        $('.alert').addClass('alert-danger');
                        $('.alert').show(30);
                        setTimeout(function(){
                            $('.alert').hide(100);
                        }, 2000);
                    }else{
                        $('.alert').removeClass('alert-danger');
                        $('.alert').addClass('alert-success');
                        $('.alert').show(30);
                        setTimeout(function(){
                            $('.alert').hide(100);
                        },5000);
                    }
                    $('#forgot').attr('disabled',false);
                    $('#alert').show();
                    $('#result').html(res);
                    $('#loader').hide();
                }
            });
            return true;
        }
    });
});


$(document).ready(function() {
    $("#register-btn").click(function() {
        $("#register-box").show();
        $("#login-box").hide();
    });
    $("#login-btn").click(function() {
        $("#register-box").hide();
        $("#login-box").show();
    });
    $("#forgot-btn").click(function() {
        $("#forgot-box").show();
        $("#login-box").hide();
    });
    $("#back-btn").click(function() {
        $("#forgot-box").hide();
        $("#login-box").show();
    });

    $("#login-frm").validate();
    $("#register-frm").validate({
        rules: {
            cpass: {
                equalTo: "#pass"
            }
        }
    });

    $("#forgot-frm").validate();
});
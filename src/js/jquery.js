
// hide & show
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

    // form validate
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

// submit form asynchronous
$(document).ready(function(e) {
    if(document.querySelector("#register-frm").checkValidity()) {
        e.preventDefault();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: $("register-frm").serialize()+"&action=register",
            success: function(res) {
                $("#alert").show();
                $("#result").html(res);
            }
        });
        return true;
    }
});
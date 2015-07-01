$(document).ready(function () {

    // add code to read/write cookie for username if remember me is selected

    $("#login").click(function () {
        var email = $("#email").val();
        var password = $("#password").val();
        // Checking for blank fields.
        if (email == '' || password == '') {
            $('input[id="email"],input[id="password"]').css({
                "border": "2px solid red", "box-shadow": "0 0 3px red"}
            );
            alert("Please fill all fields...!!!!!!");
        } else {
            // Add base64 encryption to password
            $.post("login.php", {email: email, password: password},
                function (data) {
                    if (data == 'EMAIL.INVALID') {
                        $('input[id="email"]').css({
                            "border": "2px solid red",
                            "box-shadow": "0 0 3px red"
                        });
                    } else if (data == 'LOGIN.FAILURE') {
                        $('input[id="email"],input[id="password"]').css({
                            "border": "2px solid red",
                            "box-shadow": "0 0 3px red"
                        });
                    } else if (data == 'LOGIN.SUCCESS') {
                        $("form")[0].reset();
                        $('input[id="email"],input[id="password"]').css({
                            "border": "2px solid #00F5FF",
                            "box-shadow": "0 0 5px #00F5FF"
                        });
                    } else {
                        //NO Operation
                    }
                });
        }
    });
});
$(document).on("click","#signin",function(){
    
    setCookie("email", $("#email").val(), 7);
    setCookie("password", $("#password").val(), 7);

    $.ajax({
        url:"inc/request.php",
        type:"post",
        data:{type:"signin",email:$("#email").val(),pass:$("#password").val()},
        success:function(logdata){
            logdata = logdata.trim();

            if(logdata=="done"){
                if (confirm("Signin successfully.")) {
                    window.location.replace("home.php#m=log");
                }
            }else{
                //oops
                if (confirm("Please enter a valid email and password.")) {
                    
                }
            }
        }
    });

});

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + encodeURIComponent(value) + expires + "; path=/";
}

$(document).on("click", "#register_now", function() {

    
    var email = $("#email").val();
    var password = $("#password").val();
    var username = $("#username").val();

    
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return;
    }else{
        setCookie("email", email, 7);
        setCookie("password", password, 7);
    
        $.ajax({
            url: "inc/request.php",
            type: "post",
            data: {
                type: "register",
                email: email,
                pass: password,
                username: username
            },
            success: function(logdata) {
                logdata = logdata.trim();
    
                if (logdata == "done") {
                    if (confirm("User registered successfully.")) {
                        window.location.replace("home.php#m=log");
                    }
                } else {
                    if (confirm("Please enter a valid email and password.")) {
                      
                    }
                }
            }
        });
    }

});

function login() {
    var password = hex_sha1($("#password").val());
    $.post("../php/login.php", {
        action: "admin_login",
        password: password
    }, function(data) {
        if(data.status == 0) {
                window.location = "index.php";
            }
        } else {
            $(".alert").fadeIn();
        }
    });
    return false;
}
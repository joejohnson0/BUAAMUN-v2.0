function login() {
    
    var username = $("#username").val();
    var password = hex_sha1($("#password").val());
    $.ajax({
            url: "../php/login.php",
            type: "POST",
            data: {
                "action": "munc_login",
                "school": username,
                "password": password
            },
            dataType: "json"
    }).done(function(data) {
        if(data['status'] == 0) {
            
                window.location="index.php";
        } else {
alert(data['msg']);
            $(".alert").fadeIn();
        }
    });
    return false;
}
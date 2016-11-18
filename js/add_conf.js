$(document).ready(function() {
    var fields_count = 1;
    var field_template = $(".field-template").html();

    $("#add").click(function() {
        $("#form-body").append(field_template);
        fields_count++;
        if (fields_count == 2) {
            $("#delete").fadeIn();
        }
    });

    $("#delete").click(function() {
        if (fields_count > 1) {
            $("#form-body .well").last().remove();
            fields_count--;
            if (fields_count == 1) {
                $("#delete").fadeOut();
            }
        }
    });

    $("#submit").click(function() {
        var conf = [];
        $("#form-body .well").each(function(){
            conf.push({
                "name" : $("this").find(".name").val(),
                "venue" : $("this").find(".venue").val(),
                "time" : $("this").find(".time").val(),
                "ddl" : $("this").find(".ddl").val(),
                "fee" : $("this").find(".fee").val(),
                "committee" : $("this").find(".committee").val(),
                "status" : "1"
            });
        });
        $.ajax({
                url: "../../php/backstage.php",
                type: "POST",
                data: {
                    "action" : "add_conf",
                    "conf" : conf
                },
                dataType: "json"
            }).done(function(data) {
                switch (data["status"]) {
                    case 0: //success
                        alert("添加成功！");
                        window.location.reload(true);
                        break;
                    case -1: //error
                        alert(data["msg"]);
                        break;
                    default:
                        break;
                }
            });
    });
});
$(document).ready(function() {
    var conf = [];
    $.ajax({
            url: "../../php/backstage.php",
            type: "POST",
            data: {
                "action" : "get_conf"
            },
            dataType: "json"
    }).done(function(data) {
        conf = data;
    });

    $(".edit-btn").click(function() {
        var i=$('.edit-btn').index(this);

        $("#modal-body").find(".name").val(conf[i]['name']);
        $("#modal-body").find(".venue").val(conf[i]['venue']);
        $("#modal-body").find(".time").val(conf[i]['time']);
        $("#modal-body").find(".ddl").val(conf[i]['ddl']);
        $("#modal-body").find(".fee").val(conf[i]['fee']);
        $("#modal-body").find(".committee").val(conf[i]['committee']);
    });

    $(".delete").click(function() {
        var i=$('.delete').index(this);
        $.ajax({
            url: "../../php/backstage.php",
            type: "POST",
            data: {
                "action" : "del_conf",
                "name" : conf[i]['name']
            },
            dataType: "json"
        }).done(function(data) {
            switch (data["status"]) {
                case 0: //success
                    alert("删除成功！");
                    window.location.reload(true);
                    break;
                case -1: //error
                    $(".alert-danger").fadeIn();
                    $(".form-group").addClass("has-error");
                    $(".glyphicon-remove").fadeIn();
                    break;
                default:
                    break;
            }
        });
    });

    $("#renew").click(function(){
        var conference = {
            "venue" : $("#modal-body").find(".venue").val(),
            "time" : $("#modal-body").find(".time").val(),
            "ddl" : $("#modal-body").find(".ddl").val(),
            "fee" : $("#modal-body").find(".fee").val(),
            "committee" : $("#modal-body").find(".committee").val()
        };

        var name = $("#modal-body").find(".name").val();

        $.ajax({
                url: "../../php/backstage.php",
                type: "POST",
                data: {
                    "action" : "edit_conf",
                    "name" : name ,
                    "conf" : conference
                },
                dataType: "json"
        }).done(function(data) {
            switch (data["status"]) {
                case 0: //success
                    alert("修改成功！");
                    window.location.reload(true);
                    break;
                case -1: //error
                    alert(data['msg']);
                    break;
                default:
                    break;
            }
        });
    });

});
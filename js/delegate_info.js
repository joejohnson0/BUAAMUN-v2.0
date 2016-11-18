$(document).ready(function() {
    var delg = [];
    $.ajax({
            url: "../php/munc.php",
            type: "POST",
            data: {
                action : "get_delg"
            },
            dataType: "json"
    }).done(function(data) {alert("ok");
        delg = data;
    });

    $(".edit-btn").click(function() {
        var i=$('.edit-btn').index($(this));

        $("#modal-body").find(".name").val(delg[i]['name']);
        $("#modal-body").find(".contact").val(delg[i]['contact']);
        $("#modal-body").find(".email").val(delg[i]['email']);
        $("#modal-body").find(".qq").val(delg[i]['qq']);

        $("#modal-body").find(".gender").find(concat(".",delg[i]['gender']).attr("selected","selected");
        $("#modal-body").find(".comm1").find(concat(".",delg[i]['comm1']).attr("selected","selected");
        $("#modal-body").find(".comm2").find(concat(".",delg[i]['comm2']).attr("selected","selected");
        $("#modal-body").find(".exp").find(concat(".",delg[i]['exp']).attr("selected","selected");
        $("#modal-body").find(".alloc").find(concat(".",delg[i]['alloc']).attr("selected","selected");
    });

    $(".delete").click(function() {
        //var i=$('.delete').index(this);
        var i=parseInt($(this).attr("id").substring(6));
        $.ajax({
            url: "../php/munc.php",
            type: "POST",
            data: {
                "action" : "del_delg",
                "serial" : i
            },
            dataType: "json"
        }).done(function(data) {
            switch (data['status']) {
                case 0: //success
                    alert("删除成功！");
                    window.location.reload(true);
                    break;
                case -1: //error
                    alert(data['msg']);
                    break;
                default:
                    break;
            }
        });
        alert(i);
    });

    $(".renew").click(function(){
        var serial = parseInt($(this).attr("id").substring(5));
        var form = $(this).parent().parent();
        var contact = form.find(".contact").val();
        var delegate = {
            "gender" : form.find(".gender").val(),
            "contact" : form.find(".contact").val(),
            "email" : form.find(".email").val(),
            "qq" : form.find(".qq").val(),
            "exp" : form.find(".exp").val(),
            "comm1" : form.find(".comm1").val(),
            "comm2" : form.find(".comm2").val(),
            "head" : form.find(".head").is(':checked') ? "1" : "0" ,
            "status" : "0"
        };
        if(contact==""){
            $('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请填写手机号码！</p></div></div></div>').insertBefore($("this")).fadeIn();
            setTimeout(function(){
                $('#alertx').fadeOut();
            },2000);
        }
        else if(contact.length!=11){
            $('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>手机号码非法！</p></div></div></div>').insertBefore($("this")).fadeIn();
            setTimeout(function(){
                $('#alertx').fadeOut();
            },2000);
        }
        else{
            $.ajax({
                    url: "../php/munc.php",
                    type: "POST",
                    data: {
                        "action" : "edit_delg",
                        "serial" : serial ,
                        "delg" : delegate
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
        }
    });

});
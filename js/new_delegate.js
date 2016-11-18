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

    $("#submit").click(function(){
        var delg = [];
        var flag = false;
        $("#form-body .well").each(function(){
            if($(this).find(".name").val()=="") alert("请填写姓名");
            else if($(this).find(".contact").val()=="") alert("请填写手机号码");
            else if($(this).find(".contact").val().length!=11) alert("手机号码非法");
            else{
                flag = true;
                delg.push({
                    "name": $(this).find(".name").val(),
                    "gender": $(this).find(".gender").val(),
                    "contact": $(this).find(".contact").val(),
                    "email": $(this).find(".email").val(),
                    "qq": $(this).find(".qq").val(),
                    "exp": $(this).find(".exp").val(),
                    "comm1": $(this).find(".comm1").val(),
                    "comm2": $(this).find(".comm2").val(),
                    "head": $(this).find(".head").is(":checked") ? "1" : "0" ,
                    "alloc": $(this).find(".alloc").val(),
                    "status": "0"
                });
            }
        });
        if(flag==true){
            $('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-success" role="alert"><p>添加成功！</p></div></div></div>').insertBefore($("#submit"));
                    
            $.ajax({
                url: "../php/munc.php",
                type: "POST",
                data: {
                    "action": "add_delg",
                    "delg": delg
                },
                dataType: "json"
            }).done(function(data) {
                $('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-success" role="alert"><p>添加成功！</p></div></div></div>').insertBefore($("#submit"));
                if(data['status']==0)
                {   
                    $('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-success" role="alert"><p>添加成功！</p></div></div></div>').insertBefore($("#submit"));
                    setTimeout(function(){
                        $('#alertx').fadeOut();
                        window.location.reload();
                    },2000);
                }
                else{

                    alert(data['msg']);
                } 
            });
        }
    });

});
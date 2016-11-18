$(document).ready(function() {    
    var comm = "" ;

    $("#enter").click(function() {
        comm = $(".name").val();
        $("#country").html("");
        var html = $("#cn_template").html();
        var num = parseInt($("#number").val());
        for(var i=1;i<=num;i++){
            $("#country").append(html);
        }
    });

    $("#submit_country").click(function() {
        var country = [];
        $(".country").each(function(){
            if($("this").val()!=""){
                country.push($("this").val());
            }
        });
        $.ajax({
                url: "../../php/backstage.php",
                type: "POST",
                data: {
                    "action" : "add_comm",
                    "comm" : comm,
                    "country" : country
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

    $(".del_comm").click(function() {
        var id = $("this").getAttribute("committee-id");
        $.ajax({
                url: "../../php/backstage.php",
                type: "POST",
                data: {
                    "action" : "del_comm",
                    "id" : id
                },
                dataType: "json"
            }).done(function(data) {
                switch (data["status"]) {
                    case 0: //success
                        alert("删除成功！");
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

    $(".del_country").click(function() {
        var id = $("this").getAttribute("country-id");
        $.ajax({
                url: "../../php/backstage.php",
                type: "POST",
                data: {
                    "action" : "del_country",
                    "id" : country_id
                },
                dataType: "json"
            }).done(function(data) {
                switch (data["status"]) {
                    case 0: //success
                        alert("删除成功！");
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

    $(".add_country").click(function() {

        var id = $("this").getAttribute("committee-id");

        $("#form-country").html("");
        var html = $("#cn_template").html();
        var num = parseInt($("this").find(".append-num").val());
        for(var i=1;i<=num;i++){
            $("#form-country").append(html);
        }
    });

    $("#submit_append").click(function() {
        
        var country = [];
        $(".country").each(function(){
            if($("this").val()!=""){
                country.push($("this").val());
            }
        });
        $.ajax({
                url: "../../php/backstage.php",
                type: "POST",
                data: {
                    "action" : "add_country",
                    "id" : id,
                    "country" : country
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
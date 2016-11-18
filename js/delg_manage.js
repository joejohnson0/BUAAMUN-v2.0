var delegate = [];
var comm = [];
var countries = [];

function entry(data) {

	var item = '<tr>';

	item += '<td>' + data["school"] + '</td>';

	item += '<td>' + data["name"] + '</td>';

	item += '<td>';
		if(data["head"]=="1"){ item += '<span class="label label-success">领队</span>'; }
		if(data["gender"]=="男"){ item += '<span class="label label-primary">男</span>'; }
			else{ item += '<span class="label label-danger">女</span>'; }
		if(data["exp"]=="是"){ item += '<span class="label label-info">有模联经历</span>'; }
			else{ item += '<span class="label label-default">无模联经历</span>'; }
		if(data["alloc"]=="是"){ item += '<span class="label label-warning">服从调剂</span>'; }
			else{ item += '<span class="label label-default">不服从调剂</span>'; }
		if(data["status"]=="1"){ item += '<span class="label label-success">注册通过</span>'; }
			else{ item += '<span class="label label-danger">注册未通过</span>'; }
	item += '</td>';

	item += '<td>' + data["comm1"] + '</td>';

	item += '<td>' + data["comm2"] + '</td>';

	item += '<td>' + data["committee"] + '</td>';

	item += '<td>' + data["country"] + '</td>';

	item += '<td>';
		if(data["status"]=="0"){ item += '<button serial="' + data["serial"] + '" class="btn btn-sm btn-success pass">通过注册</button>&nbsp;'; }
			else{
				item += '<button serial="' + data["serial"] + '" class="btn btn-sm btn-danger deny">拒绝注册</button>&nbsp;';
				item += '<button serial="' + data["serial"] + '" class="btn btn-sm btn-primary alloc" data-toggle="modal" data-target="#alloc">分配席位</button>&nbsp;';
			}
		item += '<button serial="' + data["serial"] + '" class="btn btn-sm btn-warning contact">联系信息</button>';
	item += '</td>';

	item += '</tr>';

	return item;
}

$(document).ready(function() {

	$.ajax({
            url: "../../php/backstage.php",
            type: "POST",
            data: {
                "action" : "get_delg"
            },
            dataType: "json"
    }).done(function(data) {
        delegate = data;
    });

    $.ajax({
            url: "../../php/backstage.php",
            type: "POST",
            data: {
                "action" : "get_comm"
            },
            dataType: "json"
    }).done(function(data) {
        comm = data;
    });

    $.ajax({
            url: "../../php/backstage.php",
            type: "POST",
            data: {
                "action" : "get_country"
            },
            dataType: "json"
    }).done(function(data) {
        countries = data;
    });

    for(x in delegate){
    	$("#delg-list").append(entry(x));
    }

    $(".pass").click(function() {
    	var serial = $("this").getAttribute("serial");
    	$.ajax({
	            url: "../../php/backstage.php",
	            type: "POST",
	            data: {
	                "action" : "delg_stat",
	                "status" : "1",
	                "serial" : serial
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

    $(".deny").click(function() {
    	var serial = $("this").getAttribute("serial");
    	$.ajax({
	            url: "../../php/backstage.php",
	            type: "POST",
	            data: {
	                "action" : "delg_stat",
	                "status" : "0",
	                "serial" : serial
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

    $(".contact").click(function() {
    	$("#contact .name").html("");
    	$("#contact .tel").html("");
    	$("#contact .email").html("");
    	$("#contact .qq").html("");

    	var serial = $("this").getAttribute("serial");

    	$("#contact .name").append( '姓名：' + delegate[serial]['name'] );
    	$("#contact .tel").append( '电话：' + delegate[serial]['contact'] );
    	$("#contact .email").append( 'Email：' + delegate[serial]['email'] );
    	$("#contact .qq").append( 'QQ：' + delegate[serial]['qq'] );
    });

    $(".alloc").click(function() {
    	var serial = $("this").getAttribute("serial");
    	$("#committee").html('<option>请选择委员会……</option>');
    	for(x in comm){
	    	$("#committee").append('<option ' + 'value="' + x + '">' + x + '</option>');
	    }
	    $("#submit-alloc").setAttribute("serial",serial);
    });

    $("#country").focus(function() {
    	var committee = $("#committee").val();
    	$("this").html('<option>请选择国家……</option>');
    	for(x in countries[committee]){
	    	$("this").append('<option ' + 'value="' + x + '">' + x + '</option>');
	    }
    });

    $("#submit-alloc").click(function() {
    	$.ajax({
	            url: "../../php/backstage.php",
	            type: "POST",
	            data: {
	                "action" : "alloc",
	                "serial" : $("this").getAttribute("serial"),
	                "committee" : $("#committee").val(),
	                "country" : $("#country").val()
	            },
	            dataType: "json"
	    }).done(function(data) {
	        switch (data["status"]) {
                case 0: //success
                    alert("分配成功！");
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
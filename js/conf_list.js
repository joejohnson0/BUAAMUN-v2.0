var conference = [];
var list = [];

function next(){

	$("#form-body .item").each(function(){

		if($(this).find(".toggle").is(':checked')){
			var serial = $(this).getAttribute("cid");
			var conf = "";
			for(x in list){
				if(x['serial']==serial){
					conf = x['name'];
				}
			}
			conference.push({
				"conf" : conf,
				"committee" : $(this).find(".committee").val()
			});
		}
    });

	$('#conf_1').hide().load('conf_2.html',function(){
		$(this).fadeIn();
	});
}

function back(){
	conference = [];
	list = [];
	window.location.reload();
}

function signup(){    

	var name = $("#name").val();
	var id = $("#id-no").val();
	var gender = $("#gender").val();
	var contact = $("#contact").val();
	var email = $("#email").val();
	var qq = $("#qq").val();
	var exp = $("#exp").val();
	var psw1 = $("#psw1").val();
	var psw2 = $("#psw2").val();
	var password = hex_sha1($("#psw1").val());

	if(name==""){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请填写姓名！</p></div></div></div>').insertBefore($("this"));
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(id==""){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请填写学号！</p></div></div></div>').insertBefore($("this")).fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(contact==""){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请填写手机号码！</p></div></div></div>').insertBefore($("this")).fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(id.length!=8 || parseInt(id.substr(2,2))>=29 || parseInt(id.substr(2,2))<=1){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>学号非法！</p></div></div></div>').insertBefore($("this")).fadeIn();
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
	else if(psw1=="") {
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请设置密码！</p></div></div></div>').insertBefore($("this")).fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(psw1!=psw2) {
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>两次密码不一致！</p></div></div></div>').insertBefore($("this")).fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else{
		$.ajax({
			type: "POST",
			url: '../php/visitor.php',
			dataType: 'json',
			data: {
				action: conf_signup,
				conference: conference,
				name: name,
				gender: gender,
				id: id,
				contact: contact,
				email: email,
				qq: qq,
				exp: exp,
				password: password
			},
			success: function(data) {
				if(data['status']==0)
				{
					$('#conf_2').hide().load('conf_3.html',function(){
						$(this).fadeIn();
					});
				}
				else alert(data['msg']);
			}
		});
	}
}

$(document).ready(function() {
	
	$.ajax({
            url: "../php/visitor.php",
            type: "POST",
            async: false,
            data: {
                "action" : "get_conf"
            },
            dataType: "json"
    }).done(function(data) {
        list = data;
    });
    for(x in list){
	    var item = '<div class="panel panel-primary item" cid="' + x['serial'] + '">' ;
	    item += '<div class="panel-heading"><h3 class="panel-title"><input class="toggle" data-toggle="toggle" data-on="选中" data-off="未选中" type="checkbox">&nbsp;';
	    item += x['name'] + '</h3></div>' ;
	    item += '<div class="panel-body row"> ';
		    item += '<div class="col-md-6">会议地点：' + x['venue'] + '</div>' ;
		    item += '<div class="col-md-6">会议时间：' + x['time'] + '</div>' ;
		    item += '<div class="col-md-6">报名截止：' + x['ddl'] + '</div>' ;
		    item += '<div class="col-md-6">报名费用：' + x['fee'] + '</div>' ;
		    item += '<div class="col-md-12">委员会信息：' + x['committee'] + '</div>' ;
		//item += '</div>' ;
		item += '<div class="col-md-6"><input type="text" class="form-control committee" placeholder="请填报委员会"/></div>' ;
		item += '</div></div>' ;
		$("#form-body").append(item);
	}

	$("#inquire").click(function() {
		$.ajax({
	            url: "../php/visitor.php",
	            type: "POST",
	            data: {
	                "action" : "conf_inquire",
	                "id" : $("#id-no").val(),
	                "password" : hex_sha1($("psw").val())
	            },
	            dataType: "json"
	    }).done(function(data) {
	    	if(data['status']==0){
		    	var msg = data['msg'];
		    	var html = '<p>' + '您报名的会议如下：' + '</p>' ;
		    	for(x in msg){
		    		html += '<p>' + msg['conference'] + ' ：' + msg['committee'] + '</p>' ;
		    	}
		        $("#query-body").html(html);
		    }
		    else alert(data['msg']);
	    });
	});

});
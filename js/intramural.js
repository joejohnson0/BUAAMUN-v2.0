function signup(obj){
	var name = $("#name").val();
	var id = $("#id-no").val();
	var gender = $("#gender").val();
	var exp = $("#exp").val();
	var contact = $("#contact").val();
	var email = $("#email").val();
	var qq = $("#qq").val();
	var comm1 = $("#comm1").val();
	var comm2 = $("#comm2").val();
	var alloc = $("#alloc").val();
	var psw1 = $("#psw1").val();
	var psw2 = $("#psw2").val();
	var password = hex_sha1($("#psw1").val());

	if(name==""){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请填写姓名！</p></div></div></div>').insertBefore(obj).fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(id==""){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请填写学号！</p></div></div></div>').insertBefore(obj).fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(contact==""){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请填写手机号码！</p></div></div></div>').insertBefore(obj).fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(id.length!=8 || parseInt(id.substr(2,2))>29 || parseInt(id.substr(2,2))<1){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>学号非法！</p></div></div></div>').insertBefore(obj).fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(contact.length!=11){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>手机号码非法！</p></div></div></div>').insertBefore(obj).fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(psw1=="") {
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请设置密码！</p></div></div></div>').insertBefore(obj).fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(psw1!=psw2) {
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>两次密码不一致！</p></div></div></div>').insertBefore(obj).fadeIn();
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
				action: "munc_intramural",
				school: id,
				name: name,
				gender: gender,
				exp: exp,
				contact: contact,
				email: email,
				qq: qq,
				comm1: comm1,
				comm2: comm2,
				alloc: alloc,
				password: password}
			}).done(function(data) {
				if(data['status']==0)
				{
					$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-success" role="alert"><p>代表注册成功！</p></div></div></div>').insertBefore(obj);
					setTimeout(function(){
						$('#alertx').fadeOut();
						window.location="index.php";
					},2000);
				}
				else {
					alert(data['msg']);	
					}		
			});
		}
	return false;
}
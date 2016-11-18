function signup(obj){
	var school = $("#school").val();
	var email = $("#email").val();
	var name = $("#name").val();
	var contact = $("#contact").val();
	var psw1 = $("#psw1").val();
	var psw2 = $("#psw2").val();
	var password = hex_sha1($("#psw1").val());
	if(contact.length!=11){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>手机号码非法！</p></div></div></div>').insertBefore(obj).fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	} else if(psw1=="") {
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请设置密码！</p></div></div></div>').insertBefore(obj).fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	} else if(psw1!=psw2) {
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
				action: "munc_signup",
				school: school,
				email: email,
				admin: name,
				contact: contact,
				password: password}
			}).done(function(data) {

				if(data['status']==0)
				{   
					$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-success" role="alert"><p>代表团注册成功！</p></div></div></div>').insertBefore(obj);
					setTimeout(function(){
						$('#alertx').fadeOut();
						window.location="index.php";
					},2000);
				}
				else{

					alert(data['msg']);
				} 
			});
	}
    return false;
}
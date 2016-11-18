function check(){
	var name = $("#name").val();
	var gender = $("#gender").val();
	var id = $("#id-no").val();
	var contact = $("#contact").val();
	var email = $("#email").val();
	var qq = $("#qq").val();
	var department = $("#department").val();
	var exp = $("#experience").val();
	var ps = $("#ps").val();

	if(name==""){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请填写姓名！</p></div></div></div>').insertBefore('#alert');
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(id==""){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请填写学号！</p></div></div></div>').insertBefore('#alert').fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(contact==""){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>请填写手机号码！</p></div></div></div>').insertBefore('#alert').fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(id.length!=8 || parseInt(id.substr(2,2))>=29 || parseInt(id.substr(2,2))<=1){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>学号非法！</p></div></div></div>').insertBefore('#alert').fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else if(contact.length!=11){
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-danger" role="alert"><p>手机号码非法！</p></div></div></div>').insertBefore('#alert').fadeIn();
		setTimeout(function(){
			$('#alertx').fadeOut();
		},2000);
	}
	else{
		$.ajax({
			type: "POST",
			url: 'php/visitor.php',
			dataType: 'json',
			data: {
				"action": "enroll",
				"name": name,
				"gender": gender,
				"id": id,
				"contact": contact,
				"email": email,
				"qq": qq,
				"department": department,
				"exp": exp,
				"ps": ps
			},
			success: function(data) {
				if(data['status']==0)
				{
					$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-success" role="alert"><p>报名成功！</p></div></div></div>').insertBefore('#alert');
					setTimeout(function(){
						$('#alertx').fadeOut();
						window.location.reload();
					},2000);
				}
				else alert(data['msg']);
			}
		});
		$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-success" role="alert"><p>报名成功！</p></div></div></div>').insertBefore('#alert');
	}
}
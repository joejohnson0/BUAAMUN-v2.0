function logout(){
	$.ajax({
		type: "POST",
		url: '../../php/login.php',
		dataType: 'json',
		data: {
			action: "logout"
		},
		success: function(data) {
			if(data['status']==0){
				window.location.reload();
			}
			else {
				alert(data['msg']);
			}
		}
	});
}
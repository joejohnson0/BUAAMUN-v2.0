$(document).ready(function() {

	$(".confirm").click(function() {
		var school = $("this").parent().siblings(".school").html();
		$.ajax({
			type: "POST",
			url: '../../php/backstage.php',
			dataType: 'json',
			data: {
				action: "confirm_pay",
				school: school
			},
			success: function(data) {
				if(data['status']==0)
				{
					$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-success" role="alert"><p>确认收款成功！</p></div></div></div>').insertBefore($("this"));
					setTimeout(function(){
						$('#alertx').fadeOut();
						window.location.reload();
					},2000);
				}
				else alert(data['msg']);
			}
		});
	});
	
});
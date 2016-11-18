$(document).ready(function() {
	$("#submit").click(function() {
		var title = $(".title").val();
		var content = $(".content").val();
		$.ajax({
			type: "POST",
			url: '../../php/backstage.php',
			dataType: 'json',
			data: {
				action: "munc_page",
				id: title,
				content: content
			},
			success: function(data) {
				if(data['status']==0)
				{
					$('<div id="alertx" class="row"><div class="col-md-10 col-md-offset-1"><div class="alert alert-success" role="alert"><p>发布成功！</p></div></div></div>').insertBefore($("this"));
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
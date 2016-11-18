$(document).ready(function() {
	$(".fileinput-button").click(function(e) {
        $(".photo").fileupload({
            url: "../php/munc.php",
            type: "POST",
            data: {
                "action": "pay"
            },
            dataType: "json",
            add: function (e, data) {
                if (data.files && data.files[0] && /\.(gif|jpe?g|png)$/.test(data.files[0].name)) {
                    var $preview = $(".preview");
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $preview.attr("src", e.target.result);
                        $preview.show();
                    };
                    reader.readAsDataURL(data.files[0]);
                    data.submit();
                } else {
                    alert('请选择图片文件');
                }
            },
            done: function (e, data) {
            }
        });
	});
});
$(document).ready(function(){
	$("#login").click(function(){
		var username=$('#username').val();
		var password=$('#password').val();
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'index.php?control=login_ajax',
			data:{username:username,password:password},
			success:function(response){
				if(response.data==true){
					window.location.assign('index.php?control=dashboard');
					// $("#cabecalho").html("Confirmação");
					// $(".toast").addClass("bg-success");
					// $(".toast").removeClass("toast-error");
					// $(".toast-body").html(response.message);
					// $(".toast").toast("show");
				}else{
					// $("#cabecalho").html("Alerta");
					$(".toast").addClass("toast-error");
					$(".toast").removeClass("bg-success");
					$(".toast-body").html(response.message);
					$(".toast").toast("show");
				}
			}
		});
	});
});

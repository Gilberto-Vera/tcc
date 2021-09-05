$(document).ready(function(){
	$("#save").click(function(){
		var name=$('#name').val();
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'index.php?control=validateAjax',
			data:{name:name},
			success:function(response){
				if(response.data==true){
					// window.location.assign('index.php?control=addClient');
					// $("#cabecalho").html("Confirmação");
					// $(".toast").addClass("bg-success");
					// $(".toast").removeClass("toast-error");
					// $(".toast-body").html(response.message);
					// $(".toast").toast("show");
					$("#name").removeClass('is-invalid');
					$("#name").addClass('invalid');

				}else{
					// $("#cabecalho").html("Alerta");
					// $(".toast").addClass("toast-error");
					$("#name").removeClass('invalid');
					$("#name").addClass('is-invalid');
					$("#feedback").html(response.message);
					// $(".toast").toast("show");
					$('#form').submit(function(event) {
						event.preventDefault();
						event.stopPropagation();
					});
				}
			}
		});
	});
});

$(document).ready(function(){
	$("#login").click(function(event){
		var username=$('#username').val();
		var password=$('#password').val();
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'index.php?control=loginAjax',
			data:{username:username, password:password},
			async: false,
			success:function(response){
				Object.keys(response).forEach(function(element){
					if(!response[element].error){
						$("#" + element).removeClass('is-invalid');
						$("#" + element).addClass('is-valid');
					}else{
						$("#" + element).addClass('is-invalid');
						$("#feedback_" + element).html(response[element].message);
						event.preventDefault();
					}
				});
			}
		});
	});
});

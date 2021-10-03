$(document).ready(function(){
	$("#saveClient").click(function(){
		var name = $('#name').val();
		var cpf = $('#cpf').val();
		var phone = $('#phone').val();
		var address = $('#address').val();
		var email = $('#email').val();
		var password = $('#password').val();
		var confirmPassword = $('#confirmPassword').val();
		var error = 7;
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'index.php?control=validate/validateAjaxName',
			data:{name:name, error:error},
			success:function(response){
				if(response.field == 'name'){
					if (response.data == true){
						$("#name").removeClass('is-invalid');
						$("#name").addClass('is-valid');
						error--;
					}else{
						$("#name").addClass('is-invalid');
						$("#feedbackName").html(response.message);
						error++;
					}
				}
			}
		});
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'index.php?control=validate/validateAjaxCPF',
			data:{cpf:cpf},
			success:function(response){
				if(response.field == 'cpf'){
					if(response.data == true){
						$("#cpf").removeClass('is-invalid');
						$("#cpf").addClass('is-valid');
						$("#cpf").val(response.cpf);
						error--;
					}else{
						$("#cpf").addClass('is-invalid');
						$("#feedbackCPF").html(response.message);
						error++;
					}
				}
			}
		});
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'index.php?control=validate/validateAjaxPhone',
			data:{phone:phone},
			success:function(response){
				if(response.field == 'phone'){
					if (response.data == true){
						$("#phone").removeClass('is-invalid');
						$("#phone").addClass('is-valid');
						$("#phone").val(response.phone);
						error--;
					}else{
						$("#phone").addClass('is-invalid');
						$("#feedbackPhone").html(response.message);
						error++;
					}
				}
			}
		});
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'index.php?control=validate/validateAjaxAddress',
			data:{address:address},
			success:function(response){
				if(response.field == 'address'){
					if (response.data == true){
						$("#address").removeClass('is-invalid');
						$("#address").addClass('is-valid');
						error--;
					}else{
						$("#address").addClass('is-invalid');
						$("#feedbackAddress").html(response.message);
						error++;
					}
				}
			}
		});
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'index.php?control=validate/validateAjaxEmail',
			data:{email:email},
			success:function(response){
				if(response.field == 'email'){
					if (response.data == true){
						$("#email").removeClass('is-invalid');
						$("#email").addClass('is-valid');
						error--;
					}else{
						$("#email").addClass('is-invalid');
						$("#feedbackEmail").html(response.message);
						error++;
					}
				}
			}
		});
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'index.php?control=validate/validateAjaxPassword',
			data:{password:password},
			success:function(response){
				if(response.field == 'password'){
					if (response.data == true){
						$("#password").removeClass('is-invalid');
						$("#password").addClass('is-valid');
						error--;
					}else{
						$("#password").addClass('is-invalid');
						$("#feedbackPassword").html(response.message);
						error++;
					}
				}
			}
		});
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'index.php?control=validate/validateAjaxConfirmPassword',
			data:{password:password, confirmPassword:confirmPassword},
			success:function(response){
				if(response.field == 'confirmPassword'){
					if (response.data == true){
						$("#confirmPassword").removeClass('is-invalid');
						$("#confirmPassword").addClass('is-valid');
						error--;
					}else{
						$("#confirmPassword").addClass('is-invalid');
						$("#feedbackConfirmPassword").html(response.message);
						error++;
					}
				}
			}
		});
		console.log(error);
		debugger;
		if (error == 0){
			window.location.assign('index.php?control=addClient');
		}
	});
});

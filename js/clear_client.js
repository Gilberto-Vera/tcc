$(document).ready(function(){
	$("#clear_client").click(function(){
		const fields = ['name', 'cpf', 'phone', 'address', 'email', 'password', 'confirmPassword'];
		fields.forEach(function(element){
				$("#" + element).removeClass('is-invalid');
				$("#" + element).removeClass('is-valid');
				$("#" + element).val('');
				$("#feedback_" + element).html('');
		});
	});
});

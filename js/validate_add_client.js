$(document).ready(function(){
	$("#save_add_client").click(function(event){
		let name = $('#name').val();
		let cpf = $('#cpf').val();
		let phone = $('#phone').val();
		let address = $('#address').val();
		let email = $('#email').val();
		let password = $('#password').val();
		let confirmPassword = $('#confirmPassword').val();
		let hash_password = $('#hash_password').val();
		$.ajax({
			type:"POST",
			dataType:'json',
			url:'index.php?control=validate_client',
			data:{name:name, cpf:cpf, phone:phone, address:address, email:email, password:password,
			confirmPassword:confirmPassword, hash_password:hash_password},
			async: false,
			success:function(response){
				$control = 8;
				Object.keys(response).forEach(function(element){
					if (response[element].error){
						$("#" + element).removeClass('is-invalid');
						$("#" + element).addClass('is-valid');
						$("#" + element).val(response[element][element]);
						if(element == 'phone'){
							$("#phone").val(response[element].phone.number);
						}
						$control --;
					}else{
						$("#" + element).addClass('is-invalid');
						$("#feedback_" + element).html(response[element].message);
					}
				});
			},
            error:function (response) {
				console.log(response.responseText);
				debugger;
            },
            complete:function (response) {
				console.log(response.responseText);
				if($control == 0){
					window.location.assign("index.php?control=client&add");
				}else{
					event.preventDefault();
					event.stopPropagation();
				}
            }
		});
	});
});

$(document).ready(function(){
	$("#save_client").click(function(event){
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
			url:'index.php?control=client&valid',
			data:{name:name, cpf:cpf, phone:phone, address:address, email:email, password:password,
			confirmPassword:confirmPassword, hash_password:hash_password},
			async: false,
			success:function(response){
				$control = 7;
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
						event.preventDefault();
					}
					if($control == 0){
						window.location.assign("index.php?control=client&add");
					}
				});
			}
		});
	});
});

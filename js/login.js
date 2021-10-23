$(document).ready(function(){
	$("#login").click(function(event){
		let username=$('#username').val();
		let password=$('#password').val();
		$.ajax({
			type:"POST",
			dataType:"json",
			url:"index.php?control=login_ajax",
			data:{username:username, password:password},
			async: false,
			success:function(response){
				let control = 2;
				Object.keys(response).forEach(function(element){
					if(!response[element].error){
						$("#" + element).removeClass("is-invalid");
						$("#" + element).addClass("is-valid");
						control --;
					}else{
						$("#" + element).addClass("is-invalid");
						$("#feedback_" + element).html(response[element].message);
					}
					if(control == 0){
						window.location.assign('index.php?control=dashboard');
					}else{
						event.preventDefault();
					}
				});
			},
            error: function (response) {
				console.log(response.responseText);
				debugger;
            }
		});
	});
});

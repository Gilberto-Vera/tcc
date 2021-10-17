$(document).ready(function(){
	$("#excluir").click(function(){
		let $id = $("#id").val();
		window.location.assign("index.php?control=client&del=" + $id);
	});
});

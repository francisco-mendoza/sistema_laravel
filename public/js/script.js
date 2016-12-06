$(document).ready(function(){

	$('#registro').click(function(){
		var dato = $('#nombre').val();
		var route = "http://localhost:8000/ministerio";
		var token = $("#token").val();

		var formId = '#myForm';

		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			data:$(formId).serialize(),

			success:function(){
				$("#msj-success").fadeIn();
				$("#msj-success").fadeOut(1000);

				$("#myForm")[0].reset();
			}

			
		});
	});

});
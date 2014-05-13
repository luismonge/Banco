$( document ).ready( function() {
	
	$('.row').click(function() {
		var h = $('#tabla').outerHeight();
		document.getElementById('table_balance').style.border = 'solid #000';
		document.getElementById('table_balance').style.minHeight = h+'px';
		var id = $(this).attr('id');	
		$('#table_balance').load('http://localhost:8080/banco/index.php/banco/banco_controller/checkBalance?id='+id).hide().fadeIn('slow');

	});

});
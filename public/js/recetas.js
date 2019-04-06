window.onload = function(){

	// var imprimir = document.querySelector('.imprimir');

	// imprimir.addEventListener('click', function(){
 	// 	var contenidoImprimible = document.getElementById('imprimible').innerHTML;
 	// 	var contendioOriginal = document.body.innerHTML;
 		
 	// 	// mywindow.document.write( "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>" );
		
	// 	document.body.innerHTML = contenidoImprimible;

	// 	window.print()

 	// 	document.body.innerHTML = contendioOriginal;

	// });
	

	//cuando se cliquea para borrar UN comentario

	// var comentarioTextViejo = document.querySelector('.comentario-text-viejo');
	// var comentarioViejo = document.querySelector('.comentario-viejo');
	var btnEdit = document.querySelector('.btnEdit');
	
	btnEdit.addEventListener('click', function() {
		$('.comentario-text-viejo').show();
		$('.btnActualizar').show();
		$('.comentario-viejo').hide();
	});

	//fin
}
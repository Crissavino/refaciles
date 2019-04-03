window.onload = function(){

// 	$('.multiple-items').slick({
// 		infinite: true,
// 		slidesToShow: 3,
// 		slidesToScroll: 3
// 	});

	var imprimir = document.querySelector('.imprimir');

	imprimir.addEventListener('click', function(){
 		var contenidoImprimible = document.getElementById('imprimible').innerHTML;
 		var contendioOriginal = document.body.innerHTML;
 		
 		// mywindow.document.write( "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>" );
		
		document.body.innerHTML = contenidoImprimible;

		window.print()

 		document.body.innerHTML = contendioOriginal;

	});
	
}
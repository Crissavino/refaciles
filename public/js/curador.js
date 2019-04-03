window.onload = function(){
	//script para que se seleccione las imagenes en boostrap
		//del cover
		$('.cover-input').on('change', function() {
		    let fileName = $(this).val().split('\\').pop();
		    $(this).siblings('.cover').addClass('selected').html(fileName);
		});

		//de la image
		$('.image-input').on('change', function() {
		    let fileName = $(this).val().split('\\').pop();
		    $(this).siblings('.image').addClass('selected').html(fileName);
		});
	//fin

	//agegar ingrediente
		// var nuevoIngrediente = document.querySelector('.ingredientes');
		// var agregar = document.querySelector('.agregar');
		// var borrar = document.querySelector('.borrar');
		// var ingredientes = [];
		// var btnEnviar = document.querySelector('.enviar')
		// var lista = document.querySelector('#ingredientesAgregados');

		// agregar.addEventListener('click', function(){
		// 	var ingrediente = nuevoIngrediente.value;
		// 	ingredientes.push(ingrediente);
		// 	nuevoIngrediente.value = '';

		// 	var node = document.createElement('LI');
		// 	var textNode = document.createTextNode(ingrediente);
		// 	node.appendChild(textNode);
		// 	// var lista = document.querySelector('#ingredientesAgregados');
		// 	lista.appendChild(node);

		// 	node.setAttribute('name', 'ingrediente[]');
		// 	console.log(node);
		// });
	//fin agregar ingrediente


		


		// $("#anadir").click(function(){
	 //        $(".padre").append(nueva_entrada);
	 //    });

		// function borra() {
		//     $('.hijo').first().remove();
		//     swal('Se borro un profesional');
		// }

}
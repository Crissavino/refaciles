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
	//agregar imagen miniatura
		var image = $(".image-input");
		function readURL1(image) {
			if (image.files && image.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function (e) {
					$('#imagen-preview').attr('src', e.target.result);
				}
				reader.readAsDataURL(image.files[0]);
			}
		}
		$(".image-input").change(function(){
			readURL1(this);
		});
		var cover = $(".cover-input");
		function readURL2(cover) {
			if (cover.files && cover.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#portada-preview').attr('src', e.target.result);
				}
				reader.readAsDataURL(cover.files[0]);
			}
		}
		$(".cover-input").change(function () {
			readURL2(this);
		});
	//fin

	//validar que un check al menos este completo
		var checkMomentoComida = document.querySelectorAll("input[name='momentocomida_id[]']");
		
		checkMomentoComida.forEach(function (element, index) {
			element.addEventListener('click', function() {
				if (element.checked == true) {
					checkMomentoComida.forEach(function(element){
						element.removeAttribute('required');
					});
				}
				if ($(".formCurador input:checkbox:checked").length == 0) {
					checkMomentoComida.forEach(function (element) {
						element.setAttribute('required', 'required');
					});
				}
			});
		});
	//fin
}
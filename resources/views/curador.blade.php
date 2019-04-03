@extends('app')

@section('title', 'Curador de Recetas')

@section('main')

	<section class="container">
		<form action="" class="formCurador" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">

				<div class="form-group">
					<label for="">Título de la receta</label>
					<input class="form-control titulo" type="text" name="titulo" value="{{old('titulo')}}">
					{!! $errors->first('titulo', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group custom-file">
					<label for="" class="custom-file-label image">Seleccioná la imagen que se verá en la receta</label>
					<input class="custom-file-input image-input" type="file" lang="es" name="imagen">
					{!! $errors->first('imagen', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">La receta se prepara para:</label><br>
					@foreach ($momentosComidas as $momento)
						<label class="form-check-label" for="">{{ $momento->getNombre() }}</label>
						<input type="checkbox" name="momentocomida_id[]" value="{{ $momento->getId() }}">
					@endforeach
					{!! $errors->first('momentocomida_id.*', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Tiempo de preparación: (en minutos)</label>
					<input class="form-control" type="text" name="timpoPreparacion" value="{{old('timpoPreparacion')}}">
					{!! $errors->first('timpoPreparacion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Tiempo de cocción: (en minutos)</label>
					<input class="form-control" type="text" name="timpoCoccion" value="{{old('timpoCoccion')}}">
					{!! $errors->first('timpoCoccion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Esta listo en: (en minutos)</label>
					<input class="form-control" type="text" name="listaEn" value="{{old('listaEn')}}">
					{!! $errors->first('listaEn', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Nivel de dificultad:</label>
					<select class="form-control" name="dificultad_id">
						<option value="">Nivel</option>
						@foreach ($tipoDificultad as $dificultad)
							<option value="{{ $dificultad->getId() }}">{{ $dificultad->getNombre() }}</option>
						@endforeach
					</select>
					{!! $errors->first('dificultad_id', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				{{-- ver el select de mr movy, donde se puedan cargar los ingredientes entonces dsp sea posible agrupar todas las comidas que tengan esos ingredientes--}}
				{{-- aunque creo que lo mas conveniente es cargar con un input text por las diferentes medidas --}}
				{{-- a lo mejor se puede hacer un array u objeto de js --}}
				{{-- <div class="form-group">
					<label for="">Ingredientes:</label>
					<input class="form-control ingredientes" type="text" value="{{old('ingrediente')}}">
					{!! $errors->first('ingredientes', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>
				<ul id="ingredientesAgregados">
				</ul>	 --}}

				{{-- <div class="btn btn-primary agregar">Agregar ingrediente</div>
				<div class="btn btn-danger borrar">Borrar ingrediente</div><br><br> --}}

				{{-- <div class="form-group">
					<label for="">Subtítulo</label>
					<input class="form-control" type="text" name="subtitle" value="{{old('subtitle')}}">
					{!! $errors->first('subtitle', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div> --}}

				<div class="form-group custom-file">
					<label for="" class="custom-file-label cover">Seleccioná la imagen que se verá en el home</label>
					<input class="custom-file-input cover-input" type="file" lang="es" name="portada">
				{!! $errors->first('portada', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Breve descripcion de la comida/receta</label>
					<textarea class="form-control" name="breveDescripcion" value="{{ old( 'breveDescripcion' ) }}"></textarea>
					{!! $errors->first('breveDescripcion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				{{-- <div class="form-group">
					<label for="">Instrucciones:</label>
					<input class="form-control" type="text" name="instrucciones" value="{{old('instrucciones')}}">
					{!! $errors->first('instrucciones', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div> --}}

				<div class="form-group">
					<label for="">Descripcion de la comida/receta</label>
					<textarea class="form-control" name="descripcion" value="{{ old( 'descripcion' ) }}"></textarea>
					{!! $errors->first('descripcion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<h3>Ingredientes de la receta</h3>
					<div class="padre">
						<div class="form-group hijo">
							<input class="form-control mb-3 ingredienteYcantidad" placeholder="Cantidad e ingrediente?" type="text" name="ingredienteYcantidad[]" value="">
						</div>
						{!! $errors->first('ingrediente', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					</div>

					<button id="anadir" class="btn btn-primary col-6 anadirIngrediente" type="button"> Agregar ingrediente </button><br><br>
        			<button id="borra" class="btn btn-danger col-6 borrarIngrediente" type="button">Borrar ingrediente</button><br><br>

        			<script>
						var nueva_entrada = $('.padre').html();

		                $("#anadir").click(function(){
		                    $(".padre").append(nueva_entrada);
		                });

		                $("#borra").click(function(){
		                	$('.hijo').last().remove();
			                alert('Se borró un ingrediente');
		                });

		                var btnAnadirIngrediente = document.querySelector('.anadirIngrediente');
		                var clicks = 0;

		                btnAnadirIngrediente.addEventListener('click', function(event){
		                	var hijo = document.querySelectorAll('.hijo');
							console.log(hijo);
							console.log(clicks);

					 		hijo[clicks].style.display = "";

					 		clicks += 1;

					 		//esto es para poder guardar y que validen los datos
					 		var ingredienteYcantidad = document.querySelector('.ingredienteYcantidad');

		                	ingredienteYcantidad.classList.remove('ingredienteYcantidad')

							ingredienteYcantidad.classList.add('ingredienteYcantidad'+clicks)

							var ingredienteYcantidadN = document.querySelector('.ingredienteYcantidad'+clicks);
							
							ingredienteYcantidadN.setAttribute('name', 'ingredienteYcantidad[]')

		                });  
					</script>

				<h3>Instrucciones para esta receta</h3>
					<div class="padre2">
						<div class="hijo2">
							<div class="form-group">
								<label class="form-control-label" for="">Instrucción</label>
								<input class="form-control mb-3 numeroInstruccion" placeholder="Numero?" type="text" name="numeroInstruccion[]">
							</div>
							{!! $errors->first('numeroInstruccion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
							
							<div class="form-group instruccion">
								<input class="form-control instruccion" placeholder="Instrucción" type="text" name="instruccion[]">
							</div>
							{!! $errors->first('instruccion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
						</div>
					</div>

					<button id="anadir2" class="btn btn-primary col-6 anadirInstruccion" type="button"> Agregar Instrucción </button><br><br>
        			<button id="borra2" class="btn btn-danger col-6 borrarInstruccion" type="button">Borrar Instrucción</button><br><br>

        			<script>
						var nueva_entrada2 = $('.padre2').html();

		                $("#anadir2").click(function(){
		                    $(".padre2").append(nueva_entrada2);
		                });

		                $("#borra2").click(function(){
		                	$('.hijo2').first().remove();
			                alert('Se borró una instrucción');
		                });

		                var btnAnadirInstruccion = document.querySelector('.anadirInstruccion');
		                var clicks2 = 0;

		                btnAnadirInstruccion.addEventListener('click', function(event){
		                	var hijo2 = document.querySelectorAll('.hijo2');
							console.log(hijo2);
							console.log(clicks2);

					 		hijo2[clicks2].style.display = "";

					 		clicks2 += 1;

					 		//esto es para poder guardar y que validen los datos
					 		var numeroInstruccion = document.querySelector('.numeroInstruccion');

		                	numeroInstruccion.classList.remove('numeroInstruccion')

							numeroInstruccion.classList.add('numeroInstruccion'+clicks2)

							var numeroInstruccionN = document.querySelector('.numeroInstruccion'+clicks2);
							
							numeroInstruccionN.setAttribute('name', 'numeroInstruccion[]')

							var instruccion = document.querySelector('.instruccion');

		                	instruccion.classList.remove('instruccion')

							instruccion.classList.add('instruccion'+clicks2)

							var instruccionN = document.querySelector('.instruccion'+clicks2);
							
							instruccionN.setAttribute('name', 'instruccion[]')

		                });  
					</script>
			</div>


			


			<button type="submit" class="btn btn-success col-xl enviar">Enviar</button><br><br>
		</form>
	</section>

	<script src="/js/curador.js" type="text/javascript" charset="utf-8" async defer></script>


@endsection

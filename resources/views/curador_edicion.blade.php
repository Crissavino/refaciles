@extends('app')

@section('title', 'Curador de Recetas')

@section('main')

	<section class="container">
		<form action="{{ $receta->id }}" class="formCurador" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
            @method('PUT')
			<div class="form-group">
				{{-- @dd($receta->titulo) --}}
				<div class="form-group">
					<label for="">Título de la receta</label>
					<input class="form-control titulo" type="text" name="titulo" value="{{ $receta->titulo }}">
					{!! $errors->first('titulo', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				@if ("{{asset('$receta->imagen')}}")
			        <img src="{{ asset($receta->imagen) }}" width="200px" alt=""><br>
			    @else
			            <p>No se cargó ninguna imagen</p>
			    @endif <br>	

				<div class="form-group custom-file">
					<label for="" class="custom-file-label image">Seleccioná la imagen que se verá en la receta</label>
					<input class="custom-file-input image-input" type="file" lang="es" name="imagen">
					{!! $errors->first('imagen', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div><br><br>

				<div class="form-group">
					<label for="">La receta se prepara para:</label><br>
					@foreach ($momentosComidas as $momento)
						@php
							$momentoComidaId = $receta->momentocomidas->pluck('id')->toArray();
							$checked = (in_array($momento->id, $momentoComidaId)) ? 'checked' : ''
						@endphp
						<label class="form-check-label" for="{{ $momento->getId() }}">{{ $momento->getNombre() }}</label>
						<input {{ $checked }} type="checkbox" id="{{ $momento->getId() }}" name="momentocomida_id[]" value="{{ $momento->getId() }}">
					@endforeach
					{!! $errors->first('momentocomida_id.*', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Tiempo de preparación: (en minutos)</label>
					<input class="form-control" type="text" name="timpoPreparacion" value="{{ $receta->timpoPreparacion }}">
					{!! $errors->first('timpoPreparacion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Tiempo de cocción: (en minutos)</label>
					<input class="form-control" type="text" name="timpoCoccion" value="{{ $receta->timpoCoccion }}">
					{!! $errors->first('timpoCoccion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Esta listo en: (en minutos)</label>
					<input class="form-control" type="text" name="listaEn" value="{{ $receta->listaEn }}">
					{!! $errors->first('listaEn', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Nivel de dificultad:</label>
					<select class="form-control" name="dificultad_id">
						<option value="">Nivel</option>
						@foreach ($tipoDificultad as $dificultad)
							@php
								$selected = ($dificultad->id == $receta->dificultad_id) ? 'selected' : '';
							@endphp
							<option value="{{ $dificultad->getId() }}" {{ $selected }} >{{ $dificultad->getNombre() }}</option>
						@endforeach
					</select>
					{!! $errors->first('dificultad_id', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				@if ("{{asset('$receta->portada')}}")
			        <img src="{{ asset($receta->portada) }}" width="200px" alt=""><br>
			    @else
			            <p>No se cargó ninguna portada</p>
			    @endif <br>	

				<div class="form-group custom-file">
					<label for="" class="custom-file-label cover">Seleccioná la imagen que se verá en el home</label>
					<input class="custom-file-input cover-input" type="file" lang="es" name="portada">
				{!! $errors->first('portada', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div><br><br>

				<div class="form-group">
					<label for="">Breve descripcion de la comida/receta</label>
					<textarea class="form-control" name="breveDescripcion" value="">{{ $receta->breveDescripcion }}</textarea>
					{!! $errors->first('breveDescripcion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
					<div class="invalid-feedback"></div>
				</div>

				<div class="form-group">
					<label for="">Descripcion de la comida/receta</label>
					<textarea class="form-control" name="descripcion" value="">{{ $receta->descripcion }}</textarea>
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

					<ul id="ingredientes">
					</ul>

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

		                @foreach ($ingredientes as $ingrediente)
							if ({{ $receta->id }} == {{ $ingrediente->recipe_id }}) {
								var lista = document.querySelector('#ingredientes');
								var ingrediente = '{{ $ingrediente->ingredienteYcantidad }}';
								// arrayIngredientes.push() = '$ingrediente->ingrediente';
								// ingredientes.append(ingrediente);
								var node = document.createElement('LI');
								var textNode = document.createTextNode(ingrediente);
								node.appendChild(textNode);
								lista.appendChild(node);
							}
						@endforeach
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

					<ul id="instrucciones">
					</ul>

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

		                @foreach ($instrucciones as $instruccion)
							if ({{ $receta->id }} == {{ $instruccion->recipe_id }}) {
								var lista = document.querySelector('#instrucciones');
								var numeroInstruccion = '{{ $instruccion->numeroInstruccion }}';
								var instruccion = '{{ $instruccion->instruccion }}';
								// arrayIngredientes.push() = '$ingrediente->ingrediente';
								// ingredientes.append(ingrediente);
								var node = document.createElement('LI');
								var textNode = document.createTextNode(numeroInstruccion+') '+instruccion);
								node.appendChild(textNode);
								lista.appendChild(node);
							}
						@endforeach
					</script>
			</div>

			<button type="submit" class="btn btn-success col-xl enviar">Enviar</button><br><br>
		</form>
	</section>

	<script src="/js/curador.js" type="text/javascript" charset="utf-8" async defer></script>


@endsection

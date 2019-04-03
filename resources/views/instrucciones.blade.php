@extends('app')

@section('title', 'Instrucciones')

@section('main')



	<section class="container">
		<form action="" class="formCurador" method="post" enctype="application/x-www-form-urlencoded">
			@csrf

			<div class="form-group">
				<label class="form-control-label" for="">Sobre que receta estas trabajando?</label>
				<select class="form-control receta" name="recipe_id">
					<option value="">Titulo de la receta</option>
					@foreach ($recetas as $receta)
						<option value="{{ $receta->id }}">{{ $receta->titulo }} Creada el {{ $receta->created_at }}</option>
					@endforeach
				</select>
			{!! $errors->first('recipe_id', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
			</div>

			<div class="form-group">
				<label class="form-control-label" for="">Instruccion</label>
				<input class="form-control mb-3" placeholder="Numero?" type="text" name="numeroInstruccion">
			</div>
			{!! $errors->first('numeroInstruccion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
			
			<div class="form-group instruccion">
				<input class="form-control" placeholder="Instruccion" type="text" name="instruccion">
			</div>
			{!! $errors->first('instruccion', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
			
			<script>
				var receta = document.querySelector('.receta');
				var instruccion = document.querySelector('.instruccion');

				receta.addEventListener('change', function(){
					console.log(receta.value);
					@foreach ($instrucciones as $instruccion)
					if (receta.value == {{ $instruccion->recipe_id }}) {
						var lista = document.querySelector('#instrucciones');
						var instrucciones = '{{ $instruccion->numeroInstruccion }} {{ $instruccion->instruccion }}';
						// arrayIngredientes.push() = '$ingrediente->ingrediente';
						// ingredientes.append(ingrediente);
						var node = document.createElement('LI');
						var textNode = document.createTextNode(instrucciones);
						node.appendChild(textNode);
						lista.appendChild(node);

					}
					@endforeach
				});
				

				// console.log(arrayIngredientes);
			</script>

			<ul id="instrucciones">
			</ul>

			<button type="submit" class="btn btn-success col-xl">Enviar</button><br><br>
		</form>
	</section>
@endsection

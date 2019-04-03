@extends('app')

@section('title', 'Ingredientes')

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

			<div class="form-group ingredientes">
				<label class="form-control-label" for="">Ingrediente</label>
				<input class="form-control mb-3" placeholder="Que ingrediente?" type="text" name="ingrediente">
				<input class="form-control" placeholder="Cantidad de este ingrediente" type="text" name="cantidad">
			{!! $errors->first('ingrediente', '<p class="help-block" style="color:red;padding-top:25px";>:message</p>') !!}
			</div>
			<script>
				var receta = document.querySelector('.receta');
				var ingredientes = document.querySelector('.ingredientes');
				var arrayIngredientes = [];

				receta.addEventListener('change', function(){
					console.log(receta.value);
					@foreach ($ingredientes as $ingrediente)
					if (receta.value == {{ $ingrediente->recipe_id }}) {
						var lista = document.querySelector('#ingredientes');
						var ingrediente = '{{ $ingrediente->ingrediente }}';
						// arrayIngredientes.push() = '$ingrediente->ingrediente';
						// ingredientes.append(ingrediente);
						var node = document.createElement('LI');
						var textNode = document.createTextNode(ingrediente);
						node.appendChild(textNode);
						lista.appendChild(node);

					}
					@endforeach
				});
				

				// console.log(arrayIngredientes);
			</script>

			<ul id="ingredientes">
			</ul>

			<button type="submit" class="btn btn-success col-xl">Enviar</button><br><br>
		</form>
	</section>
@endsection

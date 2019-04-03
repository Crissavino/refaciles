@extends('app')

@section('title', 'Contacto')

@section('main')
	<div class="recetas accordion">
		<h4>
			<button class="btn btn-collapse" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				Desayuno
	        </button>
		</h4>
		<div class="desayuno">
			@foreach ($recetas as $receta)
				@foreach ($receta->momentocomidas as $momentocomida)
					@if ($momentocomida->id === 1)
						<div class="tarjeta-receta collapse" id="collapseOne">
							<div class="imagen">
								<a href="receta/{{ $receta->id }}" title=""><img class="" src="{{ asset($receta->portada) }}" alt="Card image cap"></a>
							</div>
							<a href="receta/{{ $receta->id }}" title=""><h4>{{ $receta->titulo }}</h4></a>
							<div class="informacion-receta">
								<i class="reloj far fa-clock  fa-2x"></i><p class=" tiempo">{{ $receta->listaEn }} min</p>
								@foreach ($dificultads as $dificultad)
									@if ($dificultad->id === $receta->dificultad_id)
										<p class="dificultad">{{ $dificultad->nombre }}</p>
									@endif
								@endforeach
							</div>
						</div>
					@endif
				@endforeach
			@endforeach
		</div>

		<h4>
			<button class="btn btn-collapse" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				Almuerzo
	        </button>
		</h4>	
		<div class="almuerzo">
			@foreach ($recetas as $receta)
				@foreach ($receta->momentocomidas as $momentocomida)
					@if ($momentocomida->id === 2)
						<div class="tarjeta-receta collapse" id="collapseTwo">
							<div class="imagen">
								<a href="receta/{{ $receta->id }}" title=""><img class="" src="{{ asset($receta->portada) }}" alt="Card image cap"></a>
							</div>
							<a href="receta/{{ $receta->id }}" title=""><h4>{{ $receta->titulo }}</h4></a>
							<div class="informacion-receta">
								<i class="reloj far fa-clock  fa-2x"></i><p class=" tiempo">{{ $receta->listaEn }} min</p>
								@foreach ($dificultads as $dificultad)
									@if ($dificultad->id === $receta->dificultad_id)
										<p class="dificultad">{{ $dificultad->nombre }}</p>
									@endif
								@endforeach
							</div>
						</div>
					@endif
				@endforeach
			@endforeach
		</div>

		<h4>
			<button class="btn btn-collapse" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
				Cena
	        </button>
		</h4>
		<div class="cena">
			@foreach ($recetas as $receta)
				@foreach ($receta->momentocomidas as $momentocomida)
					@if ($momentocomida->id === 4)
						<div class="tarjeta-receta collapse" id="collapseThree">
							<div class="imagen">
								<a href="receta/{{ $receta->id }}" title=""><img class="" src="{{ asset($receta->portada) }}" alt="Card image cap"></a>
							</div>
							<a href="receta/{{ $receta->id }}" title=""><h4>{{ $receta->titulo }}</h4></a>
							<div class="informacion-receta">
								<i class="reloj far fa-clock  fa-2x"></i><p class=" tiempo">{{ $receta->listaEn }} min</p>
								@foreach ($dificultads as $dificultad)
									@if ($dificultad->id === $receta->dificultad_id)
										<p class="dificultad">{{ $dificultad->nombre }}</p>
									@endif
								@endforeach
							</div>
						</div>
					@endif
				@endforeach
			@endforeach
		</div>

		<h4>
			<button class="btn btn-collapse" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
				Postre
	        </button>
		</h4>
		<div class="postre">
			@foreach ($recetas as $receta)
				@foreach ($receta->momentocomidas as $momentocomida)
					@if ($momentocomida->id === 5)
						<div class="tarjeta-receta collapse" id="collapseFour">
							<div class="imagen">
								<a href="receta/{{ $receta->id }}" title=""><img class="" src="{{ asset($receta->portada) }}" alt="Card image cap"></a>
							</div>
							<a href="receta/{{ $receta->id }}" title=""><h4>{{ $receta->titulo }}</h4></a>
							<div class="informacion-receta">
								<i class="reloj far fa-clock  fa-2x"></i><p class=" tiempo">{{ $receta->listaEn }} min</p>
								@foreach ($dificultads as $dificultad)
									@if ($dificultad->id === $receta->dificultad_id)
										<p class="dificultad">{{ $dificultad->nombre }}</p>
									@endif
								@endforeach
							</div>
						</div>
					@endif
				@endforeach
			@endforeach
		</div>

		<h4>
			<button class="btn btn-collapse" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
				Snack
	        </button>
		</h4>
		<div class="snack">
			@foreach ($recetas as $receta)
				@foreach ($receta->momentocomidas as $momentocomida)
					@if ($momentocomida->id === 6)
						<div class="tarjeta-receta collapse" id="collapseFive">
							<div class="imagen">
								<a href="receta/{{ $receta->id }}" title=""><img class="" src="{{ asset($receta->portada) }}" alt="Card image cap"></a>
							</div>
							<a href="receta/{{ $receta->id }}" title=""><h4>{{ $receta->titulo }}</h4></a>
							<div class="informacion-receta">
								<i class="reloj far fa-clock  fa-2x"></i><p class=" tiempo">{{ $receta->listaEn }} min</p>
								@foreach ($dificultads as $dificultad)
									@if ($dificultad->id === $receta->dificultad_id)
										<p class="dificultad">{{ $dificultad->nombre }}</p>
									@endif
								@endforeach
							</div>
						</div>
					@endif
				@endforeach
			@endforeach
		</div>
	</div>

	{{-- <script>
		$( function() {
			$( "#acordion" ).accordion({
			  collapsible: true
			});
		});
		</script> --}}

@endsection



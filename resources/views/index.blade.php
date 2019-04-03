@extends('app')

@section('title', 'Recetas Fáciles y Rápidas')

@section('main')

	<section class="row">
		<section class="conteiner">

			<div class="carrousel">
				<div id="carouselExampleIndicators" class="carousel slide mx-auto mb-5 d-block"" data-ride="carousel">

					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
						  	<img class="d-block w-100" src="img/carrousel1.jpg?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
						</div>
						<div class="carousel-item">
						  	<img class="d-block w-100" src="img/carrousel2.jpg?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
						</div>
						<div class="carousel-item">
						  	<img class="d-block w-100" src="img/carrousel3.jpg?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			
			<div class="recetas">
				@foreach ($recetas as $receta)
					<div class="tarjeta-receta">
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
				@endforeach
			</div>

			<section class="asesorias container">
					<h2 style="text-align: center;">Asesorias Online</h2>

					<h3 style="padding-top: 50px;">¿CÓMO TRABAJAMOS?</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<h3 style="padding-top: 50px;">¿QUÉ NOS DIFERENCIA?</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<h3 style="padding-top: 50px;">CASOS DE ÉXITO</h3>
					<p style="padding-bottom: 50px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</section>	
		</section>	
	</section>
	 {{-- <script src="js/menu-movil.js"></script> --}}
@endsection
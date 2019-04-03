@extends('app')

@section('title', 'Bienvenido')

@section('main')

	<section class="row">
		<section class="conteiner">

			<div class="col-12">
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
						{{-- <img class="" src="{{ asset($receta->portada) }}" alt="Card image cap"> --}}
						{{-- <div class="titulo-img-receta">
							<a href="receta/{{ $receta->id }}" title="">
								<img class="" src="{{ asset($receta->portada) }}" alt="Card image cap">
								<h4>{{ $receta->titulo }}</h4>	 
							</a> 	
						</div> --}}
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
		</section>	
	</section>
	 
@endsection
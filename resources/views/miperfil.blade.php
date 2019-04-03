@extends('app')

@section('title', 'Nosotros')

@section('main')

	<section class="miPerfil">
		<h1>Bienvendio a tu perfil {{ $usuario->name }}</h1>

		<section class="">
			{{-- aca van a ir los comentarios que haya hecho este usuario --}}
		</section>

		<section>
			
		</section>

		<script>
			var myLineChart = new Chart(ctx, {
			    type: 'line',
			    data: data,
			    options: options
			});

			window.onload() = 
		</script>

	</section>
@endsection
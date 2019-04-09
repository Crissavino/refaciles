@extends('app')

@section('title', 'Curador de Recetas')

@section('main')

	<div class="container">
		<h2 class="text-center">Panel de control</h2>
			<div class="row">
				@foreach ($recetas as $receta)
					<div class="card col-4">
			  			<div class="card-body">
				    		<h5 class="">{{ $receta->titulo }}</h5>
				    		<a href="/curador/edicion/{{  $receta->id }}" class="btn btn-primary float-left"><i class="far fa-edit"></i> Editar receta</a><br><br>
				    		<form action="/curador/edicion/{{  $receta->id }}" class="" method="post">
								@method('DELETE')
								@csrf
								<button class="btn btn-danger">
									<i class="far fa-trash-alt"></i> Borrar </span>
								</button>
							</form>
			  			</div>
					</div>
				@endforeach
			</div>
	</div>

	<script src="/js/curador.js" type="text/javascript" charset="utf-8" async defer></script>


@endsection

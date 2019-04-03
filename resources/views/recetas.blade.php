
	
	<section class="receta">
		@extends('app')

		@section('title', 'Recetas')

		@section('main')

		{{-- <div class="info-receta justify-content-between text-center"> --}}
		<div class="info-receta">
			<div class="titulo">
				<h1>{{ $receta->titulo }}</h1>
			</div>

			<div class="fecha-megusta">
				<p class="fecha">{{ $receta->created_at->locale('es')->isoFormat('D MMM Y') }}</p>
				<p class="megusta">
					<i class="far fa-comments"></i> 
					{{ $numeroComentarios }}
				</p>
			</div>

			<div class="imagen">
				<img src="{{ asset($receta->imagen) }}" alt="">
			</div>

			<div class="datos">
				<div class="rectangulo">
					<h5 class="titulo-rectangulo">Preparación</h5>
					<p class="dato-rectangulo">{{ $receta->timpoPreparacion }} min</p>
				</div>

				<div class="rectangulo">
					<h5 class="titulo-rectangulo">Cocción</h5>
					<p class="dato-rectangulo">{{ $receta->timpoCoccion }} min</p>
				</div>

				<div class="rectangulo">
					<h5 class="titulo-rectangulo">Listo en</h5>
					<p class="dato-rectangulo">{{ $receta->listaEn }} min</p>
				</div>

				<div class="rectangulo">
					<h5 class="titulo-rectangulo">Nivel</h5>
						@foreach ($dificultads as $dificultad)
							@if ($dificultad->id === $receta->dificultad_id)
								<p class="dato-rectangulo">{{ $dificultad->nombre }}</p>
							@endif
						@endforeach
				</div>
			</div>

			<div class="ingredientes">
				<h4>Ingredientes</h4>
				@foreach ($ingredientes as $ingrediente)
					<div class="ingrediente">
						<p>{{ $ingrediente->cantidad }} {{ $ingrediente->ingrediente }}</p>
					</div>
				@endforeach
			</div>

			<div class="breveDescripcion">
				{{ $receta->breveDescripcion }}
			</div>

			<div class="instrucciones">
				<h4>Instrucciones</h4>
				@foreach ($instrucciones as $instruccion)
					<div class="instruccion">
						<p class="numero-instruccion"> {{ $instruccion->numeroInstruccion }} </p><p class="dato-instruccion"> {{ $instruccion->instruccion }}</p>
					</div>
				@endforeach
			</div>

			<div class="descripcion">
				{{ $receta->descripcion }}
			</div>

			<div class="bloque-comentarios">
				<h4>Comentarios</h4>
			@auth				
				<div class="comentario-input card-block">
					<form action="" method="post" accept-charset="utf-8">
						@csrf
						<input type="text" name="recipe_id" style="display: none;" value="{{ $receta->id }}">
						<div class="form-group">
							<textarea name="body" placeholder="Dejanos tu comentario acá." rows="3" class="form-control comentario-text" value="{{ old('body') }}"></textarea>	
						</div>
						{!! $errors->first('body', '<p class="help-block" style="color:red;padding-top:15px";>:message</p>') !!}

						<div class="form-group">
							<button type="submit" class="btn-comentario btn">Enviar comentario</button>
						</div>
					</form>
				</div>
				@foreach ($comentarios as $comentario)
					@if ($comentario->recipe_id === $receta->id)
						<div class="comentarios">
							<ul class="list-group">
								<li class="comentario list-group-item rounded">
									<div class="usuario-comentario">
										@foreach ($usuario as $user)
											@if ($comentario->user_id === $user->id)
												<strong>{{ $user->name}}</strong> 
											@endif
										@endforeach
									</div>
									<div class="fecha-comentario">
										{{ $comentario->created_at->locale('es')->isoFormat('D MMM Y') }}
									</div>
									<div class="cuerpo-comentario">
										{{ $comentario->body }}
									</div>
								</li>
							</ul>
						</div>
					@endif
				@endforeach
			</div>
			@else
				<p>Si queres dejarnos tu comentario por favor, <a href="/register" title="">registrate</a>.</p>
				@foreach ($comentarios as $comentario)
					@if ($comentario->recipe_id === $receta->id)
						<div class="comentarios">
							<ul class="list-group">
								<li class="comentario list-group-item rounded">
									<div class="usuario-comentario">
										@foreach ($usuario as $user)
											@if ($comentario->user_id === $user->id)
												<strong>{{ $user->name}}</strong> 
											@endif
										@endforeach
									</div>
									<div class="fecha-comentario">
										{{ $comentario->created_at->locale('es')->isoFormat('D MMM Y') }}
									</div>
									<div class="cuerpo-comentario">
										{{ $comentario->body }}
									</div>
								</li>
							</ul>
						</div>
					@endif
				@endforeach
					{{-- <br><br> --}}
			@endauth				

			{{-- @auth
				<div class="bloque-comentario">
						<div class="card-block">
							<form action="" method="post" accept-charset="utf-8">
								@csrf
								<input type="text" name="recipe_id" style="display: none;" value="{{ $receta->id }}">
								<div class="form-group">
									<textarea name="body" placeholder="Dejanos tu comentario acá." class="form-control comentario-text" value="{{ old('body') }}"></textarea>	
								</div>
								{!! $errors->first('body', '<p class="help-block" style="color:red;padding-top:15px";>:message</p>') !!}

								<div class="form-group">
									<button type="submit" class="btn btn-primary">Enviar comentario</button>
								</div>
							</form>
						</div>

					<div class="card comentarios">
						<ul class="list-group">
							@foreach ($comentarios as $comentario)
								<li class="comentario list-group-item rounded">
									@foreach ($usuario as $user)
										@if ($comentario->user_id === $user->id)
											<strong>{{ $user->name}} dijo:</strong> 
										@endif
									@endforeach
									{{ $comentario->body }}
								</li>
							@endforeach
						</ul>
					</div><br><br>
				</div>
			@else
				<div class="bloque-comentario">
					<div class="card comentarios">
						<p>Si queres dejarnos tu comentario por favor, <a href="/login" title="">inicia sesión</a>.</p>
						<ul class="list-group">
							@foreach ($comentarios as $comentario)
								<li class="comentario list-group-item rounded">
									@foreach ($usuario as $user)
										@if ($comentario->user_id === $user->id)
											<strong>{{ $user->name}} dijo:</strong> 
										@endif
									@endforeach
									{{ $comentario->body }}
								</li>
							@endforeach
						</ul>
					</div><br><br>
				</div>
			@endauth --}}
		</div>
	</section>	

	<script src="js/recetas.js"></script>
@endsection
	
	<section class="receta">
		

		<?php $__env->startSection('title', 'Recetas'); ?>

		<?php $__env->startSection('main'); ?>

		<div class="info-receta">
			<div class="titulo">
				<h1><?php echo e($receta->titulo); ?></h1>
			</div>

			<div class="fecha-megusta">
				<p class="fecha"><?php echo e($receta->created_at->locale('es')->isoFormat('D MMM Y')); ?></p>
				<p class="megusta">
					<i class="far fa-comments"></i> 
					<?php echo e($numeroComentarios); ?>

				</p>
			</div>

			<div class="imagen">
				<img src="<?php echo e(asset($receta->imagen)); ?>" alt="">
			</div>

			<div class="datos">
				<div class="rectangulo">
					<h5 class="titulo-rectangulo">Preparación</h5>
					<p class="dato-rectangulo"><?php echo e($receta->timpoPreparacion); ?> min</p>
				</div>

				<div class="rectangulo">
					<h5 class="titulo-rectangulo">Cocción</h5>
					<p class="dato-rectangulo"><?php echo e($receta->timpoCoccion); ?> min</p>
				</div>

				<div class="rectangulo">
					<h5 class="titulo-rectangulo">Listo en</h5>
					<p class="dato-rectangulo"><?php echo e($receta->listaEn); ?> min</p>
				</div>

				<div class="rectangulo">
					<h5 class="titulo-rectangulo">Nivel</h5>
						<?php $__currentLoopData = $dificultads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dificultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($dificultad->id === $receta->dificultad_id): ?>
								<p class="dato-rectangulo"><?php echo e($dificultad->nombre); ?></p>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>

			<div class="ingredientes">
				<h4>Ingredientes</h4>
				<?php $__currentLoopData = $ingredientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingrediente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="ingrediente">
						<p><?php echo e($ingrediente->ingredienteYcantidad); ?></p>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

			<div class="breveDescripcion">
				<?php echo e($receta->breveDescripcion); ?>

			</div>

			<div class="instrucciones">
				<h4>Instrucciones</h4>
				<?php $__currentLoopData = $instrucciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instruccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="instruccion">
						<p class="numero-instruccion"> <?php echo e($instruccion->numeroInstruccion); ?> </p><p class="dato-instruccion"> <?php echo e($instruccion->instruccion); ?></p>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

			<div class="descripcion">
				<?php echo e($receta->descripcion); ?>

			</div>

			<div class="bloque-comentarios">
				<h4>Comentarios</h4>
				<?php if(auth()->guard()->check()): ?>				
					<div class="comentario-input card-block">
						<form action="" method="post" accept-charset="utf-8">
							<?php echo csrf_field(); ?>
							<input type="text" name="recipe_id" style="display: none;" value="<?php echo e($receta->id); ?>">
							<div class="form-group">
								<textarea name="body" placeholder="Dejanos tu comentario acá." rows="3" class="form-control comentario-text" value="<?php echo e(old('body')); ?>"></textarea>	
							</div>
							<?php echo $errors->first('body', '<p class="help-block" style="color:red;padding-top:15px";>:message</p>'); ?>


							<div class="form-group">
								<button type="submit" class="btn-comentario btn">Enviar comentario</button>
							</div>
						</form>
					</div>
					<?php $__currentLoopData = $comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($comentario->recipe_id === $receta->id): ?>
							<div class="comentarios">
								<input type="text" name="idComentarioEliminado" id="idComentarioEliminado" value="" style="display: none;">
								<ul class="list-group">
									<li class="comentario list-group-item rounded comentario<?php echo e($comentario->id); ?>" name="comentario<?php echo e($comentario->id); ?>">
										<div class="usuario-comentario">
											<?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($comentario->user_id === $user->id): ?>
													<strong><?php echo e($user->name); ?></strong>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
										<div class="fecha-comentario">
											<?php echo e($comentario->created_at->locale('es')->isoFormat('D MMM Y')); ?>

										</div>
										<div class="cuerpo-comentario">
											<?php if(auth()->user()->id == $comentario->user_id): ?>
												<form method="post" action="/receta/<?php echo e($receta->id); ?>/<?php echo e($comentario->id); ?>">
													<?php echo method_field('PUT'); ?>
													<?php echo csrf_field(); ?>
													<textarea style="display: none;" name="bodyViejo" placeholder="Dejanos tu comentario acá." rows="3" class="form-control comentario-text-viejo" value=""><?php echo e($comentario->body); ?></textarea>	
													<div class="comentario-viejo"><?php echo e($comentario->body); ?></div>
													<button style="display: none;" type="submit" class="btn-comentario btn float-left btnActualizar">Actualizar</button>
												</form>
												<a class="btn float-left btnEdit"><i class="far fa-edit fa-1x" style="color: blue;"></i></a>
											<?php else: ?>
												<?php echo e($comentario->body); ?>

											<?php endif; ?>
										</div>
										<?php if(auth()->user()->id == $comentario->user_id): ?>
											<div>
												<form method="post" action="/receta/<?php echo e($receta->id); ?>/<?php echo e($comentario->id); ?>">
													<?php echo method_field('DELETE'); ?>
													<?php echo csrf_field(); ?>
													<input type="text" style="display: none;" value="<?php echo e($comentario->id); ?>">
													<button type="submit" class="btnDelete btn float-left" class="borrarComentario"><i class="far fa-trash-alt fa-1x" style="color: red;"></i></button>
												</form>
											</div>
										<?php endif; ?>
										
										
									</li>
								</ul>
							</div>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
					<p>Si queres dejarnos tu comentario por favor, <a href="/register" title="">registrate</a>.</p>
					<?php $__currentLoopData = $comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($comentario->recipe_id === $receta->id): ?>
							<div class="comentarios">
								<ul class="list-group">
									<li class="comentario list-group-item">
										<div class="usuario-comentario">
											<?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($comentario->user_id === $user->id): ?>
													<strong><?php echo e($user->name); ?></strong> 
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
										<div class="fecha-comentario">
											<?php echo e($comentario->created_at->locale('es')->isoFormat('D MMM Y')); ?>

										</div>
										<div class="cuerpo-comentario">
											<?php echo e($comentario->body); ?>

										</div>
									</li>
								</ul>
							</div>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>				
			</div>
		</div>

		
	</section>	

    
    

	<script src="/js/recetas.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
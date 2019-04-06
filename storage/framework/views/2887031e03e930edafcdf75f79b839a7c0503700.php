<?php $__env->startSection('title', 'Recetas'); ?>

<?php $__env->startSection('main'); ?>
	<div class="recetas accordion">
		<h4>
			<button class="btn btn-collapse" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				Desayuno
	        </button>
		</h4>
		<div class="desayuno">
			<?php $__currentLoopData = $recetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $receta->momentocomidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $momentocomida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($momentocomida->id === 1): ?>
						<div class="tarjeta-receta collapse" id="collapseOne">
							<div class="imagen">
								<a href="receta/<?php echo e($receta->id); ?>" title=""><img class="" src="<?php echo e(asset($receta->portada)); ?>" alt="Card image cap"></a>
							</div>
							<a href="receta/<?php echo e($receta->id); ?>" title=""><h4><?php echo e($receta->titulo); ?></h4></a>
							<div class="informacion-receta">
								<i class="reloj far fa-clock  fa-2x"></i><p class=" tiempo"><?php echo e($receta->listaEn); ?> min</p>
								<?php $__currentLoopData = $dificultads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dificultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($dificultad->id === $receta->dificultad_id): ?>
										<p class="dificultad"><?php echo e($dificultad->nombre); ?></p>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		<h4>
			<button class="btn btn-collapse" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				Almuerzo
	        </button>
		</h4>	
		<div class="almuerzo">
			<?php $__currentLoopData = $recetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $receta->momentocomidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $momentocomida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($momentocomida->id === 2): ?>
						<div class="tarjeta-receta collapse" id="collapseTwo">
							<div class="imagen">
								<a href="receta/<?php echo e($receta->id); ?>" title=""><img class="" src="<?php echo e(asset($receta->portada)); ?>" alt="Card image cap"></a>
							</div>
							<a href="receta/<?php echo e($receta->id); ?>" title=""><h4><?php echo e($receta->titulo); ?></h4></a>
							<div class="informacion-receta">
								<i class="reloj far fa-clock  fa-2x"></i><p class=" tiempo"><?php echo e($receta->listaEn); ?> min</p>
								<?php $__currentLoopData = $dificultads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dificultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($dificultad->id === $receta->dificultad_id): ?>
										<p class="dificultad"><?php echo e($dificultad->nombre); ?></p>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		<h4>
			<button class="btn btn-collapse" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
				Cena
	        </button>
		</h4>
		<div class="cena">
			<?php $__currentLoopData = $recetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $receta->momentocomidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $momentocomida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($momentocomida->id === 4): ?>
						<div class="tarjeta-receta collapse" id="collapseThree">
							<div class="imagen">
								<a href="receta/<?php echo e($receta->id); ?>" title=""><img class="" src="<?php echo e(asset($receta->portada)); ?>" alt="Card image cap"></a>
							</div>
							<a href="receta/<?php echo e($receta->id); ?>" title=""><h4><?php echo e($receta->titulo); ?></h4></a>
							<div class="informacion-receta">
								<i class="reloj far fa-clock  fa-2x"></i><p class=" tiempo"><?php echo e($receta->listaEn); ?> min</p>
								<?php $__currentLoopData = $dificultads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dificultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($dificultad->id === $receta->dificultad_id): ?>
										<p class="dificultad"><?php echo e($dificultad->nombre); ?></p>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		<h4>
			<button class="btn btn-collapse" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
				Postre
	        </button>
		</h4>
		<div class="postre">
			<?php $__currentLoopData = $recetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $receta->momentocomidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $momentocomida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($momentocomida->id === 5): ?>
						<div class="tarjeta-receta collapse" id="collapseFour">
							<div class="imagen">
								<a href="receta/<?php echo e($receta->id); ?>" title=""><img class="" src="<?php echo e(asset($receta->portada)); ?>" alt="Card image cap"></a>
							</div>
							<a href="receta/<?php echo e($receta->id); ?>" title=""><h4><?php echo e($receta->titulo); ?></h4></a>
							<div class="informacion-receta">
								<i class="reloj far fa-clock  fa-2x"></i><p class=" tiempo"><?php echo e($receta->listaEn); ?> min</p>
								<?php $__currentLoopData = $dificultads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dificultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($dificultad->id === $receta->dificultad_id): ?>
										<p class="dificultad"><?php echo e($dificultad->nombre); ?></p>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		<h4>
			<button class="btn btn-collapse" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
				Snack
	        </button>
		</h4>
		<div class="snack">
			<?php $__currentLoopData = $recetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $receta->momentocomidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $momentocomida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($momentocomida->id === 6): ?>
						<div class="tarjeta-receta collapse" id="collapseFive">
							<div class="imagen">
								<a href="receta/<?php echo e($receta->id); ?>" title=""><img class="" src="<?php echo e(asset($receta->portada)); ?>" alt="Card image cap"></a>
							</div>
							<a href="receta/<?php echo e($receta->id); ?>" title=""><h4><?php echo e($receta->titulo); ?></h4></a>
							<div class="informacion-receta">
								<i class="reloj far fa-clock  fa-2x"></i><p class=" tiempo"><?php echo e($receta->listaEn); ?> min</p>
								<?php $__currentLoopData = $dificultads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dificultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($dificultad->id === $receta->dificultad_id): ?>
										<p class="dificultad"><?php echo e($dificultad->nombre); ?></p>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>

	

<?php $__env->stopSection(); ?>



<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title', 'Recetas Fáciles y Rápidas'); ?>

<?php $__env->startSection('main'); ?>

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
				<?php $__currentLoopData = $recetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="tarjeta-receta">
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
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
	 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title', 'Curador de Recetas'); ?>

<?php $__env->startSection('main'); ?>

	<div class="container">
		<h2 class="text-center">Panel de control</h2>
			<div class="row">
				<?php $__currentLoopData = $recetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="card col-4">
			  			<div class="card-body">
				    		<h5 class=""><?php echo e($receta->titulo); ?></h5>
				    		<a href="/curador/edicion/<?php echo e($receta->id); ?>" class="btn btn-primary float-left"><i class="far fa-edit"></i> Editar receta</a><br><br>
				    		<form action="/curador/edicion/<?php echo e($receta->id); ?>" class="" method="post">
								<?php echo method_field('DELETE'); ?>
								<?php echo csrf_field(); ?>
								<button class="btn btn-danger">
									<i class="far fa-trash-alt"></i> Borrar </span>
								</button>
							</form>
			  			</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
	</div>

	<script src="/js/curador.js" type="text/javascript" charset="utf-8" async defer></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<title>Re Faciles - <?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
	<section class="conteiner">
		<?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<main class="container-fluid">
			<?php echo $__env->yieldContent('main'); ?>
		</main>
		<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</section>

	<script src="/js/menu-movil.js"></script>

	
		
	
</body>
</html>
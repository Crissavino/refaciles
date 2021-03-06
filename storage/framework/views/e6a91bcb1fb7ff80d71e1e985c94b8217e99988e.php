<?php $__env->startComponent('mail::layout'); ?>

<?php $__env->slot('header'); ?>
    <?php $__env->startComponent('mail::header', ['url' => config('app.url')]); ?>
        Re Fáciles
    <?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>

<?php if(! empty($greeting)): ?>
# <?php echo e($greeting); ?>

<?php else: ?>
<?php if($level == 'error'): ?>
# <?php echo app('translator')->getFromJson('Whoops!'); ?>
<?php else: ?>
# <?php echo app('translator')->getFromJson('Hello!'); ?>
<?php endif; ?>
<?php endif; ?>


<?php $__currentLoopData = $introLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($line); ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php if(isset($actionText)): ?>
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
<?php $__env->startComponent('mail::button', ['url' => $actionUrl, 'color' => $color]); ?>
<?php echo e($actionText); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>


<?php $__currentLoopData = $outroLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($line); ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php if(! empty($salutation)): ?>
<?php echo e($salutation); ?>

<?php else: ?>
<?php echo app('translator')->getFromJson('Regards'); ?>,<br><?php echo e(config('app.name')); ?>

<?php endif; ?>


<?php if(isset($actionText)): ?>
<?php $__env->startComponent('mail::subcopy'); ?>
<?php echo app('translator')->getFromJson(
    "Si estás teniendo problemas con el boton \":actionText\", copiá y pegá el link de abajo:\n".
    "[link](:actionUrl)",
    [
        'actionText' => $actionText,
        'actionUrl' => $actionUrl
    ]
); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->slot('footer'); ?>
    <?php $__env->startComponent('mail::footer'); ?>
        Re Fáciles
    <?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

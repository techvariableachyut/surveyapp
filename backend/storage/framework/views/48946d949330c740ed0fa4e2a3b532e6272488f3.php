<?php $__env->startComponent('mail::message'); ?>
# Survey on board. 

This email has been received because you have applied to complete your survey for later. Worry not, your incomplete survey has been saved.

To complete your survey, click the button below to resume from where you have stopped.

<?php $__env->startComponent('mail::button', ['url' => $url]); ?>
Complete survey.
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
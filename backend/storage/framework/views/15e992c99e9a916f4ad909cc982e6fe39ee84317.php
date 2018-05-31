<?php $__env->startSection('content'); ?>
<style>
    .form-group{
        margin-bottom: 1em !important;
    }
</style>
<section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="p-1">
                        <h1>IMS survey tool</h1>
                    </div>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" method="post" action="<?php echo e(route('login')); ?>" novalidate>
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input name="email" type="text" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>  form-control-lg input-lg" form-control-lg input-lg" id="user-name" placeholder="Your Username" required>
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback label label-warning">
                                    <i><?php echo e($errors->first('email')); ?></i>
                                </span>
                            <?php endif; ?>
                        </fieldset>

                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" name="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?> form-control-lg input-lg" id="user-password" placeholder="Enter Password" required>
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>

                            <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback label label-warning">
                                    <i><?php echo e($errors->first('password')); ?></i>
                                </span>
                            <?php endif; ?>
                        </fieldset>
                        <fieldset class="form-group row">
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                <fieldset>
                                    <input type="checkbox" id="remember-me" class="chk-remember">
                                    <label for="remember-me"> Remember Me</label>
                                </fieldset>
                            </div>

                        </fieldset>
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.basic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
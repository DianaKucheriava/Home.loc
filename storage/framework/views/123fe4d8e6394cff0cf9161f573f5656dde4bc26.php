<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Сторінка налаштувань</h4></div>
                <div class="panel-body">
             <?php if(session('status')): ?>
                </div>
            <?php endif; ?>
                <div class="alert alert-success">
            <?php echo e(session('status')); ?>

                    <form method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="file" name="avatar">
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
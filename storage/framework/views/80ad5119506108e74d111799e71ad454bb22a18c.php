<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="/uploads/avatars/<?php echo e($user->avatar); ?>" style="width: 150px; height: 150px; float:left; border-radius: 50%; margin-right: 25px;">
           <h2><?php echo e($user->name); ?> "Домашня сторінка" </h2>
            <form action="/settings" method="POST" enctype="multipart/form-data">
                <label>Змінити фото</label>
                <input type="file" name="avatar">
                  <?php echo e(csrf_field()); ?>

                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
            <form action="" method="POST">
                <label>Змінити пароль</label>
                  <?php echo e(csrf_field()); ?>

                <label>Старий пароль:</label>
                <input type="password" name="old_password">
                <label>Новий пароль:</label>
                <input type="password" name="new_password">                
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<!--  <div class="panel panel-default">
                <div class="panel-heading"><h4>Сторінка налаштувань</h4></div>
                <div class="panel-body">
                     <?php if(session('status')): ?>
                </div>
                    <?php endif; ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                    <?php $user= Auth::user()->avatar ?>
                    <img src="<?php echo e(asset ('images/George.png')); ?>">
                    <img src="<?php echo e(asset('storage/George.png')); ?>">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                         <input type="file" name="image" id="imag">
                         <input type="submit" value="Змінити зображення" >
                    </form>
                </div>
            </div> -->
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
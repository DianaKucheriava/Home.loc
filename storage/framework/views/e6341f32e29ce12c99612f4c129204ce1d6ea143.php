<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="/uploads/avatars/<?php echo e($user->avatar); ?>" style="width: 150px; height: 150px; float:left; border-radius: 50%; margin-right: 25px;">
            <h2><?php echo e($user->name); ?> "Домашня сторінка" </h2>
            <div class="alert alert-success">
                <form action="/settings" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                           <td><h4>Змінити фото</h4></td>
                        </tr>
                        <tr>
                           <td><input type="file" name="avatar"><?php echo e(csrf_field()); ?></td><td><input type="submit" class="pull-right btn btn-sm btn-primary"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <form id="form-change-password" role="form" method="POST" action="/settings" novalidate class="form-horizontal">
              <div class="col-md-9">             
                <label for="current-password" class="col-sm-4 control-label">Поточний пароль</label>
                <div class="col-sm-8">
                  <div class="form-group">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
                    <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
                  </div>
                </div>
                <label for="password" class="col-sm-4 control-label">Новий пароль</label>
                <div class="col-sm-8">
                  <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                </div>
                <label for="password_confirmation" class="col-sm-4 control-label">Повторіть пароль</label>
                <div class="col-sm-8">
                  <div class="form-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-5 col-sm-6">
                  <button type="submit" class="btn btn-danger">Зберегти</button>
                </div>
            </div>
            </form>
            <form action="" method="POST">
                <h4>Змінити email</h4>
                <div class="alert alert-success">
                    <?php echo e(csrf_field()); ?>

                    <table>
                        <tr>
                            <td><label>Старий email:</label><input type="email"  name="old_email"></td><td><label>Новий email:</label><input type="email" name="new_email"></td><td><input type="submit" class="pull-right btn btn-sm btn-primary"></td>
                        </tr>     
                    </table>         
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
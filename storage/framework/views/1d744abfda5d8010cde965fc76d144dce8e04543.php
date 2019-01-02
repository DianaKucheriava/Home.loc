<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Реєстрація</div>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Ім'я:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Ваш E-Mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Пароль:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Підтвердити пароль:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Оберіть країну:</label>
                            <div class="col-md-6">
                                <select name="country" id="country" class="form-control" style="width:350px">
                                    <option value="">--- Оберіть країну ---</option>
                                        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Оберіть область:</label>
                            <div class="col-md-6">
                                <select name="region"  id="region" class="form-control" style="width:350px"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Оберіть місто:</label>
                            <div class="col-md-6">
                               <select name="city" id="city" class="form-control" style="width:350px"></select>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('select[name="country"]').on('change', function() {
                                    var id_country = $(this).val();
                                    if(id_country) {
                                        $.ajax({
                                            url: '/register/ajax/'+id_country,
                                            type: "GET",
                                            dataType: "json",
                                            success:function(data) {
                                                $('select[name="region"]').empty();
                                                $.each(data, function(key, value) {
                                                    $('select[name="region"]').append('<option value="'+ key +'">'+ value +'</option>');
                                                });
                                            }
                                        });
                                    }else{
                                        $('select[name="region"]').empty();
                                    }
                                });
                            });
                             $(document).ready(function() {
                                $('select[name="region"]').on('change', function() {
                                    var id_region = $(this).val();
                                    if(id_region) {
                                        $.ajax({
                                            url: '/register/'+id_region,
                                            type: "GET",
                                            dataType: "json",
                                            success:function(data) {
                                                $('select[name="city"]').empty();
                                                $.each(data, function(key, value) {
                                                    $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                                                });
                                            }
                                        });
                                    }else{
                                        $('select[name="city"]').empty();
                                    }
                                });
                            });
                        </script>
                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Зареєструватись
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
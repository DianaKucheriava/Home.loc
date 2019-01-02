<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p><b><?php echo e($post->title); ?></b></p>
                    <p>
                        <?php echo e($post->body); ?>

                    </p>
                    <hr />
                    <h4>Показати коментарі</h4>
                    <?php echo $__env->make('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <hr />
                    <h4>Додати коментар</h4>
                    <form method="post" action="<?php echo e(route('comment.add')); ?>">
                       <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" />
                            <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Додати коментар" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
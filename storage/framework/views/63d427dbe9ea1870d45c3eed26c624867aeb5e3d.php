 <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="display-comment">
        <strong><?php echo e($comment->user->name); ?></strong>
        <p><?php echo e($comment->body); ?></p>
        <a href="" id="reply"></a>
        <form method="post" action="<?php echo e(route('reply.add')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" />
                <input type="hidden" name="post_id" value="<?php echo e($post_id); ?>" />
                <input type="hidden" name="comment_id" value="<?php echo e($comment->id); ?>" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Відповісти" />
            </div>
        </form>
        <?php echo $__env->make('partials._comment_replies', ['comments' => $comment->replies], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('content'); ?>
    <div class="span3">
        <h2>Task: <?php echo $task->title; ?></h2>
        <form class="form-horizontal" action='<?php echo e(route('task/update')); ?>' method="POST">
            <input type="hidden" name="taskId" value="<?php echo e($task->id); ?>">
            <label>Email</label>
                <input type="text" name="email" class="span3" value="<?php echo $task->email; ?>">
            <label>Текст задачи</label>
                <input type="text" name="title" class="span3" value="<?php echo $task->title; ?>">
            <label>Имя пользователя</label>
                <input type="text" name="user" class="span3" value="<?php echo $task->user; ?>">
            <label>Статус</label>
                <input type="checkbox" name="isDone" <?php echo e($task->isDone ? 'checked' : ''); ?> />
            <input type="submit" value="Submit" class="btn btn-primary pull-right">
            <div class="clearfix"></div>

            <span style="color: red"><?php echo e(isset($error) ? $error : ''); ?></span>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/daniyar/Documents/beejee-task/resources/views/tasks/edit.blade.php ENDPATH**/ ?>
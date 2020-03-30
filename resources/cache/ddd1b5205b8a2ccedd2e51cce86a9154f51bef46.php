<?php
    use App\Helpers\Auth as Auth;
?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row col-md-6 col-md-offset-2 custyle">
            <table id="tasks" class="table table-striped custab">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя пользователя</th>
                    <th>Email</th>
                    <th>Текст задачи</th>
                    <th>Статус</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo $task->id; ?></td>
                        <td><?php echo $task->email; ?></td>
                        <td><?php echo $task->user; ?></td>
                        <td><?php echo $task->title; ?></td>
                        <td><?php echo e($task->isDone ? 'Yes' : 'No'); ?></td>
                        <td class="text-center">
                            <?php if(Auth::user() && Auth::user()->isAdmin): ?>
                                <a class='btn btn-info btn-xs' href="<?php echo e(route('task/edit?taskId=' . $task->id)); ?>">
                                    <span class="glyphicon glyphicon-edit"></span>Edit</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('head'); ?>
    <script src="/public/js/task.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/daniyar/Documents/beejee-task/resources/views/tasks/index.blade.php ENDPATH**/ ?>
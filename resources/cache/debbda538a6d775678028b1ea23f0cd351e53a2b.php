<?php
    use App\Helpers\Auth as Auth;
?>
        <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"
          id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo e('/public/css/style.css'); ?>">
    <title>Task manager</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="head">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span6">
                            <h1 class="muted">Task manager</h1>
                        </div>

                        <div class="span4 offset2" style="margin-top:15px;">
                            <?php if(!Auth::user()): ?>
                                <a class="btn pull-right" type="button" href="<?php echo e(route('auth/login')); ?>">Sign In</a>
                            <?php else: ?>
                                <a class="btn pull-right" type="button"
                                   href="<?php echo e(route('auth/logout')); ?>"><?php echo e(Auth::user()->username); ?>(Logout)</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <ul class="nav">
                                <li>
                                    <a href="<?php echo e(route('task/index')); ?>">Tasks</a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('task/create')); ?>">Create new task</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <?php echo $__env->yieldContent('content'); ?>
</div>
</body>
</html><?php /**PATH /Users/daniyar/Documents/beejee-task/resources/views/layouts/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="span12">
                <form class="form-horizontal" action='<?php echo e(route('auth/signIn')); ?>' method="POST">
                    <fieldset>
                        <div id="legend">
                            <legend class="">Login</legend>
                        </div>
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  for="username">Username</label>
                            <div class="controls">
                                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" for="password">Password</label>
                            <div class="controls">
                                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                <button class="btn btn-success">Login</button>
                            </div>
                        </div>
                        <?php echo e(isset($error) ? $error : ''); ?>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/daniyar/Documents/beejee-task/resources/views/auth/login.blade.php ENDPATH**/ ?>
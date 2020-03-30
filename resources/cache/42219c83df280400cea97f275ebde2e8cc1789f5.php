<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                        Oops!</h1>
                    <h2><?php echo e($message); ?></h2>
                    <div class="error-details">
                        Sorry, an error has occured, Requested page not found!
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/daniyar/Documents/beejee-task/resources/views/errors/notFound.blade.php ENDPATH**/ ?>
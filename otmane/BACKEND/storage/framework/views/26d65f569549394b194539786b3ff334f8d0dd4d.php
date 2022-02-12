

<?php $__env->startSection('content'); ?>
<div>
    <ul>
        <li>
            <a href="<?php echo e(route('hotel')); ?>">Hotels</a>
        </li>
        <li>
            <a href="<?php echo e(route('ville')); ?>">Villes</a>
        </li>
        <li>
            <a href="<?php echo e(route('sejour')); ?>">Sejours</a>
        </li>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projet-final\otmane\BACKEND\resources\views/admin.blade.php ENDPATH**/ ?>
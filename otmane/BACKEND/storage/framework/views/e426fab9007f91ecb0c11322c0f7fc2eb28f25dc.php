

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between">
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
    <div class="show-hotel">
        <h2>Nom de l'hotel:</h2>
        <p><?php echo e($hotel->name_hotel); ?></p>
        <h2>Nom de la ville:</h2>
        <p><?php echo e($ville->name_ville); ?></p>
        <h2>date de depart:</h2>
        <p><?php echo e($sejour->date_depart); ?></p>
        <h2>date d'arrive:</h2>
        <p><?php echo e($sejour->date_arrive); ?></p>
        <a class="btn btn-success" href="<?php echo e(route('sejour')); ?>" style="display:block;">Retour</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projet-final\otmane\resources\views/Sejour/show.blade.php ENDPATH**/ ?>
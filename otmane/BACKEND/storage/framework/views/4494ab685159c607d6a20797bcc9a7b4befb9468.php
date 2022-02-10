

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
        <h2>Prix de l'hotel:</h2>
        <p><?php echo e($hotel->price); ?></p>
        <h2>L'image de l'hotel:</h2>
        <img height="200" width="200" src="<?php echo e(Storage::url($hotel->image_hotel)); ?>">
        <a class="btn btn-success" href="<?php echo e(route('hotel')); ?>" style="display:block;">Retour</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projet-final\otmane\resources\views/hotel/show.blade.php ENDPATH**/ ?>
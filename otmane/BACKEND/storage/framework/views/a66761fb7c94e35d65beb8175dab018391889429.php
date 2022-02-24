

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between">
    <ul class="sidebar">
            <img width="100" height="100" src="<?php echo e(Storage::url('public/files/Logo-agencia.png')); ?>"/>
        <li>
            <a href="<?php echo e(route('hotel')); ?>" class="hotel"><i class="fa fa-hotel"></i>Hotels</a>
        </li>
        <li>
            <a href="<?php echo e(route('ville')); ?>" class="ville"><i class="fa fa-city"></i>Villes</a>
        </li>
        <li>
            <a href="<?php echo e(route('sejour')); ?>" class="sejour"><i class="fa fa-calendar-day"></i>Sejours</a>
        </li>
    </ul>
    <div class="show-hotel py-4">
        <h2>Nom de l'hotel:</h2>
        <p><?php echo e($hotel->name_hotel); ?></p>
        <h2>Prix de l'hotel:</h2>
        <p><?php echo e($hotel->price); ?></p>
        <h2>L'image de l'hotel:</h2>
        <img height="200" width="200" src="<?php echo e(Storage::url($hotel->image_hotel)); ?>">
        <a class="btn btn-success" href="<?php echo e(route('hotel')); ?>" style="display:block;width:20%;">Retour</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projet-final\otmane\BACKEND\resources\views/hotel/show.blade.php ENDPATH**/ ?>
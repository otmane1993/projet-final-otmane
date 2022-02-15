

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between">
    <ul class="sidebar">
            <img width="100" height="100" src="<?php echo e(Storage::url('b5.png')); ?>"/>
        <li>
            <a href="<?php echo e(route('hotel')); ?>" class="hotel"><i class="fa-solid fa-hotel"></i>Hotels</a>
        </li>
        <li>
            <a href="<?php echo e(route('ville')); ?>" class="ville"><i class="fa-solid fa-city"></i>Villes</a>
        </li>
        <li>
            <a href="<?php echo e(route('sejour')); ?>" class="sejour"><i class="fa-solid fa-calendar-day"></i>Sejours</a>
        </li>
    </ul>
    <div class="table-sejour py-4">
        <a href="<?php echo e(route('sejour.create')); ?>" class="btn btn-success add">Ajouter Sejour:</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Numero:</th>
                    <th>date depart:</th>
                    <th>date arrive:</th>
                    <th>Hotel:</th>
                    <th>Ville:</th>
                    <th>Actions:</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $sejours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sejour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($sejour->id); ?></td>
                    <td><?php echo e($sejour->date_depart); ?></td>
                    <td><?php echo e($sejour->date_arrive); ?></td>
                    <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($sejour->hotel_id==$hotel->id): ?>
                    <td><?php echo e($hotel->name_hotel); ?></td>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ville): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($sejour->ville_id==$ville->id): ?>
                    <td><?php echo e($ville->name_ville); ?></td>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <td>
                        <a class="btn btn-success" href="<?php echo e(route('sejour.edit',$sejour->id)); ?>">Edit</a>
                        <a class="btn btn-primary" href="<?php echo e(route('sejour.show',$sejour->id)); ?>">Show</a>
                        <a class="btn btn-danger delete-sejour" onclick="let x=confirm('Do you really want to delete this sejour?');if(x){this.setAttribute('href','<?php echo e(route('sejour.delete',$sejour->id)); ?>');}">Delete</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php if(Session::has('message-sejour')): ?>
        <p><?php echo e(Session::get('message-sejour')); ?></p>
        <?php endif; ?>
        <?php if(Session::has('update-sejour')): ?>
        <p><?php echo e(Session::get('update-sejour')); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projet-final\otmane\BACKEND\resources\views/Sejour/index.blade.php ENDPATH**/ ?>
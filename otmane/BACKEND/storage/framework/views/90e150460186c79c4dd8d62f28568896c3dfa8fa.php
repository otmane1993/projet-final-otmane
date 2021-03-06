

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
    <div class="table-hotel">
        <a href="<?php echo e(route('hotel.create')); ?>" class="btn btn-success">Ajouter Hotel:</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Numero:</th>
                    <th>Nom:</th>
                    <th>Price:</th>
                    <th>Image:</th>
                    <th>Actions:</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($hotel->id); ?></td>
                    <td><?php echo e($hotel->name_hotel); ?></td>
                    <td><?php echo e($hotel->price); ?></td>
                    <td>
                        <img width="100" height="100" src="<?php echo e(Storage::url($hotel->image_hotel)); ?>">
                    </td>
                    <td>
                        <a class="btn btn-success" href="<?php echo e(route('hotel.edit',$hotel->id)); ?>">Edit</a>
                        <a class="btn btn-primary" href="<?php echo e(route('hotel.show',$hotel->id)); ?>">Show</a>
                        <a class="btn btn-danger delete-hotel" onclick="let x=confirm('Do you really want to delete this hotel?');if(x){this.setAttribute('href','<?php echo e(route('hotel.delete',$hotel->id)); ?>');}">Delete</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php if(Session::has('message-hotel')): ?>
        <p><?php echo e(Session::get('message-hotel')); ?></p>
        <?php endif; ?>
        <?php if(Session::has('update-hotel')): ?>
        <p><?php echo e(Session::get('update-hotel')); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projet-final\otmane\resources\views/Hotel/hotel.blade.php ENDPATH**/ ?>
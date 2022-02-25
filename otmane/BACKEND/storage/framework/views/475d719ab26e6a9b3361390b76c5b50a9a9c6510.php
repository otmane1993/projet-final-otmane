

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between">
    <ul class="sidebar">
            <img width="150" height="150" src="<?php echo e(Storage::url('public/files/Logo-agencia.png')); ?>"/>
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
    <div class="table-hotel py-4">
        <a href="<?php echo e(route('hotel.create')); ?>" class="btn btn-success add">Ajouter Hotel:</a>
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
                    <!--<td><?php echo e($hotel->image_hotel); ?></td>-->
                    <td>
                        <img width="100" height="100" src="<?php echo e(Storage::url($hotel->image_hotel)); ?>">
                        <!--<img src="<?php echo e(asset('storage/images/GHeZVWFtZZcaVxU5TDqqy3Sj4BOsOiMFPwFp52hF.png')); ?>" alt="">-->
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
        <?php echo e($hotels->links()); ?>

        <?php if(Session::has('message-hotel')): ?>
        <p class="message-session"><?php echo e(Session::get('message-hotel')); ?></p>
        <?php endif; ?>
        <?php if(Session::has('update-hotel')): ?>
        <p class="message-session"><?php echo e(Session::get('update-hotel')); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projet-final\otmane\BACKEND\resources\views/Hotel/hotel.blade.php ENDPATH**/ ?>
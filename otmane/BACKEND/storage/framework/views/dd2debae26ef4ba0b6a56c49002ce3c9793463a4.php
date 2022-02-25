

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
        <a href="<?php echo e(route('ville.create')); ?>" class="btn btn-success add">Ajouter Ville:</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Numero:</th>
                    <th>Nom:</th>
                    <th>Actions:</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ville): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($ville->id); ?></td>
                    <td><?php echo e($ville->name_ville); ?></td>
                    <td>
                        <a class="btn btn-danger delete-ville" onclick="let x=confirm('Do you really want to delete this city?');if(x){this.setAttribute('href','<?php echo e(route('ville.delete',$ville->id)); ?>');}">Delete</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($villes->links()); ?>

        <?php if(Session::has('message-ville')): ?>
        <p class="message-session"><?php echo e(Session::get('message-ville')); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projet-final\otmane\BACKEND\resources\views/Ville/index.blade.php ENDPATH**/ ?>
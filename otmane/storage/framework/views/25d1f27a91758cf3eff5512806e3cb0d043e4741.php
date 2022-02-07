

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
    <div class="edit-hotel">
        <form method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Nom de l'hotel:</label>
                <input type="text" id="name" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="price">Prix de l'hotel:</label>
                <input type="number" id="price" name="price" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="image">Nouvelle Image:</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" class="form-group" value="update">
            </div>
        </form>
        <a class="btn btn-success" href="<?php echo e(route('hotel')); ?>">Retour</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projet-final\otmane\resources\views/Hotel/edit.blade.php ENDPATH**/ ?>
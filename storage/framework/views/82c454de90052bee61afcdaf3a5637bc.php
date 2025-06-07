<?php if($errors->any()): ?>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="text-[red]"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH /mnt/c/Users/DEEPGAMING/desktop/pioesportsbueno/Proyecto-Final-Daw-2024-2025-Francesc-Sora-Quevedo/resources/views/partials/errors.blade.php ENDPATH**/ ?>
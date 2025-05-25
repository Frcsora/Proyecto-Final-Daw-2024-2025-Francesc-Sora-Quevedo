<?php if(count($sponsors) > 0): ?>
    <h2>Patrocinadores</h2>
    <section class="overflow-x-scroll flex items-center bg-white gap-6">
        <?php $__currentLoopData = $sponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sponsor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="flex flex-col">
                <img alt="<?php echo e($sponsor->name); ?>" src="<?php echo e($sponsor->base64); ?>">
                <p><?php echo e($sponsor->name); ?></p>
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
    <?php echo $__env->make('partials.linea', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\DEEPGAMING\Desktop\pioesportsbueno\Proyecto-Final-Daw-2024-2025-Francesc-Sora-Quevedo\resources\views/partials/sponsors-div.blade.php ENDPATH**/ ?>
<main class="flex flex-col w-full">
    <section class="flex flex-col lg:flex-row items-center justify-center gap-4">
        <?php echo $__env->make('partials.patreoncard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <section class="w-full"><?php echo e($slot); ?></section>
    </section>
    <?php echo $__env->make('partials.linea', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('partials.status', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('partials.back', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</main>
<?php /**PATH /mnt/c/Users/franc/Desktop/piopioesports/piopioesports/resources/views/components/main.blade.php ENDPATH**/ ?>
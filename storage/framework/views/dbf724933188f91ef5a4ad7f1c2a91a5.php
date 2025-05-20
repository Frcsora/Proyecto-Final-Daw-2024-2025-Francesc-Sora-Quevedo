<main class="flex flex-col w-full">
    <section class="flex flex-col lg:flex-row items-center justify-center gap-4">
        <?php echo $__env->make('partials.patreoncard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <section class="w-full flex flex-col lg:flex-row items-center justify-around"><?php echo e($slot); ?></section>
    </section>
    <?php if(isset($newsindex)): ?>
        <?php echo $__env->make('partials.status', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php else: ?>
        <a class="twitter-timeline" href="https://twitter.com/PioPioEC?ref_src=twsrc%5Etfw">PioPioEC</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <?php echo $__env->make('partials.linea', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('partials.status', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('partials.back', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>
</main>
<?php /**PATH /var/www/html/resources/views/components/main.blade.php ENDPATH**/ ?>
<a <?php echo e($attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-3xl leading-5 text-gray-700 dark:white hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out'])); ?>>
    <?php if(isset($svg)): ?>
        <?php echo $slot; ?>

    <?php else: ?>
        <?php echo e($slot); ?>

    <?php endif; ?>

</a>
<?php /**PATH /mnt/c/Users/DEEPGAMING/desktop/pioesportsbueno/Proyecto-Final-Daw-2024-2025-Francesc-Sora-Quevedo/resources/views/components/dropdown-link.blade.php ENDPATH**/ ?>
<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($image),'imageFondo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($imageFondo),'socialmedias' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($socialmedias)]); ?>
     <?php $__env->slot('title', null, []); ?> Players <?php $__env->endSlot(); ?>
    <main class="flex flex-col">

        <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Card::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php echo $__env->make('partials.errors', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <form id="formImage" method="post" action="<?php echo e(route('players.update', $player->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <fieldset>
                    <label for="name">Nombre:</label><br>
                    <input type="text" name="name" value="<?php echo e($player->name); ?>">
                </fieldset>
                <fieldset>
                    <label for="surname1">Primer apellido:</label><br>
                    <input type="text" name="surname1" value="<?php echo e($player->surname1); ?>">
                </fieldset>
                <fieldset>
                    <label for="surname2">Segundo apellido:</label><br>
                    <input type="text" name="surname2" value="<?php echo e($player->surname2); ?>">
                </fieldset>
                <fieldset>
                    <label for="nickname">Nickname:</label><br>
                    <input type="text" name="nickname" value="<?php echo e($player->nickname); ?>">
                </fieldset>
                <fieldset id="dropeo">
                    <label for="image">Imagen:</label><br>
                    <input type="file" id="imagen" name="imagen">
                    <input type="hidden" name="image" id="image" value="<?php echo e($player->image); ?>">
                </fieldset>
                <fieldset>
                    <label for="team">Equipo:</label><br>
                    <select name="team">
                        <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($team->id); ?>" <?php if($team->id == $player->team_id): ?> selected <?php endif; ?> ><?php echo e($team->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </fieldset>
                <input class="buttonBlue" type="submit" value="Enviar">
            </form>
            <?php echo $__env->make('partials.back', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $attributes = $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
    </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $attributes = $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__attributesOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c)): ?>
<?php $component = $__componentOriginal1f9e5f64f242295036c059d9dc1c375c; ?>
<?php unset($__componentOriginal1f9e5f64f242295036c059d9dc1c375c); ?>
<?php endif; ?>

<?php /**PATH /var/www/html/resources/views/players/edit.blade.php ENDPATH**/ ?>
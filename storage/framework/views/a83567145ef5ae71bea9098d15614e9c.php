<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($image),'imageFondo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($imageFondo),'socialmedias' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($socialmedias),'teams' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teams)]); ?>
     <?php $__env->slot('title', null, []); ?> Socialmedia <?php $__env->endSlot(); ?>
    <main class="flex flex-col items-center">
        <?php echo $__env->make('partials.errors', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <form id="formCreateSocialMedia" method="post" action="<?php echo e(route('teamsmedias.update', $socialmediaEdit->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <fieldset>
                <label for="media">Red social:</label>
                <select name="media" class="media" id="media">

                    <?php $__currentLoopData = $medias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($media->id); ?>"
                                <?php if($media->id == $socialmediaEdit->id): ?>
                                    selected
                            <?php endif; ?>><?php echo e($media->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </fieldset>
            <fieldset>
                <label for="name">Nombre:</label>
                <input id="name" type="text" name="name" value="<?php echo e($socialmediaEdit->name); ?>">
            </fieldset>
            <fieldset>
                <label for="link">Link:</label>
                <input id="link" type="url" name="link" value="<?php echo e($socialmediaEdit->link); ?>">
            </fieldset>
            <input type="submit" value="Enviar">
        </form>
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
<?php /**PATH C:\Users\DEEPGAMING\Desktop\pioesportsbueno\Proyecto-Final-Daw-2024-2025-Francesc-Sora-Quevedo\resources\views/teamsmedias/edit.blade.php ENDPATH**/ ?>
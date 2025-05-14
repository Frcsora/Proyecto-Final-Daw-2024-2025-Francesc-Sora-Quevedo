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
     <?php $__env->slot('title', null, []); ?> News <?php $__env->endSlot(); ?>
    <?php if (isset($component)) { $__componentOriginal65e0bd0aeed8a21b598c76606db79d38 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal65e0bd0aeed8a21b598c76606db79d38 = $attributes; } ?>
<?php $component = App\View\Components\Main::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Main::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
             <?php $__env->slot('show', null, []); ?>  <?php $__env->endSlot(); ?>
            <h2 class="text-3xl"><?php echo e($newsvar->title); ?></h2>
            <small>Creado por <?php echo e($newsvar->user->name); ?> el <?php echo e($newsvar->created_at); ?></small><br>
            <img class="lg:w-96 rounded-lg max-h-96" src="<?php echo e($newsvar->image); ?>" alt="imagen noticia">
            <p class="bg-white p-1"><?php echo e($newsvar->text); ?></p>
            <?php if(count($newsvar->tags) > 0): ?>
                <p>
                    Etiquetas:
                    <?php $__currentLoopData = $newsvar->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <a href="<?php echo e(route('tags.show', $tag->id)); ?>"><?php echo e($tag->tag); ?></a><?php echo e(" "); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            <?php endif; ?>
            <?php if(Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin'])): ?>
                <a href="<?php echo e(route('news.edit', $newsvar->id)); ?>">Editar</a>
                <form method="POST" action="<?php echo e(route('news.destroy', $newsvar->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <input class="buttonRed" type="submit" value="Eliminar noticia">
                </form>
            <?php endif; ?>
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
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal65e0bd0aeed8a21b598c76606db79d38)): ?>
<?php $attributes = $__attributesOriginal65e0bd0aeed8a21b598c76606db79d38; ?>
<?php unset($__attributesOriginal65e0bd0aeed8a21b598c76606db79d38); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal65e0bd0aeed8a21b598c76606db79d38)): ?>
<?php $component = $__componentOriginal65e0bd0aeed8a21b598c76606db79d38; ?>
<?php unset($__componentOriginal65e0bd0aeed8a21b598c76606db79d38); ?>
<?php endif; ?>
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

<?php /**PATH /mnt/c/Users/franc/Desktop/piopioesports/piopioesports/resources/views/news/show.blade.php ENDPATH**/ ?>
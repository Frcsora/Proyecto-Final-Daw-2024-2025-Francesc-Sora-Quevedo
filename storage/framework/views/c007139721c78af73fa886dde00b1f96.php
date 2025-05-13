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
         <?php $__env->slot('newsindex', null, []); ?>  <?php $__env->endSlot(); ?>
        <?php if (isset($component)) { $__componentOriginalcee70f1acfea662afbe7691878e7b99e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcee70f1acfea662afbe7691878e7b99e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cards-div','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cards-div'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

            <?php $__empty_1 = true; $__currentLoopData = $newsvar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if (isset($component)) { $__componentOriginal71e3226cf3fe2778b596d213467290d3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal71e3226cf3fe2778b596d213467290d3 = $attributes; } ?>
<?php $component = App\View\Components\Newscard::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('newscard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Newscard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->id),'fecha' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->created_at->format('d M Y H:m:s')),'tags' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->tags),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->user->name),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->title),'img' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->image),'sinopsis' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->abstract)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal71e3226cf3fe2778b596d213467290d3)): ?>
<?php $attributes = $__attributesOriginal71e3226cf3fe2778b596d213467290d3; ?>
<?php unset($__attributesOriginal71e3226cf3fe2778b596d213467290d3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71e3226cf3fe2778b596d213467290d3)): ?>
<?php $component = $__componentOriginal71e3226cf3fe2778b596d213467290d3; ?>
<?php unset($__componentOriginal71e3226cf3fe2778b596d213467290d3); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <h1>No hay noticias que mostrar</h1>
            <?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcee70f1acfea662afbe7691878e7b99e)): ?>
<?php $attributes = $__attributesOriginalcee70f1acfea662afbe7691878e7b99e; ?>
<?php unset($__attributesOriginalcee70f1acfea662afbe7691878e7b99e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcee70f1acfea662afbe7691878e7b99e)): ?>
<?php $component = $__componentOriginalcee70f1acfea662afbe7691878e7b99e; ?>
<?php unset($__componentOriginalcee70f1acfea662afbe7691878e7b99e); ?>
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

<?php /**PATH /var/www/html/resources/views/news/index.blade.php ENDPATH**/ ?>
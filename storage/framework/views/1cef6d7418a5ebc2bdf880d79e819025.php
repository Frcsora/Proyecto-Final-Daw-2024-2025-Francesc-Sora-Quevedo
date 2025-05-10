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

    <main>
        <div class="noticia">
            <h2><?php echo e($newsvar->title); ?></h2>
            <small>Creado por <?php echo e($newsvar->user->name); ?> el <?php echo e($newsvar->created_at); ?></small><br>
            <img src="<?php echo e($newsvar->image); ?>" alt="imagen noticia">
            <p><?php echo e($newsvar->text); ?></p>
            <?php if(isset($newsvar->tags)): ?>
                <p>
                    Etiquetas:
                    <?php $__currentLoopData = $newsvar->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <a href="<?php echo e(route('tags.show', $tag->id)); ?>"><?php echo e($tag->tag); ?></a><?php echo e(" "); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            <?php endif; ?>
            <?php if(Auth::check() && (Auth::user()->role === "admin" || Auth::user()->role === "superadmin")): ?>
                <a href="<?php echo e(route('news.edit', $newsvar->id)); ?>">Editar</a>
                <form method="POST" action="<?php echo e(route('news.destroy', $newsvar->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <input type="submit" value="Eliminar noticia">
                </form>
            <?php endif; ?>
        </div>
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

<?php /**PATH /var/www/html/resources/views/news/show.blade.php ENDPATH**/ ?>
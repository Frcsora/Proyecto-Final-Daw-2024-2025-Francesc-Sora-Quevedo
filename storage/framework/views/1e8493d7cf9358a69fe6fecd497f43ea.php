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
     <?php $__env->slot('title', null, []); ?> Admin <?php $__env->endSlot(); ?>
    <main>
        <div class="tarjetasAdmin">
            <div class="admindiv">
                <h3>Usuarios</h3>
                <a href="<?php echo e(route('users.index')); ?>">Ver</a>
            </div>
            <div class="admindiv">
                <h3>Noticias</h3>
                <a href="<?php echo e(route('news.index')); ?>">Ver</a>
                <a href="<?php echo e(route('news.create')); ?>">Crear</a>
            </div>
            <div class="admindiv">
                <h3>Tags</h3>
                <a href="<?php echo e(route('tags.index')); ?>">Ver</a>
                <a href="<?php echo e(route('tags.create')); ?>">Crear</a>
            </div>
            <div class="admindiv">
                <h3>Imagenes</h3>
                <a href="<?php echo e(route('images.index')); ?>">Ver</a>
            </div>
            <div class="admindiv">
                <h3>Redes sociales</h3>
                <a href="<?php echo e(route('socialmedia.index')); ?>">Ver</a>
            </div>
            <div class="admindiv">
                <h3>Juegos</h3>
                <a href="<?php echo e(route('games.index')); ?>">Ver</a>
                <a href="<?php echo e(route('games.create')); ?>">Crear</a>
            </div>
            <div class="admindiv">
                <h3>Equipos</h3>
                <a href="<?php echo e(route('teams.index')); ?>">Ver</a>
                <a href="<?php echo e(route('teams.create')); ?>">Crear</a>
            </div>

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

<?php /**PATH /var/www/html/resources/views//administracion.blade.php ENDPATH**/ ?>
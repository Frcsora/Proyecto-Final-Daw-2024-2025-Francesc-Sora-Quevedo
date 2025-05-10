<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title','img','sinopsis','tags', 'name', 'fecha','id']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title','img','sinopsis','tags', 'name', 'fecha','id']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<div class="tarjeta">
    <h2><a href="<?php echo e(route('news.show', $id)); ?>"><?php echo e($title); ?></a></h2>
    <small>Creado por <?php echo e($name); ?> el <?php echo e($fecha); ?></small>
    <img src="<?php echo e($img); ?>" alt="imagen noticia">
    <p><?php echo e($sinopsis); ?></p>
    <?php if(count($tags) > 0): ?>
        <p>
            Etiquetas:
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('tags.show', $tag->id)); ?>"><?php echo e($tag->tag); ?></a><?php echo e(" "); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>
    <?php endif; ?>
    <?php if(Auth::check() && (Auth::user()->role == "admin" || Auth::user()->role == "superadmin")): ?>
        <a href="<?php echo e(route("news.edit", $id)); ?>">Editar</a>
        <form method="POST" action="<?php echo e(route('news.destroy', $id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <input type="submit" value="Eliminar noticia">
        </form>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/html/resources/views/components/newscard.blade.php ENDPATH**/ ?>
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
<div class="gap-3 rounded-lg before:rounded-lg tarjeta p-2 flex flex-col justify-around items-center relative before:absolute before:opacity-80 before:bg-[wheat] before:p-2 before:w-full before:h-full before:content[''] before:z-[-1]">
    <h2 class="text-4xl"><a href="<?php echo e(route('news.show', $id)); ?>"><?php echo e($title); ?></a></h2>
    <small>Creado por <?php echo e($name); ?> el <?php echo e($fecha); ?></small>
    <img class="rounded-lg w-80 max-h-48" src="<?php echo e($img); ?>" alt="imagen noticia">
    <p class="bg-white"><?php echo e($sinopsis); ?></p>

    <?php if(count($tags) > 0): ?>
        <p>
            Etiquetas:
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('tags.show', $tag->id)); ?>"><?php echo e($tag->tag); ?></a><?php echo e(" "); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </p>
    <?php endif; ?>
    <?php if(Auth::check() && in_array(Auth::User()->role, ['admin', 'superadmin'])): ?>
        <a href="<?php echo e(route("news.edit", $id)); ?>">Editar</a>
        <form method="POST" action="<?php echo e(route('news.destroy', $id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <input class="buttonRed" type="submit" value="Eliminar noticia">
        </form>
    <?php endif; ?>
</div>
<?php /**PATH /mnt/c/Users/DEEPGAMING/desktop/pioesportsbueno/Proyecto-Final-Daw-2024-2025-Francesc-Sora-Quevedo/resources/views/components/newscard.blade.php ENDPATH**/ ?>
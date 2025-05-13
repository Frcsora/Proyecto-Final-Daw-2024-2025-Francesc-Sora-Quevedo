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
    <main class="flex flex-col">
        <?php echo $__env->make('partials.errors', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
            <form class="gap-1" id="formImage" method="post" action="<?php echo e(route('news.update', $newsvar->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="id_user" value="<?php echo e(Auth::user()->id); ?>">
                <fieldset id="dropeo">
                    <label for="image">Imagen:</label><br>
                    <input type="file" id="imagen" name="imagen" alt="imagen noticia">
                    <input type="hidden" name="image" id="image" value="<?php echo e($newsvar->image); ?>">
                </fieldset>
                <fieldset>
                    <label for="title">Título:</label><br>
                    <input placeholder="titulo de la noticia" type="text" name="title" id="title" value="<?php echo e($newsvar->title); ?>">
                </fieldset>
                <fieldset>
                    <label for="abstract">Sinopsis:</label><br>
                    <textarea name="abstract" id="abstract" placeholder="sinopsis del a noticia" cols="100" rows="5"><?php echo e($newsvar->abstract); ?></textarea>
                </fieldset>
                <fieldset>
                    <label for="news">Noticia:</label><br>
                    <textarea name="news" id="news" placeholder="noticia" cols="100" rows="10"><?php echo e($newsvar->text); ?></textarea>
                </fieldset>
                <fieldset>
                    <label for="tags">Tags</label><br>
                    <select name="tags" id="tags">
                        <option value="">Selecciona tags</option>
                        <?php $__currentLoopData = $alltags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tag->id); ?>-<?php echo e($tag->tag); ?>"><?php echo e(ucfirst($tag->tag)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="flex gap-1" id="tagdiv">
                        <?php $__currentLoopData = $newsvar->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="rounded bg-[grey] p-2" id="<?php echo e($tag->id); ?>">
                                <?php echo e($tag->tag); ?>

                                <button class="buttonRed">X</button>
                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <input type="hidden" name="taginput" value="" id="taginput">
                </fieldset>
                <input class="buttonBlue" type="submit" value="Enviar">
            </form>
            <button class="buttonBlue" id="back">Volver</button>

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

<?php
 ?><?php /**PATH /var/www/html/resources/views/news/edit.blade.php ENDPATH**/ ?>
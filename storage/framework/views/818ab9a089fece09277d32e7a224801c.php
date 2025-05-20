<?php if (isset($component)) { $__componentOriginal1f9e5f64f242295036c059d9dc1c375c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f9e5f64f242295036c059d9dc1c375c = $attributes; } ?>
<?php $component = App\View\Components\Layout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Layout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($image),'imageFondo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($imageFondo),'socialmedias' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($socialmedias),'tweets' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tweets),'sponsors' => '$sponsors','teams' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teams)]); ?>
     <?php $__env->slot('title', null, []); ?> aboutus <?php $__env->endSlot(); ?>
    <?php if (isset($component)) { $__componentOriginal65e0bd0aeed8a21b598c76606db79d38 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal65e0bd0aeed8a21b598c76606db79d38 = $attributes; } ?>
<?php $component = App\View\Components\Main::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Main::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tweets' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tweets),'sponsors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sponsors)]); ?>
        <section class="w-64 md:w-full rounded-lg before:rounded-lg p-2 flex md:flex-col justify-around items-center relative before:absolute before:opacity-70 before:bg-[wheat] before:p-2 before:w-full before:h-full before:content[''] before:z-[-1]">
            <section class="gap-4 p-2 flex flex-col justify-around items-center">
                <h1 class="text-xl md:text-2xl lg:text-4xl font-bold">Sobre nosotros</h1><br><br>
                <p>Pio Pio eSports es un club nacido para impulsar a las Islas Canarias en el mundo de los eSports y consolidar los deportes electrónicos como una disciplina legítima.<br><br>
                    Fundado por <a href="https://x.com/ToneStarkGame">ToneStark</a> y <a href="https://x.com/Minimousk">Minimouka</a>, nuestro proyecto busca profesionalizar los eSports y demostrar que son mucho más que un simple juego: son una disciplina que requiere estrategia, preparación y dedicación, al igual que cualquier otro deporte. Inspirados por el crecimiento global del sector y su reconocimiento como una verdadera competición de élite, queremos consolidar una estructura sólida que permita el desarrollo de talento en nuestra región. Nuestro nombre, Pio Pio eSports, representa el orgullo y la identidad canaria, uniendo a nuestra comunidad bajo un mismo grito de pasión y competitividad. A través de un enfoque serio y estructurado, trabajamos para que Canarias tenga un papel destacado en el futuro de los eSports.</p>
                <h2>Encuentranos en nuestras redes sociales</h2><br>
                <section class="">
                    <?php $__currentLoopData = $socialmedias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="text-2xl flex"><?php echo e($media->name); ?> - <a href="<?php echo e($media->link); ?>"><?php echo $media->medias->svg; ?></a></p><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </section>
            </section>
        </section>
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
<?php /**PATH /mnt/c/Users/DEEPGAMING/desktop/pioesportsbueno/Proyecto-Final-Daw-2024-2025-Francesc-Sora-Quevedo/resources/views/aboutus.blade.php ENDPATH**/ ?>
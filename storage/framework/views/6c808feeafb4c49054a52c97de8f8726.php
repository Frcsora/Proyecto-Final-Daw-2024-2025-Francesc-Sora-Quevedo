<?php
    use Illuminate\Support\Str;
?>
    <?php if(!empty($tweets)): ?>
    <section class="w-64 gap-4 sm:w-full text-md lg:text-2xl flex flex-col justify-around">

        <?php $__currentLoopData = $tweets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tweet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section data-tweet-id="<?php echo e($tweet['id']); ?>"
                     class="tweet border border-gray-800 cursor-pointer md:w-64 rounded-lg gap-2 bg-white shadow-md rounded-2xl p-4 md:p-6 border border-gray-200 transition hover:shadow-lg">
                <section class="flex flex-col md:flex-row md:items-center justify-between text-gray-500 text-sm">
                <span class="mb-1 md:mb-0">
                    🗓️ <?php echo e(\Carbon\Carbon::parse($tweet['created_at'])->format('d M Y H:i')); ?>

                </span>
                    <span class="text-blue-600 font-semibold">
                    <a href="https://x.com/PioPioEC">@PioPioEC</a>
                </span>
                </section>

                <section class="mt-3 text-gray-800 text-base leading-relaxed break-words whitespace-pre-line">
                    <?php if(Str::startsWith($tweet['text'], 'RT @')): ?>
                        <p class="text-sm text-gray-400 font-semibold mb-1">🔁 Retweet</p>
                    <?php endif; ?>

                    <?php echo nl2br(e($tweet['text'])); ?>

                </section>

                <?php if(!empty($tweet['url'])): ?>
                    <section class="mt-3">
                        <a href="<?php echo e($tweet['url']); ?>" target="_blank" class="inline-block text-blue-500 hover:underline break-all">
                            🔗 <?php echo e($tweet['url']); ?>

                        </a>
                    </section>
                <?php endif; ?>
                </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

<?php endif; ?>
<?php /**PATH /mnt/c/Users/DEEPGAMING/desktop/pioesportsbueno/Proyecto-Final-Daw-2024-2025-Francesc-Sora-Quevedo/resources/views/partials/tweets.blade.php ENDPATH**/ ?>
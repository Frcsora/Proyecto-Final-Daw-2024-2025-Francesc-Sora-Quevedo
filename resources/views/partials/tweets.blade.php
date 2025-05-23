@php
    use Illuminate\Support\Str;
@endphp
    @if(!empty($tweets))
    <section class="w-96 gap-4 text-md lg:text-2xl flex flex-col justify-around items-center">

        @foreach ($tweets as $tweet)
            <section data-tweet-id="{{ $tweet['id'] }}"
                     class="tweet border border-gray-800 cursor-pointer w-full rounded-lg gap-2 bg-white shadow-md rounded-2xl p-4 md:p-6 border border-gray-200 transition hover:shadow-lg">
                <section class="flex flex-col md:flex-row md:items-center justify-between text-gray-500 text-sm">
                <span class="mb-1 md:mb-0">
                    🗓️ {{ \Carbon\Carbon::parse($tweet['created_at'])->format('d M Y H:i') }}
                </span>
                    <span class="text-blue-600 font-semibold">
                    <a href="https://x.com/PioPioEC">@PioPioEC</a>
                </span>
                </section>

                <section class="mt-3 text-gray-800 text-base leading-relaxed break-words whitespace-pre-line">
                    @if (Str::startsWith($tweet['text'], 'RT @'))
                        <p class="text-sm text-gray-400 font-semibold mb-1">🔁 Retweet</p>
                    @endif

                    {!! nl2br(e($tweet['text'])) !!}
                </section>

                @if (!empty($tweet['url']))
                    <section class="mt-3">
                        <a href="{{ $tweet['url'] }}" target="_blank" class="inline-block text-blue-500 hover:underline break-all">
                            🔗 {{ $tweet['url'] }}
                        </a>
                    </section>
                @endif
                </section>
        @endforeach
    </section>

@endif

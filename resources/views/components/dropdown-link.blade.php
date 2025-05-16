<a {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-3xl leading-5 text-gray-700 dark:white hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out']) }}>
    @isset($svg)
        {!! $slot !!}
    @else
        {{ $slot }}
    @endisset

</a>

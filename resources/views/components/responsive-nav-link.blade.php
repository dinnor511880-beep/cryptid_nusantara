@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-blood-500 text-start text-base font-medium text-blood-400 bg-blood-900/20 focus:outline-none focus:text-blood-300 focus:bg-blood-900/30 focus:border-blood-400 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-400 hover:text-gray-200 hover:bg-abyss-200 hover:border-blood-700 focus:outline-none focus:text-gray-200 focus:bg-abyss-200 focus:border-blood-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

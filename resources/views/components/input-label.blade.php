@props(['value'])

<label {{ $attributes->merge(['class' => 'horror-label']) }}>
    {{ $value ?? $slot }}
</label>

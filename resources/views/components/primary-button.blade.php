<button {{ $attributes->merge(['type' => 'submit', 'class' => 'horror-btn']) }}>
    {{ $slot }}
</button>

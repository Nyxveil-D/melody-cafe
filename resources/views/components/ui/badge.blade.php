@props(['variant' => 'category'])

@php
    $variants = [
        'available' => 'bg-success/10 text-success',
        'unavailable' => 'bg-border/50 text-muted-text',
        'category' => 'bg-primary-soft text-secondary'
    ];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center px-3 py-1 rounded-pill text-xs font-semibold {$variants[$variant]}"]) }}>
    {{ $slot }}
</span>

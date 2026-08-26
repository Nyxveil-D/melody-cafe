@props(['variant' => 'info'])

@php
    $variants = [
        'success' => 'bg-success/10 text-success border-success/20',
        'error' => 'bg-error/10 text-error border-error/20',
        'warning' => 'bg-warning/10 text-warning border-warning/20',
        'info' => 'bg-primary-soft/50 text-secondary border-primary-soft'
    ];
@endphp

<div role="alert" {{ $attributes->merge(['class' => "p-4 rounded-input border {$variants[$variant]}"]) }}>
    {{ $slot }}
</div>

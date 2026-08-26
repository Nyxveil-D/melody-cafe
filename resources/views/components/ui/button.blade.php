@props(['variant' => 'primary', 'type' => 'button', 'loading' => false, 'href' => null])

@php
    $base = "inline-flex items-center justify-center font-semibold sentence-case transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:opacity-50 disabled:pointer-events-none rounded-input h-12 min-h-[48px] min-w-[44px] px-6 no-underline";
    $variants = [
        'primary' => "bg-primary text-white hover:bg-primary-hover active:bg-primary-hover",
        'secondary' => "bg-surface border border-border text-secondary hover:bg-surface-soft hover:text-primary active:bg-surface-soft",
        'tertiary' => "text-text hover:text-primary underline underline-offset-4",
        'destructive' => "bg-error text-white hover:bg-error/90 active:bg-error/90"
    ];
    $classes = "$base {$variants[$variant]}";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }} @if($loading) disabled @endif>
        {{ $slot }}
    </button>
@endif

@props(['heading' => null])

<div {{ $attributes->merge(['class' => 'bg-surface border border-border rounded-md p-6']) }}>
    @if($heading)
        <h3 class="text-xl font-bold text-text mb-4">{{ $heading }}</h3>
    @endif
    {{ $slot }}
</div>

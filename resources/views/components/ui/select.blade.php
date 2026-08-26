@props(['label', 'name', 'options' => [], 'error' => null, 'required' => false])

<div class="space-y-1">
    <label for="{{ $name }}" class="block text-sm font-semibold text-text">
        {{ $label }} @if($required)<span class="text-error">*</span>@endif
    </label>
    <select 
        id="{{ $name }}" 
        name="{{ $name }}" 
        {{ $attributes->merge(['class' => 'w-full h-input px-4 rounded-input border ' . ($error ? 'border-error' : 'border-border') . ' focus:border-primary focus:ring-1 focus:ring-primary bg-surface']) }}
    >
        {{ $slot }}
    </select>
    @if($error)
        <p class="text-sm text-error">{{ $error }}</p>
    @endif
</div>

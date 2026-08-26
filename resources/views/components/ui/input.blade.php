@props(['label', 'name', 'error' => null, 'required' => false, 'helper' => null])

<div class="space-y-1">
    <label for="{{ $name }}" class="block text-sm font-semibold text-text">
        {{ $label }} @if($required)<span class="text-error">*</span>@endif
    </label>
    <input 
        id="{{ $name }}" 
        name="{{ $name }}" 
        {{ $attributes->merge(['class' => 'w-full h-input px-4 rounded-input border ' . ($error ? 'border-error' : 'border-border') . ' focus:border-primary focus:ring-1 focus:ring-primary']) }}
        @if($error) aria-invalid="true" aria-describedby="{{ $name }}-error" @endif
    >
    @if($error)
        <p id="{{ $name }}-error" class="text-sm text-error">{{ $error }}</p>
    @elseif($helper)
        <p class="text-sm text-muted-text">{{ $helper }}</p>
    @endif
</div>

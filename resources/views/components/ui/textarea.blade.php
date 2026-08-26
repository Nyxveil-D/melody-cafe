@props(['label', 'name', 'error' => null, 'required' => false])

<div class="space-y-1">
    <label for="{{ $name }}" class="block text-sm font-semibold text-text">
        {{ $label }} @if($required)<span class="text-error">*</span>@endif
    </label>
    <textarea 
        id="{{ $name }}" 
        name="{{ $name }}" 
        {{ $attributes->merge(['class' => 'w-full min-h-[120px] p-4 rounded-input border ' . ($error ? 'border-error' : 'border-border') . ' focus:border-primary focus:ring-1 focus:ring-primary']) }}
    >{{ $slot }}</textarea>
    @if($error)
        <p class="text-sm text-error">{{ $error }}</p>
    @endif
</div>

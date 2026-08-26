@props(['name', 'category', 'price', 'description', 'available' => true])

<div class="bg-surface border border-border rounded-md p-5 flex flex-col h-full shadow-sm hover:shadow-md transition-shadow {{ $available ? '' : 'opacity-75' }}">
    <!-- Presentation Image Placeholder -->
    <div class="aspect-video bg-surface-soft rounded-input mb-4 flex flex-col items-center justify-center border border-border/50 p-4 text-center group relative overflow-hidden">
        <svg class="w-10 h-10 text-primary/40 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21a9 9 0 100-18 9 9 0 000 18z M18 10a6 6 0 01-12 0" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 6h8M10 3h4" />
        </svg>
        <span class="text-xs font-semibold text-muted-text/80">[Item Image Placeholder]</span>
    </div>

    <!-- Content -->
    <div class="flex-grow space-y-1.5">
        <div class="flex items-center justify-between">
            <p class="text-xs font-semibold text-primary uppercase tracking-wider font-sans">{{ $category }}</p>
            @if(!$available)
                <span class="text-xs font-semibold text-muted-text bg-border/60 px-2 py-0.5 rounded-pill">Unavailable</span>
            @endif
        </div>
        <h3 class="text-lg font-bold text-text font-sans leading-snug">{{ $name }}</h3>
        <p class="text-sm text-muted-text leading-relaxed">{{ $description }}</p>
    </div>

    <!-- Pricing Footer -->
    <div class="mt-5 pt-3 border-t border-border/60 flex justify-between items-center">
        <span class="text-lg font-bold text-text font-sans">{{ $price }}</span>
        @if($available)
            <span class="text-xs font-medium text-muted-text/70">Sample Item</span>
        @endif
    </div>
</div>

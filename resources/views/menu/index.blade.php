<x-layouts.app title="Menu Melody Cafe">
    <section class="py-12 md:py-20 animate-in fade-in duration-1000" aria-label="Menu">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <!-- Header -->
            <div class="text-center space-y-4">
                <h1 class="text-4xl sm:text-5xl font-display font-bold text-text">Menu Melody Cafe</h1>
                <p class="text-lg text-muted-text max-w-2xl mx-auto">
                    Nikmati sajian pilihan kami yang diracik dengan penuh cinta menggunakan bahan-bahan terbaik.
                </p>
            </div>

            <!-- Categories -->
            <div class="flex flex-wrap justify-center gap-2" role="tablist" aria-label="Kategori Menu">
                <a href="{{ route('menu.index') }}" 
                   class="px-4 py-2 rounded-pill text-sm font-medium transition-colors {{ !$activeCategory ? 'bg-primary text-white' : 'bg-surface-soft hover:bg-primary-soft text-text' }}">
                    Semua
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('menu.index', ['category' => $category->name]) }}"
                       class="px-4 py-2 rounded-pill text-sm font-medium transition-colors {{ $activeCategory === $category->name ? 'bg-primary text-white' : 'bg-surface-soft hover:bg-primary-soft text-text' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <!-- Items -->
            @if($items->isEmpty())
                <div class="py-20 text-center space-y-4">
                    <h3 class="text-xl font-bold text-text">Menu sedang dipersiapkan</h3>
                    <p class="text-muted-text">Belum ada hidangan yang tersedia untuk kategori ini.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 reveal">
                    @foreach($items as $item)
                        <div class="group hover:scale-[1.02] transition-all duration-300">
                            <x-ui.menu-card
                                name="{{ $item->name }}"
                                category="{{ $item->category->name }}"
                                price="Rp {{ number_format($item->price, 0, ',', '.') }}"
                                description="{{ $item->description }}"
                                :available="true"
                            />
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>

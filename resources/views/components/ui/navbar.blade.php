@props([
    'links' => [
        'Beranda' => '/',
        'Menu' => '/menu',
        'Reservasi' => '/reservation',
        'Tentang Kami' => '/#about',
        'Kontak' => '/#contact',
    ]
])

<nav class="bg-surface border-b border-border sticky top-0 z-40" aria-label="Navigasi Utama">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Brand Logo -->
            <div class="flex items-center">
                <a href="/" class="text-2xl font-display font-bold text-text hover:text-primary transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-sm py-1 px-1 no-underline">
                    Melody Cafe
                </a>
            </div>

            <!-- Desktop Nav Links -->
            <div class="hidden md:flex space-x-8 items-center">
                @foreach($links as $name => $url)
                    @php
                        $isActive = request()->is(ltrim($url, '/')) || (request()->is('/') && $url === '/');
                    @endphp
                    <a href="{{ $url }}"
                       class="text-base font-semibold transition-colors py-2 px-1 border-b-2 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-sm no-underline {{ $isActive ? 'text-primary border-primary' : 'text-text border-transparent hover:text-primary hover:border-primary-soft' }}">
                        {{ $name }}
                    </a>
                @endforeach
                <x-ui.button variant="primary" href="{{ route('reservation.create') }}">
                    Reservasi
                </x-ui.button>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="md:hidden flex items-center">
                <button type="button"
                        data-nav-toggle
                        aria-controls="mobile-menu"
                        aria-expanded="false"
                        aria-label="Buka menu navigasi"
                        class="text-text hover:text-primary p-2.5 min-h-[44px] min-w-[44px] inline-flex items-center justify-center font-semibold rounded-input border border-border bg-surface hover:bg-surface-soft transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                    <span class="mr-1.5 text-sm font-semibold">Menu</span>
                    <svg class="w-5 h-5 text-current" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Panel -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-border bg-surface-soft px-4 pt-4 pb-6 space-y-3 shadow-lg flex-col transition-all duration-200 ease-in-out">
        <div class="bg-surface p-3 rounded-panel border border-border/50 space-y-1">
            @foreach($links as $name => $url)
                @php
                    $isActive = request()->is(ltrim($url, '/')) || (request()->is('/') && $url === '/');
                @endphp
                <a href="{{ $url }}"
                   class="block py-3 px-4 text-base font-semibold rounded-md transition-colors min-h-[44px] flex items-center no-underline {{ $isActive ? 'bg-primary-soft text-primary font-bold' : 'text-text hover:text-primary hover:bg-surface-soft' }}">
                    {{ $name }}
                </a>
            @endforeach
        </div>
        <div class="pt-2">
            <x-ui.button variant="primary" href="{{ route('reservation.create') }}" class="w-full text-center justify-center py-3">
                Reservasi Sekarang
            </x-ui.button>
        </div>
    </div>
</nav>

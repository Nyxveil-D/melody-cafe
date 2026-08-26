<x-layouts.app title="Tempat Hangat untuk Momen Manis & Rasa yang Tak Terlupakan">
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in', 'fade-in', 'slide-in-from-bottom-8');
                        entry.target.classList.remove('opacity-0', 'translate-y-8');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.reveal').forEach(el => {
                el.classList.add('opacity-0', 'translate-y-8', 'transition-all', 'duration-700', 'ease-out');
                observer.observe(el);
            });
        });
    </script>

    <!-- Hero Section -->
    <section class="py-12 md:py-20 lg:py-28 overflow-hidden animate-in fade-in duration-1000" aria-label="Beranda">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                <!-- Hero Left -->
                <div class="lg:col-span-7 space-y-6 md:space-y-8">
                    <div class="inline-flex items-center space-x-2 bg-surface-soft border border-primary-soft text-primary font-semibold rounded-pill px-4 py-1.5 text-xs sm:text-sm">
                        <span>Disiapkan Segar Setiap Hari</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-display font-bold text-text leading-[1.08] tracking-tight">
                        Tempat Hangat untuk <span class="text-primary italic font-serif">Momen Manis</span> & Rasa yang Tak Terlupakan
                    </h1>

                    <p class="text-base sm:text-lg text-muted-text leading-relaxed max-w-2xl">
                        Selamat datang di Melody Cafe — tempat peristirahatan yang tenang dan elegan, menyajikan kopi pilihan, teh artisan, serta hidangan lezat buatan kami dengan penuh cinta.
                    </p>

                    <div class="flex flex-wrap gap-4 pt-2">
                        <x-ui.button variant="primary" href="{{ route('menu.index') }}" class="hover:scale-105 transition-transform duration-200">
                            Lihat Menu Kami
                        </x-ui.button>
                        <x-ui.button variant="secondary" href="{{ route('reservation.create') }}" class="hover:scale-105 transition-transform duration-200">
                            Reservasi Meja
                        </x-ui.button>
                    </div>
                </div>

                <!-- Hero Right -->
                <div class="lg:col-span-5 hover:rotate-1 transition-transform duration-500">
                    <div class="relative bg-surface border border-border rounded-panel p-6 sm:p-8 shadow-md">
                        <div class="aspect-[4/3] bg-surface-soft rounded-feature border border-primary-soft/60 flex flex-col items-center justify-center p-6 text-center relative overflow-hidden">
                            <div class="absolute -top-12 -right-12 w-40 h-40 rounded-full bg-primary-soft/30 pointer-events-none"></div>
                            <div class="relative z-10 space-y-3">
                                <div class="w-20 h-20 mx-auto rounded-full bg-surface border border-border flex items-center justify-center shadow-sm">
                                    <svg class="w-10 h-10 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 1v3M10 1v3M14 1v3" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-display font-bold text-text">Melody Cafe Signature</h3>
                                <p class="text-xs text-muted-text max-w-xs mx-auto">Seni dekoratif asli kafe.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu Section -->
    <section id="menu" class="reveal py-12 md:py-20 bg-surface border-y border-border" aria-label="Menu Unggulan">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div class="space-y-2">
                    <span class="text-xs font-semibold text-primary uppercase tracking-wider font-sans">Pilihan Musiman</span>
                    <h2 class="text-3xl sm:text-4xl font-display font-bold text-text">Menu Favorit</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach([
                    ['name' => 'Rose Velvet Latte', 'cat' => 'Kopi Signature', 'price' => 'Rp 38.000', 'desc' => 'Espresso dengan sirup mawar organik, susu oat kukus lembut.'],
                    ['name' => 'Strawberry Cream Shortcake', 'cat' => 'Pastry Segar', 'price' => 'Rp 45.000', 'desc' => 'Sponge cake ringan berlapis krim kocok segar dan stroberi.'],
                    ['name' => 'Matcha Blossom Tea', 'cat' => 'Teh Spesialis', 'price' => 'Rp 32.000', 'desc' => 'Matcha Uji dengan madu bunga lembut dan susu almond.'],
                    ['name' => 'Honey Butter Croissant', 'cat' => 'Pastry Segar', 'price' => 'Rp 28.000', 'desc' => 'Croissant renyah dengan glasir madu bunga liar.']
                ] as $item)
                    <div class="group hover:scale-[1.02] transition-all duration-300">
                        <x-ui.menu-card
                            :name="$item['name']"
                            :category="$item['cat']"
                            :price="$item['price']"
                            :description="$item['desc']"
                            :available="true"
                        />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Cafe Promise Section -->
    <section class="reveal py-12 md:py-20" aria-label="Janji Kafe">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-surface border border-border rounded-panel p-8 md:p-14 shadow-sm">
                <div class="text-center space-y-2 max-w-2xl mx-auto mb-12">
                    <h2 class="text-3xl sm:text-4xl font-display font-bold text-text">Kami Hadir untuk Anda</h2>
                    <p class="text-sm sm:text-base text-muted-text">Setiap detail kami buat dengan penuh perhatian.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12 divide-y md:divide-y-0 md:divide-x divide-border">
                    <div class="pt-6 md:pt-0 md:px-6 first:px-0 space-y-3">
                        <span class="text-xs font-bold text-accent uppercase tracking-widest font-sans">Pillar 01</span>
                        <h3 class="text-xl font-bold text-text font-sans">Disiapkan Segar</h3>
                        <p class="text-sm text-muted-text">Dibuat dalam kelompok kecil setiap pagi.</p>
                    </div>
                    <div class="pt-6 md:pt-0 md:px-6 space-y-3">
                        <span class="text-xs font-bold text-accent uppercase tracking-widest font-sans">Pillar 02</span>
                        <h3 class="text-xl font-bold text-text font-sans">Suasana Nyaman</h3>
                        <p class="text-sm text-muted-text">Cahaya lembut dan suasana yang tenang.</p>
                    </div>
                    <div class="pt-6 md:pt-0 md:px-6 space-y-3">
                        <span class="text-xs font-bold text-accent uppercase tracking-widest font-sans">Pillar 03</span>
                        <h3 class="text-xl font-bold text-text font-sans">Layanan Ramah</h3>
                        <p class="text-sm text-muted-text">Kehangatan dan kepedulian untuk setiap tamu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Atmosphere Section -->
    <section id="about" class="reveal py-12 md:py-20 bg-surface border-y border-border" aria-label="Suasana">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-6 space-y-6">
                    <h2 class="text-3xl sm:text-4xl font-display font-bold text-text">
                        Dirancang untuk Momen Tenang & Senyuman Bersama
                    </h2>
                    <p class="text-base text-muted-text leading-relaxed">
                        Jauhkan diri Anda dari hiruk-pikuk hari ini ke dalam ruang hangat yang penuh dengan pencahayaan lembut. Melody Cafe menawarkan jeda lembut dalam hari Anda.
                    </p>
                </div>
                <div class="lg:col-span-6">
                    <div class="bg-surface-soft border border-primary-soft rounded-panel p-8 text-center space-y-4 shadow-inner">
                        <div class="aspect-[16/10] bg-surface rounded-md border border-border flex flex-col items-center justify-center p-6">
                            <span class="text-sm font-semibold text-text">[Suasana Placeholder]</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reservation CTA Section -->
    <section id="reservation" class="reveal py-12 md:py-20" aria-label="Reservasi Meja">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-primary-soft/30 border border-primary-soft rounded-panel p-16 text-center space-y-6">
                <h2 class="text-4xl font-display font-bold text-text">Rencanakan Kunjungan Anda</h2>
                <x-ui.button variant="primary" href="{{ route('reservation.create') }}" class="px-8 py-4 text-lg hover:scale-110 transition-transform">
                    Reservasi Sekarang
                </x-ui.button>
            </div>
        </div>
    </section>

    <!-- Visit Us Section -->
    <section id="contact" class="reveal py-12 md:py-20 bg-surface border-t border-border" aria-label="Kunjungi Kami">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            <div class="text-center space-y-2 max-w-xl mx-auto">
                <h2 class="text-3xl font-display font-bold text-text">Kunjungi Kami</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-background border border-border rounded-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-bold text-text">Lokasi</h3>
                    <p class="text-sm text-muted-text">123 Cafe Street, Kota Melodi</p>
                </div>
                <div class="bg-background border border-border rounded-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-bold text-text">Jam Operasional</h3>
                    <p class="text-sm text-muted-text">08:00 – 18:00</p>
                </div>
                <div class="bg-background border border-border rounded-md p-6 hover:shadow-lg transition-shadow">
                    <h3 class="text-lg font-bold text-text">Hubungi Kami</h3>
                    <p class="text-sm text-muted-text">info@melodycafe.example</p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
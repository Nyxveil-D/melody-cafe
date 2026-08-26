<x-layouts.app title="Reservasi Meja">
    <section class="py-12 md:py-20 animate-in fade-in duration-1000" aria-label="Reservasi Meja">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            <div class="text-center space-y-4">
                <h1 class="text-4xl sm:text-5xl font-display font-bold text-text">Reservasi Meja</h1>
                <p class="text-lg text-muted-text">Rencanakan momen spesial Anda bersama Melody Cafe.</p>
            </div>

            @if(session('success'))
                <x-ui.alert type="success" class="mb-6">
                    {{ session('success') }}
                </x-ui.alert>
            @endif

            <form action="{{ route('reservation.store') }}" method="POST" class="bg-surface p-8 rounded-panel border border-border shadow-sm space-y-8">
                @csrf
                
                <div class="space-y-4">
                    <h2 class="text-xl font-bold font-display text-text border-b border-border pb-2">Data Pemesan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-ui.input label="Nama" name="customer_name" required value="{{ old('customer_name') }}" />
                        <x-ui.input label="Email" name="email" type="email" required value="{{ old('email') }}" />
                        <x-ui.input label="Nomor Telepon" name="phone" type="tel" required value="{{ old('phone') }}" />
                    </div>
                </div>

                <div class="space-y-4">
                    <h2 class="text-xl font-bold font-display text-text border-b border-border pb-2">Detail Reservasi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-ui.input label="Tanggal" name="reservation_date" type="date" required value="{{ old('reservation_date') }}" />
                        <x-ui.input label="Waktu" name="reservation_time" type="time" required value="{{ old('reservation_time') }}" />
                        <x-ui.input label="Jumlah Tamu" name="guest_count" type="number" min="1" max="20" required value="{{ old('guest_count') }}" />
                    </div>
                    <x-ui.textarea label="Permintaan Khusus" name="special_request" rows="3">{{ old('special_request') }}</x-ui.textarea>
                </div>

                <x-ui.button variant="primary" type="submit" class="w-full justify-center">
                    Kirim Permintaan Reservasi
                </x-ui.button>
            </form>
        </div>
    </section>
</x-layouts.app>

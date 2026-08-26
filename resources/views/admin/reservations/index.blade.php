<x-layouts.app title="Reservasi Admin">
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">Reservasi</h1>
        <div class="bg-surface p-6 rounded-panel shadow-sm">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-border">
                        <th class="py-3">Nama</th>
                        <th class="py-3">Tanggal</th>
                        <th class="py-3">Waktu</th>
                        <th class="py-3">Status</th>
                        <th class="py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $r)
                        <tr class="border-b border-border">
                            <td class="py-4">{{ $r->customer_name }}</td>
                            <td class="py-4">{{ $r->reservation_date->format('d M Y') }}</td>
                            <td class="py-4">{{ $r->reservation_time->format('H:i') }}</td>
                            <td class="py-4">
                                <span class="px-2 py-1 rounded-pill text-xs font-bold 
                                    {{ $r->status === 'confirmed' ? 'bg-success text-white' : ($r->status === 'pending' ? 'bg-accent text-white' : 'bg-muted-text text-white') }}">
                                    {{ ucfirst($r->status) }}
                                </span>
                            </td>
                            <td class="py-4">
                                <a href="{{ route('admin.reservations.show', $r) }}" class="text-primary hover:underline">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">{{ $reservations->links() }}</div>
        </div>
    </div>
</x-layouts.app>

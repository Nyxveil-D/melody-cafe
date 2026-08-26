<x-layouts.app title="Detail Reservasi">
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">Detail Reservasi #{{ $reservation->id }}</h1>
        <div class="bg-surface p-6 rounded-panel shadow-sm space-y-4">
            <p><strong>Nama:</strong> {{ $reservation->customer_name }}</p>
            <p><strong>Email:</strong> {{ $reservation->email }}</p>
            <p><strong>Status:</strong> {{ ucfirst($reservation->status) }}</p>
            
            <form action="{{ route('admin.reservations.update', $reservation) }}" method="POST" class="mt-6 border-t pt-4">
                @csrf
                @method('PATCH')
                <select name="status" class="p-2 border rounded-md">
                    @foreach(['pending', 'confirmed', 'rejected', 'cancelled'] as $s)
                        <option value="{{ $s }}" {{ $reservation->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md ml-2">Update Status</button>
            </form>
        </div>
    </div>
</x-layouts.app>

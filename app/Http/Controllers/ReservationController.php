<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ReservationController extends Controller
{
    public function create(): View
    {
        return view('reservation.create');
    }

    public function store(StoreReservationRequest $request): RedirectResponse
    {
        Reservation::create($request->validated());

        return redirect()->route('reservation.create')
            ->with('success', 'Permintaan reservasi Anda telah diterima. Tim Melody Cafe akan segera mengonfirmasi reservasi Anda.');
    }
}

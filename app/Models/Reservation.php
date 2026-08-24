<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'phone',
        'email',
        'reservation_date',
        'reservation_time',
        'guest_count',
        'special_request',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'reservation_date' => 'date',
            'reservation_time' => 'datetime:H:i:s',
            'guest_count' => 'integer',
        ];
    }
}

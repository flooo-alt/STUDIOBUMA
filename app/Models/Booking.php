<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable = [
        'nama',
        'nowa',
        'booking_type',
        'paket',
        'jumlah_orang',
        'tanggal_pelayanan',
        'jam_pelayanan',
        'status',
    ];

    protected $casts = [
        'tanggal_pelayanan' => 'date',
        'jam_pelayanan' => 'datetime:H:i',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudioGrup extends Model
{
    protected $table = 'studio_grup';

    protected $fillable = [
        'booking_code',
        'no_whatsapp',
        'name',
        'package',
        'person',
        'jam',
        'tanggal',
        'status'
    ];
}

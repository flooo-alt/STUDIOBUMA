<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\StudioGrup;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function store(Request $request)
    {
        $booking = StudioGrup::create([
            'booking_code' => 'BM-' . strtoupper(Str::random(6)),
            'name' => $request->name,
            'no_whatsapp' => $request->no_whatsapp,
            'category' => $request->category,
            'package' => $request->package,
            'person' => $request->person,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
        ]);

        return redirect()->route('booking.status', $booking->booking_code);
    }
}

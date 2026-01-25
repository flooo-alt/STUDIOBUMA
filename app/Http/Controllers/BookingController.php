<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function create()
    {
        return view('Booking');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nowa' => 'required|string',
            'booking_type' => 'required|in:grup,family',
            'paket' => 'required|string',
            'jumlah_orang' => 'required|integer|min:1',
            'tanggal_pelayanan' => 'required|date|after_or_equal:today',
            'jam_pelayanan' => 'required|date_format:H:i'
        ]);

        Booking::create([
            'nama' => $request->nama,
            'nowa' => $request->nowa,
            'booking_type' => $request->booking_type,
            'paket' => $request->paket,
            'jumlah_orang' => $request->jumlah_orang,
            'tanggal_pelayanan' => $request->tanggal_pelayanan,
            'jam_pelayanan' => $request->jam_pelayanan,
            'status' => 'pending'
        ]);

        return redirect('/Booking')->with('success', 'Booking berhasil! Tunggu konfirmasi dari admin.');
    }
}


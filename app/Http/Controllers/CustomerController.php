<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->get();

        return view('customer.dashboard', compact('bookings'));
    }

    public function tracker($id)
    {
        $booking = Booking::findOrFail($id);
        
        // Pastikan user hanya bisa lihat booking miliknya sendiri
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        return view('customer.tracker', compact('booking'));
    }
}

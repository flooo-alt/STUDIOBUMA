<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $bookings = Booking::where('nowa', $user->phone ?? '')->get();

        return view('customer.dashboard', compact('bookings'));
    }
}

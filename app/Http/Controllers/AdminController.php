<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        // Ambil semua data booking dari database
        $bookings = Booking::orderBy('tanggal_pelayanan', 'asc')->paginate(10);
        $totalBooking = Booking::count();
        $pendingBooking = Booking::where('status', 'pending')->count();
        $confirmedBooking = Booking::where('status', 'confirmed')->count();
        $completedBooking = Booking::where('status', 'completed')->count();

        // Kirim data ke view
        return view('admin.dasboard', compact('bookings', 'totalBooking', 'pendingBooking', 'confirmedBooking', 'completedBooking'));
    }

    public function bookingsList()
    {
        $status = request('status');
        
        $query = Booking::orderBy('tanggal_pelayanan', 'asc');
        
        if ($status) {
            $query->where('status', $status);
        }
        
        $bookings = $query->paginate(15);
        $totalBooking = Booking::count();
        $pendingBooking = Booking::where('status', 'pending')->count();
        $confirmedBooking = Booking::where('status', 'confirmed')->count();
        $completedBooking = Booking::where('status', 'completed')->count();

        return view('admin.bookings.index', compact('bookings', 'totalBooking', 'pendingBooking', 'confirmedBooking', 'completedBooking'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => $request->status]);
        
        return back()->with('success', 'Status booking berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        
        return back()->with('success', 'Booking berhasil dihapus.');
    }
}

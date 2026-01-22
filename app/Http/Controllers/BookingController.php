<?php
use App\Models\StudioGrup;
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
            'name' => 'required',
            'no_whatsapp' => 'required',
            'booking_type' => 'required',
            'package' => 'required',
            'person' => 'required|integer',
            'tanggal' => 'required|date',
            'jam' => 'required'
        ]);

        StudioGrup::create([
            'booking_code' => 'BOOK-' . strtoupper(Str::random(6)),
            'name' => $request->name,
            'no_whatsapp' => $request->no_whatsapp,
            'package' => $request->package,
            'person' => $request->person,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'status' => 'Booked'
        ]);

        return redirect('/booking')->with('success','Booking berhasil!');
    }
}

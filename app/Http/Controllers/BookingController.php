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

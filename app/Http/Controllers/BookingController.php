<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Tampilkan semua data booking (admin)
    public function index()
    {
        $bookings = Booking::latest()->paginate(10);
        return view('admin.booking.index', compact('bookings'));
    }

    // Tampilkan form booking (frontend)
    public function create()
    {
        return view('booking.create');
    }

    // Simpan booking baru (frontend)
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'layanan' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        Booking::create($data);

        return redirect()->back()->with('success', 'Booking berhasil dikirim!');
    }

    // Tampilkan detail booking (admin)
    public function show(Booking $booking)
    {
        return view('admin.booking.show', compact('booking'));
    }

    // Form edit booking (admin)
    public function edit(Booking $booking)
    {
        return view('admin.booking.edit', compact('booking'));
    }

    // Update data booking (admin)
    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'layanan' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $booking->update($data);

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil diperbarui!');
    }

    // Hapus booking (admin)
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dihapus!');
    }
}

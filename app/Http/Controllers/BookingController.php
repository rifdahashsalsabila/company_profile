<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'customer') {
            $bookings = Booking::where('user_id', $user->id)
                ->latest()
                ->paginate(10);
        }
        else if ($user->role === 'admin') {
            $bookings = Booking::latest()->paginate(10);
        }
        return view('admin.booking.index', compact('bookings'));
    }

    public function create()
    {
        return view('booking.create');
    }

    /**
     * Simpan booking baru (customer)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'layanan' => 'required|string|max:255',
            'tanggal' => 'required|date|after_or_equal:today',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'layanan' => $data['layanan'],
            'tanggal' => $data['tanggal'],
            'status'  => 'menunggu_konfirmasi',
        ]);

        return redirect()->back()->with('success', 'Booking berhasil dikirim!');
    }

    /**
     * Detail booking (admin)
     */
    public function show(Booking $booking)
    {
        return view('admin.booking.show', compact('booking'));
    }

    /**
     * Form edit booking (admin)
     */
    public function edit(Booking $booking)
    {
        return view('admin.booking.edit', compact('booking'));
    }

    /**
     * Update booking (admin)
     */
    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'layanan' => 'required|string|max:255',
            'tanggal' => 'required|date|after_or_equal:today',
            'status' => 'required|in:menunggu_konfirmasi,dikonfirmasi,dalam_antrian,menuju_alamat,selesai,dibatalkan',

        ]);

        $booking->update($data);

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil diperbarui!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu_konfirmasi,dikonfirmasi,dalam_antrian,menuju_alamat,selesai,dibatalkan'
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Status booking berhasil diubah!');
    }


    /**
     * Hapus booking (admin)
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dihapus!');
    }

    /**
     * Riwayat booking untuk customer
     */
    public function history()
    {
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();
        return view('booking.history', compact('bookings'));
    }
}

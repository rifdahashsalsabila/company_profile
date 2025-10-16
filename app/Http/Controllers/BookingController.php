<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Request $request)
{
    $user = Auth::user();

    // ✅ Validasi input search
    $request->validate([
        'search' => 'nullable|string|max:100'
    ], [
        'search.string' => 'Input pencarian harus berupa teks.',
        'search.max' => 'Pencarian maksimal 100 karakter.',
    ]);

    $search = $request->search;

    // 🔍 Query dasar tanpa relasi "search"
    $query = Booking::query()->with('user'); // gunakan relasi user, bukan 'search'

    // 🔍 Filter pencarian
    if ($request->filled('search')) {
        $query->where(function($q) use ($search) {
            $q->where('layanan', 'like', "%{$search}%")
              ->orWhere('status', 'like', "%{$search}%")
              ->orWhereDate('tanggal', $search)
              ->orWhereHas('user', function($q2) use ($search) {
                  $q2->where('name', 'like', "%{$search}%");
              });
        });
    }

    // 🔐 Filter role user
    if ($user->role === 'customer') {
        $query->where('user_id', $user->id);
    }

    // 🔁 Urutkan & paginasi
    $bookings = $query->latest()->paginate(10)->withQueryString();

    // 🚀 Kirim ke view
    return view('admin.booking.index', compact('bookings'));
}



    public function create()
    {
        $userId = auth()->id();

        // Ambil semua ID layanan yang sudah dibooking customer ini
        $bookedServiceIds = Booking::where('user_id', $userId)->pluck('layanan_id');

        // Ambil layanan yang belum dibooking
        $availableServices = Service::whereNotIn('id', $bookedServiceIds)->get();

        return view('booking.create', compact('availableServices'));
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
        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dikirim!');
}
        // return redirect()->route('admin.booking.index')->with('success', 'Booking berhasil ');

        // return redirect()->back()->with('success', 'Booking berhasil dikirim!');

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

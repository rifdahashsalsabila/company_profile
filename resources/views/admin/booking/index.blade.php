@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Data Booking</h3>
                 <a href="{{ route('booking.create') }}" class="btn btn-primary">+ Tambah layanan</a>

                {{-- 🔍 Form Search --}}
                <form 
                    action="{{ auth()->user()->role === 'admin' ? route('bookings.index') : route('bookings.index') }}" 
                    method="GET" 
                    class="form-inline"
                >
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control" 
                            placeholder="search"
                            value="{{ request('search') }}"
                        >
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            @if(request('search'))
                                <a href="{{ route('bookings.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Layanan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $booking->user->name ?? '-' }}</td>
                            <td>{{ $booking->layanan }}</td>
                            <td>{{ $booking->tanggal }}</td>

                            {{-- Kolom Status --}}
                            @if(auth()->check() && auth()->user()->role === 'admin')
                            <td>
                                <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select 
                                        name="status" 
                                        class="form-select form-select-sm" 
                                        onchange="this.form.submit()"
                                    >
                                        <option value="menunggu_konfirmasi" {{ $booking->status == 'menunggu_konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                        <option value="dikonfirmasi" {{ $booking->status == 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                                        <option value="dalam_antrian" {{ $booking->status == 'dalam_antrian' ? 'selected' : '' }}>Dalam Antrian</option>
                                        <option value="menuju_alamat" {{ $booking->status == 'menuju_alamat' ? 'selected' : '' }}>Menuju Alamat</option>
                                        <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="dibatalkan" {{ $booking->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                    </select>
                                </form>
                            </td>
                            @else
                            <td>{{ $booking->status }}</td>
                            @endif

                            {{-- Kolom waktu dan aksi --}}
                            <td>{{ $booking->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus booking ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Tidak ada data booking 
                                @if(request('search'))
                                    untuk pencarian <strong>"{{ request('search') }}"</strong>
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <br>
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</section>
@endsection

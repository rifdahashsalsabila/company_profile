@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-light text-dark border-0">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-table me-2 text-secondary"></i> Data Booking
                    </h3>

                    <div class="d-flex align-items-center gap-2">

                        {{-- Tombol Tambah --}}
                        @if(auth()->check() && auth()->user()->role === 'customer')
                        <a href="{{ route('bookings.create') }}" class="btn btn-outline-secondary border-0 shadow-sm">
                            <i class="fas fa-calendar-plus me-1"></i> Tambah layanan
                        </a>
                        @endif

                        {{-- Form Search --}}
                        <form action="{{ route('bookings.index') }}" method="GET" class="d-flex align-items-center">
                            <div class="input-group input-group-sm">
                                <input type="text" name="search"
                                    class="form-control border-0 shadow-sm bg-light text-dark"
                                    placeholder="Cari booking..."
                                    value="{{ request('search') }}">

                                <button class="btn btn-secondary shadow-sm" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>

                                @if(request('search'))
                                <a href="{{ route('bookings.index') }}" class="btn btn-outline-secondary shadow-sm">
                                    <i class="fas fa-times"></i>
                                </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0">
                    <thead class="table-secondary text-center">
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
                        <tr class="text-center">
                            <td class="text-start">{{ $booking->user->name ?? '-' }}</td>
                            <td>{{ $booking->layanan }}</td>
                            <td>{{ $booking->tanggal }}</td>

                            {{-- Status --}}
                            <td>
                                @php
                                $statusClasses = [
                                    'menunggu_konfirmasi' => 'bg-warning text-dark',
                                    'dikonfirmasi' => 'bg-secondary text-white',
                                    'dalam_antrian' => 'bg-light text-dark border',
                                    'menuju_alamat' => 'bg-info text-dark',
                                    'selesai' => 'bg-success text-white',
                                    'dibatalkan' => 'bg-danger text-white',
                                ];
                                @endphp

                                <span class="badge px-3 py-2 shadow-sm rounded-pill {{ $statusClasses[$booking->status] ?? 'bg-light text-dark' }}">
                                    {{ ucfirst(str_replace('_', ' ', $booking->status)) }}
                                </span>
                            </td>

                            <td>{{ $booking->created_at->format('d M Y H:i') }}</td>

                            {{-- Aksi --}}
                            <td class="text-nowrap">
                                <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-outline-info btn-sm shadow-sm me-1">Detail</a>

                                @if(auth()->check() && auth()->user()->role === 'customer')
                                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-outline-warning btn-sm shadow-sm me-1">Edit</a>
                                @endif

                                @if(auth()->check() && auth()->user()->role === 'admin')
                                <button class="btn btn-outline-secondary btn-sm shadow-sm me-1"
                                    data-toggle="modal"
                                    data-target="#statusModal{{ $booking->id }}">
                                    Ubah Status
                                </button>
                                @endif

                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm shadow-sm"
                                        onclick="return confirm('Yakin hapus booking ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-3">
                                Tidak ada data booking
                                @if(request('search'))
                                untuk pencarian <strong>"{{ request('search') }}"</strong>
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3 d-flex justify-content-end">
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modal --}}
@foreach($bookings as $booking)
@include('admin.booking.modal_status', ['booking' => $booking])
@endforeach

@endsection

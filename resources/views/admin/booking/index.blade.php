@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-light text-dark border-0">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h3 class="card-title mb-0"><i class="fas fa-table me-2 text-secondary"></i> Data Booking</h3>

                    <div class="d-flex align-items-center gap-2" style="gap: 10px;">
                        {{-- Tombol Tambah --}}
                        @if(auth()->check() && auth()->user()->role === 'customer')
                        <a href="{{ route('bookings.create') }}" class="btn btn-outline-secondary border-0 shadow-sm">
                            <i class="fas fa-calendar-plus me-1"></i> Tambah layanan
                        </a>
                        @endif

                        {{-- Form Search --}}
                        <form action="{{ route('bookings.index') }}" method="GET" class="d-flex align-items-center">
                            <div class="input-group input-group-sm">
                                <input
                                    type="text"
                                    name="search"
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
                                <button class="btn btn-outline-secondary btn-sm shadow-sm me-1" data-toggle="modal" data-target="#statusModal{{ $booking->id }}">
                                    Ubah Status
                                </button>
                                @endif

                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm shadow-sm" onclick="return confirm('Yakin hapus booking ini?')">Hapus</button>
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
<div class="modal fade" id="statusModal{{ $booking->id }}" tabindex="-1" aria-labelledby="statusModalLabel{{ $booking->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-sm rounded-3 border-0">
            <div class="modal-header bg-light text-dark border-bottom">
                <h5 class="modal-title" id="statusModalLabel{{ $booking->id }}">Ubah Status Booking</h5>
                <button type="button" class="close text-secondary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <p><strong>Customer:</strong> {{ $booking->user->name }}</p>
                    <p><strong>Layanan:</strong> {{ $booking->layanan }}</p>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control shadow-sm bg-light" required>
                            <option value="menunggu_konfirmasi" {{ $booking->status == 'menunggu_konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                            <option value="dikonfirmasi" {{ $booking->status == 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                            <option value="dalam_antrian" {{ $booking->status == 'dalam_antrian' ? 'selected' : '' }}>Dalam Antrian</option>
                            <option value="menuju_alamat" {{ $booking->status == 'menuju_alamat' ? 'selected' : '' }}>Menuju Alamat</option>
                            <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="dibatalkan" {{ $booking->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light shadow-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-secondary shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<style>
    .card-header {
        font-weight: 600;
        font-size: 1.1rem;
        background-color: #f7f7f7 !important;
    }

    table.table thead th {
        background: #e0e0e0;
        color: #333;
        font-weight: 600;
        text-align: center;
    }

    table.table tbody td {
        vertical-align: middle;
        background-color: #fcfcfc;
    }

    .badge {
        font-size: 0.85rem;
        font-weight: 500;
    }

    .btn {
        transition: all 0.25s ease;
        border-radius: 8px;
    }

    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    }

    .pagination .page-link {
        border-radius: 8px;
        border: 0;
        margin: 0 2px;
        color: #6c757d;
        font-weight: 500;
    }

    .pagination .page-item.active .page-link {
        background-color: #6c757d;
        color: #fff;
    }
</style>
@endsection
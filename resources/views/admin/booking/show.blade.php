@extends('admin.layouts.app')

@section('content')
<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-semibold text-dark mb-0">
             Detail Booking
        </h3>
        <a href="{{ route('bookings.index') }}"
            class="btn btn-light border rounded-pill px-4 py-2 fw-medium shadow-sm"
            style="color: #555;">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <!-- Data Customer -->
    <div class="card border-0 shadow-sm mb-4 rounded-4" style="background: #f9fafb;">
        <div class="card-header bg-light border-0 rounded-top-4 py-3">
            <h5 class="mb-0 fw-semibold text-secondary">
                <i class="fas fa-user me-2 text-muted"></i> Data Customer
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="row gy-4">
                <div class="col-md-6">
                    <small class="text-muted d-block">Nama</small>
                    <span class="fw-medium text-dark">{{ $booking->user->name }}</span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Email</small>
                    <span class="fw-medium text-dark">{{ $booking->user->email }}</span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">No HP</small>
                    <span class="fw-medium text-dark">{{ $booking->user->no_tlp ?? '-' }}</span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Alamat</small>
                    <span class="fw-medium text-dark">{{ $booking->user->alamat ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Booking -->
    <div class="card border-0 shadow-sm rounded-4" style="background: #f9fafb;">
        <div class="card-header bg-light border-0 rounded-top-4 py-3">
            <h5 class="mb-0 fw-semibold text-secondary">
                <i class="fas fa-file-alt me-2 text-muted"></i> Data Booking
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="row gy-4">
                <div class="col-md-6">
                    <small class="text-muted d-block">Layanan</small>
                    <span class="fw-medium text-dark">{{ $booking->layanan }}</span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Tanggal Booking</small>
                    <span class="fw-medium text-dark">
                        {{ \Carbon\Carbon::parse($booking->tanggal)->translatedFormat('d F Y') }}
                    </span>
                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Status</small>
                    @php
                    $statusColor = match($booking->status) {
                    'pending' => '#f8d775',
                    'selesai' => '#b4e197',
                    'batal' => '#f3a8a8',
                    default => '#c7c7c7'
                    };
                    @endphp

                </div>
                <div class="col-md-6">
                    <small class="text-muted d-block">Dibuat pada</small>
                    <span class="fw-medium text-dark">{{ $booking->created_at->format('d M Y H:i') }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    /* Card & hover effect */
    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    /* Tombol kembali */
    .btn-light:hover {
        background: #eef0f3;
        color: #222 !important;
        transition: all 0.3s ease;
        transform: translateY(-2px);
    }

    /* Responsive spacing */
    @media (max-width: 768px) {
        .card-body {
            padding: 1.5rem;
        }
    }
</style>
@endsection
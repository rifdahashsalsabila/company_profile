@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Detail Booking</h3>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Data Customer</h5> 
            <p><strong>Nama:</strong> {{ $booking->user->nama }}</p>
            <p><strong>Email:</strong> {{ $booking->user->email }}</p>
            <p><strong>No HP:</strong> {{ $booking->user->no_tlp ?? '-' }}</p>
            <p><strong>Alamat:</strong> {{ $booking->user->alamat ?? '-' }}</p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Data Booking</h5>
            <p><strong>Layanan:</strong> {{ $booking->layanan }}</p>
            <p><strong>Tanggal:</strong> {{ $booking->tanggal }}</p>
            <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
            <p><strong>Dibuat pada:</strong> {{ $booking->created_at->format('d M Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('bookings.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection

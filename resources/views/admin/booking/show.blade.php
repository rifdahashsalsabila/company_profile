@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Booking</h3>
                <div class="card-tools">
                    <a href="{{ url('/admin/booking') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Nama</dt>
                    <dd class="col-sm-9">{{ $booking->nama }}</dd>

                    <dt class="col-sm-3">Alamat</dt>
                    <dd class="col-sm-9">{{ $booking->alamat }}</dd>

                    <dt class="col-sm-3">No HP</dt>
                    <dd class="col-sm-9">{{ $booking->no_hp }}</dd>

                    <dt class="col-sm-3">Layanan</dt>
                    <dd class="col-sm-9">{{ $booking->layanan }}</dd>

                    <dt class="col-sm-3">Tanggal Booking</dt>
                    <dd class="col-sm-9">{{ $booking->tanggal }}</dd>

                    <dt class="col-sm-3">Dibuat pada</dt>
                    <dd class="col-sm-9">{{ $booking->created_at->format('d M Y H:i') }}</dd>
                </dl>
            </div>
        </div>

    </div>
</section>
@endsection

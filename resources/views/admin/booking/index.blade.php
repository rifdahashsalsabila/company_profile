@extends('admin.layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Booking</h3>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Layanan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->nama }}</td>
                            <td>{{ $booking->alamat }}</td>
                            <td>{{ $booking->no_hp }}</td>
                            <td>{{ $booking->layanan }}</td>
                            <td>{{ $booking->tanggal }}</td>
                            <td>
                                <a href="{{ route('booking.show', $booking->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" style="display:inline-block;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</section>
@endsection

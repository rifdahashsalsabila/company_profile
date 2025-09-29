<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Form Booking</h2>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Layanan</label>
                <select name="layanan" id="layanan" class="form-control" required>
                    <option value="">-- Pilih Layanan --</option>
                    <option value="Servis AC">Servis AC</option>
                    <option value="Cuci AC">Cuci AC</option>
                    <option value="Isi Freon">Isi Freon</option>
                    <option value="Perbaikan AC">Perbaikan AC</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <button class="btn btn-primary">Kirim Booking</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Kembali</a>
        </form>
    </div>
</body>

</html>
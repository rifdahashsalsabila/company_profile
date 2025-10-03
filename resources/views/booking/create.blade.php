<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<<<<<<< HEAD
</head>

<body class="bg-light">
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5">
          <h2 class="text-center mb-4 fw-bold" style="color:#2c3e50; letter-spacing:1px;">
            Form Booking
          </h2>

          @if(session('success'))
          <div class="alert alert-success text-center rounded-3 shadow-sm">
            {{ session('success') }}
          </div>
          @endif

          <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label fw-semibold">Nama</label>
              <input type="text" name="nama" class="form-control form-control-lg rounded-3 shadow-sm"
                placeholder="Masukkan nama Anda" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Alamat</label>
              <input type="text" name="alamat" class="form-control form-control-lg rounded-3 shadow-sm"
                placeholder="Masukkan alamat lengkap" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">No HP</label>
              <input type="text" name="no_hp" class="form-control form-control-lg rounded-3 shadow-sm"
                placeholder="Masukkan nomor HP aktif" required>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Layanan</label>
              <select name="layanan" id="layanan"
                class="form-select form-select-lg rounded-3 shadow-sm text-secondary" required>
                <option value="">-- Pilih Layanan --</option>
                <option value="Servis AC">Servis AC</option>
                <option value="Cuci AC">Cuci AC</option>
                <option value="Isi Freon">Isi Freon</option>
                <option value="Perbaikan AC">Perbaikan AC</option>
              </select>
            </div>

            <div class="mb-4">
              <label class="form-label fw-semibold">Tanggal</label>
              <input type="date" name="tanggal" class="form-control form-control-lg rounded-3 shadow-sm" required>
            </div>

            <div class="d-flex justify-content-between">
              <a href="{{ url()->previous() }}" class="btn btn-outline-secondary px-4 rounded-3">
                Kembali
              </a>
              <button class="btn btn-primary px-4 rounded-3 shadow-sm">
                Kirim Booking
              </button>
            </div>
          </form>
        </div>
=======
  <style>
    body {
      background: url("{{ asset('img/banner-2.jpg') }}") no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      margin: 0;
      position: relative;
    }

    body::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 0;
    }

    /* Card transparan dengan shadow */
    .booking-card {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      border-radius: 15px;
      padding: 30px;
      z-index: 1;
      position: relative;
    }

    /* Responsive form elements */
    .booking-card input,
    .booking-card select {
      background-color: rgba(255, 255, 255, 0.8);
      border: none;
    }
  </style>
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-8 col-lg-6">
      <div class="booking-card">
        <h2 class="text-center mb-4 fw-bold" style="color:#2c3e50; letter-spacing:1px;">Form Booking</h2>

        @if(session('success'))
        <div class="alert alert-success text-center rounded-3 shadow-sm">
          {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label class="form-label fw-semibold">Layanan</label>
            <select name="layanan" id="layanan" class="form-select form-select-lg rounded-3 shadow-sm text-secondary" required>
              <option value="">-- Pilih Layanan --</option>
              <option value="Servis AC">Servis AC</option>
              <option value="Cuci AC">Cuci AC</option>
              <option value="Isi Freon">Isi Freon</option>
              <option value="Perbaikan AC">Perbaikan AC</option>
            </select>
          </div>

          <div class="mb-4">
            <label class="form-label fw-semibold">Tanggal</label>
            <input type="date" name="tanggal" class="form-control form-control-lg rounded-3 shadow-sm" required>
          </div>

          <div class="d-flex justify-content-between">
            <a href="{{ url('/') }}" class="btn btn-outline-primary px-4 rounded-3">Kembali<i class="fas fa-sign-out-alt"></i></a>
      
            <button class="btn btn-primary px-4 rounded-3 shadow-sm">Kirim Booking</button>
          </div>
        </form>
>>>>>>> eksperimen
      </div>
    </div>
  </div>
</body>

</html>

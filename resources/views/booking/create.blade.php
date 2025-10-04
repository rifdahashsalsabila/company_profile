<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: url("{{ asset('img/banner-2.jpg') }}") no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    /* overlay gelap */
    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 0;
    }

    /* card transparan */
    .booking-card {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
      border-radius: 20px;
      padding: 40px;
      z-index: 1;
      position: relative;
      color: #fff;
    }

    .booking-card h2 {
      color: #fff;
      font-weight: 600;
      letter-spacing: 1px;
    }

    .booking-card input,
    .booking-card select {
      background: rgba(255, 255, 255, 0.85);
      border: none;
      padding: 12px;
      font-size: 1rem;
      border-radius: 10px;
    }

    .booking-card label {
      color: #f1f1f1;
      font-weight: 600;
    }

    .booking-card .btn {
      border-radius: 10px;
      font-weight: 500;
    }

    .booking-card .btn-outline-primary {
      border: 2px solid #fff;
      color: #fff;
    }

    .booking-card .btn-outline-primary:hover {
      background: #fff;
      color: #2c3e50;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="booking-card">
          <h2 class="text-center mb-4">Form Booking</h2>

          @if(session('success'))
          <div class="alert alert-success text-center rounded-3 shadow-sm">
            {{ session('success') }}
          </div>
          @endif

          <form action="{{ route('booking.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label class="form-label">Layanan</label>
              <select name="layanan" id="layanan" class="form-select" required>
                <option value="">-- Pilih Layanan --</option>
                <option value="Servis AC">Servis AC</option>
                <option value="Cuci AC">Cuci AC</option>
                <option value="Isi Freon">Isi Freon</option>
                <option value="Perbaikan AC">Perbaikan AC</option>
              </select>
            </div>

            <div class="mb-4">
              <label class="form-label">Tanggal</label>
              <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between">
              <a href="{{ url('/') }}" class="btn btn-outline-primary px-4">
                <i class="fas fa-arrow-left me-1"></i> Kembali
              </a>
              <button class="btn btn-primary px-4 shadow-sm">Kirim Booking</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</body>
</html>

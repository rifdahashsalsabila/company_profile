<!-- Hero Section -->
<div class="position-relative">
  <img src="/img/banner.jpg"
    class="img-hero w-100"
    style="max-height: 420px; object-fit: cover; object-position: center 25%; filter: brightness(0.75) contrast(1.05);"
    alt="Banner">

  <!-- Overlay judul -->
  <div class="position-absolute top-50 start-50 translate-middle text-center">
    <h1 class="fw-bold mb-3 text-shadow-white"
      style="font-family: 'Poppins', sans-serif; font-size: 2.8rem; color: #ffffff; letter-spacing: 2px;">
      About Us
    </h1>
    <p class="text-light mx-auto"
      style="max-width: 600px; font-size: 1.05rem; letter-spacing: 0.5px; line-height: 1.8; opacity: 0.95;">
      Kenali lebih dekat Tjahya Teknik — penyedia layanan AC profesional yang mengutamakan kualitas, ketepatan, dan kepuasan pelanggan.
    </p>
  </div>
</div>

<!-- About Content Section -->
<div class="container py-5">
  <div class="row align-items-center g-5">
    <!-- Gambar -->
    <div class="col-md-5">
      <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <img src="/{{ $about->cover }}"
          alt="Tentang Kami"
          class="img-fluid rounded-4"
          style="transition: transform 0.5s ease, box-shadow 0.5s ease;">
      </div>
    </div>

    <!-- Deskripsi -->
    <div class="col-md-7">
      <div class="card border-0 shadow-sm rounded-4 p-5 h-100" style="background: #f9fafc;">
        <div style="font-size: 1.1rem; color: #2f2f35; line-height: 1.9; letter-spacing: 0.4px;">
          {!! $about->desc !!}
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  /* Efek teks lembut putih */
  .text-shadow-white {
    text-shadow:
      1px 1px 4px rgba(255, 255, 255, 0.7),
      2px 2px 8px rgba(0, 0, 0, 0.3);
  }

  /* Responsif */
  @media (max-width: 768px) {
    .img-hero {
      max-height: 280px;
      object-position: center;
    }

    .position-absolute h1 {
      font-size: 1.8rem;
    }

    .position-absolute p {
      font-size: 0.95rem;
      padding: 0 1rem;
    }
  }

  /* Hover efek gambar */
  .card img:hover {
    transform: scale(1.04);
    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
  }

  /* Efek floating elegan */
  .card {
    transition: transform 0.5s ease, box-shadow 0.5s ease;
  }

  .card:hover {
    transform: translateY(-6px);
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);
  }

  /* Animasi muncul smooth */
  .card,
  .text-shadow-white {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 1s forwards;
  }

  @keyframes fadeInUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>
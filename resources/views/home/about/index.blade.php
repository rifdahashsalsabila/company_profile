<!-- Hero Section -->
<div class="position-relative">

  <img src="/img/banner.jpg" class="img-hero"
    style="max-height: 350px; object-fit: cover;  
    object-position: center 10%; width: 100%;" alt="Banner">

 <div class="position-absolute start-50 translate-middle-x text-center" style="bottom: 30px;">
  <h2 class="fw-bold btn outline-secondary px-4" 
      style="font-size: 1.5rem; color: #464866ff; letter-spacing: 1px;  border: 1px solid #6c757d; 
             border-radius: 6px; 
             background: transparent; 
             box-shadow: inset 0 2px 5px rgba(0,0,0,0.15); 
             cursor: default;">
    About Us
    </h2>
  </div>
</div>

<!-- Content Section -->
<div class="container py-5">
  <div class="row align-items-center g-5">
    <!-- Gambar -->
    <div class="col-md-5">
      <img src="/{{ $about->cover }}"
        alt="Tentang Kami"
        class="img-fluid rounded-3 shadow shadow-sm">
    </div>

    <!-- Deskripsi -->
    <div class="col-md-7">
      <div class="p-2">
        <div style="font-size: 1.1rem; color: #6c757d; line-height: 1.8;">
          {!! $about->desc !!}
        </div>
      </div>
    </div>
  </div>
</div>
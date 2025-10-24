<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f6f7;
        color: #2f2f2f;
    }

    .wrapper-img-banner {
        max-width: 100%;
        max-height: 420px;
    }

    .img-banner {
        width: 100%;
        object-fit: cover;
        filter: brightness(92%);
    }

    .text-shadow-white {
        color: #2f2f35ff;
        text-shadow:
            1px 1px 3px rgba(255, 255, 255, 0.9),
            2px 2px 6px rgba(116, 110, 110, 0.4);
    }

    .title-section {
        font-weight: 600;
        letter-spacing: 2px;
        color: #2b2b2b;
        text-transform: uppercase;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.05);
        position: relative;
        display: inline-block;
    }

    .title-section::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: #a3adb7;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .text-muted {
        color: #7a7a7a !important;
    }

    /* === KARTU, TOMBOL, DAN EFEK === */
    .card {
        background-color: #fafafa;
        border: 1px solid #e1e1e1;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.07);
    }

    .btn-outline-secondary {
        border-color: #bfc5ca !important;
        color: #4a4a4a !important;
        background-color: #f9f9f9;
        transition: all 0.25s ease;
    }

    .btn-outline-secondary:hover {
        background-color: #e0e0e0 !important;
        color: #2a2a2a !important;
        border-color: #a3a3a3 !important;
    }

    .btn-success {
        background-color: #93b69b;
        border: none;
        transition: all 0.25s ease;
    }

    .btn-success:hover {
        background-color: #7ca88a;
    }

    /* === CAROUSEL === */
    .carousel-caption h1 {
        font-size: 2.3rem;
        font-weight: 600;
    }

    .carousel-caption p {
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(60%) brightness(90%);
    }

    /* === SPASI DAN RESPONSIF === */
    .row.g-4 {
        row-gap: 2rem;
    }

    .container {
        color: #2e2e2e;
    }

    p {
        color: #5e5e5e;
        line-height: 1.7;
    }
</style>

<!-- === HERO / CAROUSEL === -->
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($banner as $key => $item)
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $key }}"
            class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach ($banner as $key => $item)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <div class="wrapper-img-banner">
                <img src="/{{ $item->gambar }}" class="img-banner" alt="">
            </div>
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1 class="text-shadow-white">{{ $item->headline }}</h1>
                    <p class="text-shadow-white">{{ $item->desc }}</p>
                    <a href="{{ route('bookings.create') }}" class="btn btn-outline-secondary shadow-sm">
                        <i class="fa-solid fa-calendar-check"></i> Booking here
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- === ABOUT SECTION === -->
<div class="container mt-5">
    <div class="text-center mb-4">
        <h4 class="title-section">About Us</h4>
    </div>
    <div class="row align-items-center">
        <div class="col-md-6">
            <img src="/{{ optional($about)->cover }}" width="100%" class="rounded shadow-sm" alt="">
        </div>
        <div class="col-md-6">
            <p class="mb-0">
                {!! optional($about)->desc !!}
            </p>
        </div>
    </div>
</div>

<!-- === SERVICES SECTION === -->
<div class="container my-5">
    <div class="text-center mb-5">
        <h4 class="title-section">Services</h4>
        <p class="text-muted mt-3">
            Tjahya Teknik menyediakan berbagai layanan profesional untuk memenuhi kebutuhan Anda dalam
            pembelian, pemasangan, perawatan, dan perbaikan AC.
        </p>
    </div>

    <div class="row g-4">
        @foreach ($service as $item)
        <div class="col-md-3 col-sm-6">
            <div class="card text-center p-4 border-0 shadow-sm h-100">
                <i class="{{ $item->icon }} fa-2x text-secondary mb-3"></i>
                <h5 class="fw-semibold mb-2">{{ $item->title }}</h5>
                <p class="text-muted mb-0">
                    {!! Illuminate\Support\Str::limit($item->desc, 100) !!}
                </p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-5">
        <a href="/services" class="btn btn-outline-secondary px-4">
            Selengkapnya <i class="fas fa-angle-double-right ms-1"></i>
        </a>
    </div>
</div>

<!-- === BLOG SECTION === -->
<div class="container my-5">
    <div class="text-center mb-5">
        <h4 class="title-section">Blog</h4>
        <p class="text-muted mt-3">
            Kami berbagi tips & wawasan seputar dunia pendingin udara — dari perawatan ringan hingga solusi profesional.
        </p>
    </div>

    <div class="row g-4">
        @foreach ($blog as $item)
        <div class="col-md-3 col-sm-6">
            <div class="card h-100 border-0 shadow-sm">
                @if ($item->cover)
                <img src="/{{ $item->cover }}" class="card-img-top img-fluid" alt="{{ $item->title }}">
                @endif
                <div class="card-body d-flex flex-column">
                    <a href="/blog/show/{{ $item->id }}" class="text-decoration-none text-dark">
                        <h5 class="fw-semibold mb-2">{{ $item->title }}</h5>
                    </a>
                    <p class="text-muted flex-grow-1">
                        {{ Illuminate\Support\Str::limit(strip_tags($item->body), 100) }}
                    </p>
                    <a href="/blog/show/{{ $item->id }}" class="btn btn-outline-secondary btn-sm mt-auto">
                        Selengkapnya <i class="fas fa-angle-double-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-5">
        <a href="/blog" class="btn btn-outline-secondary px-4">
            Lihat Semua <i class="fas fa-angle-double-right ms-1"></i>
        </a>
    </div>
</div>

<!-- === HUBUNGI KAMI === -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm text-center p-5 bg-light">
                <h4 class="title-section">Hubungi Kami</h4>
                <p class="text-muted mb-4">
                    Segera konsultasikan kerusakan AC Anda dengan tim Tjahya Teknik.
                    Kami siap membantu dengan cepat dan profesional.
                </p>
                <a href="https://wa.me/6285735165385" class="btn btn-success px-4 py-2" target="_blank">
                    <i class="fab fa-whatsapp me-2"></i> Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>
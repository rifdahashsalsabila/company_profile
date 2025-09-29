<style>
    .wrapper-img-banner {
        max-width: 100%;
        max-height: 400px;
    }

    .img-banner {
        width: 100%;
    }

    .text-shadow-white {
        color: #fff;
        text-shadow:
            2px 2px 4px rgba(0, 0, 0, 0.8),
            /* bayangan utama */
            4px 4px 8px rgba(0, 0, 0, 0.55);
    }

    .title-section {
        font-family: 'Poppins', sans-serif;
        letter-spacing: 2px;
        color: #202025ff;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.15);

    }

    .title-section::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: #8a99a8ff;
        margin: 10px auto 0;
        border-radius: 2px;
    }
</style>
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>


    <div class="carousel-inner">

        @foreach ($banner as $key => $item)

        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <div class="wrapper-img-banner">
                <img src="/{{ $item->gambar }}" class="img-banner" alt="">
            </div>
            <div class="container">
                <div class="carousel-caption text-start" style="color: white;">
                    <h1 class="text-shadow-white">{{ $item->headline }}</h1>
                    <p>{{ $item->desc }}</p>
                    <p>
                        <a href="{{ route('booking.create') }}" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-calendar-check"></i> Booking here
                        </a>

                    </p>

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


<div class="container mt-5">
    <div class="text-center">
        <h4 class="w-bold display-8 text-uppercase position-relative d-inline-block title-section">About Us</h4>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="/{{ optional ($about)->cover }}" width="100%" alt="">
        </div>
        <div class="col-md-6">
            <div class="d-flex h-100 align-items-center">
                <p class="mb-0">
                    {!! optional($about)->desc !!}
                </p>
            </div>
        </div>
    </div>
</div>


<!-- <div style="background-color: #8a99a8ff;">
    <div class="container py-5">
        <div class="text-white">
            <h5>Pelajari Tentang Kami</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet expedita fugit, libero eligendi exercitationem mollitia? Quis obcaecati enim blanditiis odit, tempora sequi deleniti! Porro vitae aliquid quibusdam ex neque quisquam.</p>
        </div>
    </div>
</div> -->

<div class="container my-5">
    <div class="text-center mb-5">
        <h4 class="w-bold display-8 text-uppercase position-relative d-inline-block title-section">
            Services
        </h4>
        <p class="text-muted mt-3">
            Tjahya Teknik menyediakan berbagai layanan profesional untuk memenuhi kebutuhan Anda
            dalam hal pembelian, pemasangan, perawatan, dan perbaikan AC.
        </p>
    </div>

    <div class="row g-4">
        @foreach ($service as $item)
        <div class="col-md-3 col-sm-6">
            <div class="text-center px-3">
                <i class="{{ $item->icon }} fa-3x text-secondary mb-3"></i>
                <h5 class="fw-semibold mb-2">{{ $item->title }}</h5>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-5">
        <a href="" class="btn btn-outline-secondary px-4">
            Selengkapnya <i class="fas fa-angle-double-right ms-1"></i>
        </a>
    </div>
</div>

<div class="container my-5">
    <div class="text-center mb-5">
        <h4 class="w-bold display-8 text-uppercase position-relative d-inline-block title-section">
            Blog
        </h4>
        <p class="text-muted mt-3">
            Kami melayani berbagai kebutuhan seputar AC, mulai dari service kerusakan ringan hingga perbaikan berat.
        </p>
    </div>

    <div class="row g-4">
        @foreach ($blog as $item)
        <div class="col-md-3 col-sm-6">
            <div class="card h-100 border-0 shadow-sm">
                <img src="/{{ $item->cover }}" class="card-img-top img-fluid" alt="Cover Blog">

                <div class="card-body">
                    <a href="/blog/show/{{ $item->id }}" class="text-decoration-none">
                        <h5 class="fw-semibold mb-2">{{ $item->title }}</h5>
                    </a>
                    <p class="text-muted mb-3">
                        {!! Illuminate\Support\Str::limit($item->body, 100) !!}
                    </p>
                    <a href="/blog/show/{{ $item->id }}" class="btn btn-outline-secondary btn-sm">
                        Selengkapnya &RightArrow;
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-5">
        <a href="/blog" class="btn btn-outline-secondary px-4">
            Lihat Semua Artikel
            <i class="fas fa-angle-double-right ms-1"></i>
        </a>
    </div>
</div>


<!-- <div class="bg-secondary my-5">
    <div class="container py-5">
        <div class="text-white">
            <h5>Pelajari Tentang Kami</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet expedita fugit, libero eligendi exercitationem mollitia? Quis obcaecati enim blanditiis odit, tempora sequi deleniti! Porro vitae aliquid quibusdam ex neque quisquam.</p>
        </div>
    </div>
</div> -->

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm text-center p-5">
                <h4 class="w-bold display-8 text-uppercase position-relative d-inline-block title-section">Hubungi Kami</h4>
                <p class="text-muted mb-4">
                    Segera konsultasikan kerusakan AC Anda dengan tim Tjahya Teknik.
                    Kami siap membantu dengan cepat dan profesional.
                </p>
                <a href="https://wa.me/6285735165385"
                    class="btn btn-success px-4 py-2"
                    target="_blank">
                    <i class="fab fa-whatsapp me-2"></i>
                    Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>
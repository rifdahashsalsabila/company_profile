<div class="container my-5">
    <div class="text-center mb-5">
        <h4 class="fw-bold text-uppercase position-relative d-inline-block title-section">
            Blog
        </h4>
        <p class="text-muted mt-3">
            Kami melayani berbagai kebutuhan seputar AC, mulai dari service ringan hingga perbaikan berat.
        </p>
    </div>

    <div class="row g-4">
        @foreach ($blog as $item)
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 rounded-4 overflow-hidden shadow-sm blog-card h-100">
                <img src="/{{ optional($item)->cover }}" class="img-card-blog" alt="{{ optional($item)->title }}">
                <div class="card-body d-flex flex-column p-4">
                    <a href="/blog/show/{{ $item->id }}" class="text-decoration-none text-dark">
                        <h5 class="fw-semibold mb-2">{{ optional($item)->title }}</h5>
                    </a>
                    <p class="text-muted flex-grow-1 mb-3" style="font-size: 0.95rem;">
                        {{ Illuminate\Support\Str::limit(strip_tags(optional($item)->body), 100) }}
                    </p>
                    <a href="/blog/show/{{ $item->id }}" class="btn btn-outline-secondary btn-sm mt-auto px-3 py-2 rounded-pill">
                        Baca Selengkapnya <i class="fas fa-angle-double-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<style>
/* Gaya umum heading biar nyatu */
.title-section::after {
    content: "";
    display: block;
    width: 60px;
    height: 3px;
    background: #8a99a8ff;
    margin: 10px auto 0;
    border-radius: 2px;
}

/* Gaya gambar blog */
.img-card-blog {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.4s ease, filter 0.4s ease;
}
.blog-card:hover .img-card-blog {
    transform: scale(1.05);
    filter: brightness(1.05);
}

/* Card hover lembut */
.blog-card {
    background: #ffffff;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.blog-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

/* Tombol konsisten dengan tone utama */
.btn-outline-secondary {
    border-color: #8a99a8;
    color: #4a4a56;
    transition: all 0.3s ease;
}
.btn-outline-secondary:hover {
    background: #8a99a8;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.12);
}

/* Efek halus saat muncul */
.blog-card {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.8s forwards;
}
@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

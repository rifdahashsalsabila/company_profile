<div class="container my-5">
    <div class="text-center mb-5">
        <h4 class="fw-bold">Blog</h4>
        <p class="text-muted">Kami melayani berbagai kebutuhan seputar AC, mulai dari service ringan hingga perbaikan berat.</p>
    </div>

    <div class="row">
        @foreach ($blog as $item)
        <div class="col-md-3 col-sm-6 my-3">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden h-100 blog-card">
                <img src="/{{ optional($item)->cover }}" class="img-card-blog" alt="{{ optional($item)->title }}">
                <div class="card-body p-3 d-flex flex-column">
                    <a href="/blog/show/{{ $item->id }}" class="text-decoration-none text-dark">
                        <h5 class="card-title fw-semibold">{{ optional($item)->title }}</h5>
                    </a>
                    <p class="card-text text-muted mb-3">
                        {{ Illuminate\Support\Str::limit(strip_tags(optional($item)->body), 100) }}
                    </p>
                    <a href="/blog/show/{{ $item->id }}" class="mt-auto btn btn-outline-primary btn-sm">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Styles khusus untuk blog -->
<style>
.img-card-blog {
    width: 100%;
    height: 180px;
    object-fit: cover;
    transition: transform 0.3s;
}
.blog-card:hover .img-card-blog {
    transform: scale(1.05);
}
.blog-card {
    transition: transform 0.3s, box-shadow 0.3s;
}
.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 25px rgba(0,0,0,0.15);
}
.card-body a:hover {
    text-decoration: none;
}
</style>

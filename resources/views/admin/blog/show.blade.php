<div class="row justify-content-center my-5">
    <div class="col-lg-8 col-md-10">
        <div class="card border-0 rounded-5 overflow-hidden" 
             style="background: #ffffff; box-shadow: 0 15px 40px rgba(0,0,0,0.1);">
             
            <div class="card-body p-5">

                <!-- Tombol Kembali -->
                <a href="/admin/posts/blog" 
                   class="btn btn-outline-primary mb-4 px-5 py-2 rounded-pill fw-medium shadow-sm"
                   style="letter-spacing: 0.5px; transition: all 0.3s ease;">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>

                <!-- Judul Blog -->
                <h1 class="display-5 fw-bold mb-3" style="font-family: 'Playfair Display', serif; color: #1a1a2e; line-height: 1.2;">
                    {{ $blog->title }}
                </h1>

                <!-- Tanggal -->
                <p class="text-muted mb-5" style="font-size: 0.95rem; letter-spacing: 0.3px;">
                    Dibuat pada {{ $blog->created_at->format('d M Y, H:i') }}
                </p>

                <!-- Gambar Cover -->
                <div class="mb-5 text-center">
                    <img src="/{{ $blog->cover }}" class="img-fluid rounded-5 shadow-lg border" alt="Cover Image"
                         style="transition: transform 0.4s ease;">
                </div>

                <!-- Konten Blog -->
                <div class="blog-content" style="line-height: 2; font-size: 1.1rem; color: #2c2c3c; letter-spacing: 0.2px;">
                    {!! $blog->body !!}
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    /* Tombol minimalis elegan */
    .btn-outline-primary {
        border-width: 2px;
        color: #1a1a2e;
    }
    .btn-outline-primary:hover {
        background: #1a1a2e;
        color: #ffffff;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    /* Efek hover gambar */
    .blog-content img {
        max-width: 100%;
        border-radius: 15px;
        margin-bottom: 25px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .blog-content img:hover {
        transform: scale(1.04);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }

    /* Typography */
    .blog-content h2, .blog-content h3, .blog-content h4 {
        color: #1a1a2e;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-family: 'Playfair Display', serif;
    }
    .blog-content p {
        margin-bottom: 1.8rem;
    }

    /* Card floating subtle effect */
    .card {
        transition: transform 0.5s ease, box-shadow 0.5s ease;
    }
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 30px 60px rgba(0,0,0,0.12);
    }

    /* Smooth fade-in on scroll */
    .card-body {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 1s forwards;
        animation-delay: 0.2s;
    }
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

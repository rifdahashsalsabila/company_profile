<div class="row justify-content-center my-5">
    <div class="col-lg-8 col-md-10">
        <div class="card border-0 rounded-5 overflow-hidden"
            style="background: #fdfdfd; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">

            <div class="card-body p-5">

                <!-- Tombol Kembali -->
                <a href="/blog"
                    class="btn btn-outline-secondary mb-4 px-5 py-2 rounded-pill fw-medium shadow-sm"
                    style="letter-spacing: 0.5px; transition: all 0.3s ease;">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>

                <!-- Judul Blog -->
                <h1 class="display-5 fw-bold mb-3"
                    style="font-family: 'Poppins', sans-serif; color: #2f2f35; line-height: 1.3; letter-spacing: 0.3px;">
                    {{ $blog->title }}
                </h1>

                <!-- Tanggal -->
                <p class="text-muted mb-5" style="font-size: 0.95rem; letter-spacing: 0.3px;">
                    Dibuat pada {{ $blog->created_at->format('d M Y, H:i') }}
                </p>

                <!-- Gambar Cover -->
                <div class="mb-5 text-center">
                    <img src="/{{ $blog->cover }}" class="img-fluid rounded-4 shadow-sm border"
                        alt="Cover Image"
                        style="transition: transform 0.4s ease, box-shadow 0.4s ease;">
                </div>

                <!-- Konten Blog -->
                <div class="blog-content"
                    style="line-height: 1.9; font-size: 1.05rem; color: #2c2c35; letter-spacing: 0.2px;">
                    {!! $blog->body !!}
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    /* Tombol minimalis premium */
    .btn-outline-secondary {
        border-width: 2px;
        color: #4a4a56;
        border-color: #8a99a8;
        background-color: #fff;
    }

    .btn-outline-secondary:hover {
        background: #8a99a8;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
    }

    /* Gambar dalam konten blog */
    .blog-content img {
        max-width: 100%;
        border-radius: 15px;
        margin-bottom: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .blog-content img:hover {
        transform: scale(1.03);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    /* Typography */
    .blog-content h2,
    .blog-content h3,
    .blog-content h4 {
        color: #202025;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-family: 'Poppins', sans-serif;
        letter-spacing: 0.5px;
    }

    .blog-content p {
        margin-bottom: 1.6rem;
    }

    /* Card hover halus */
    .card {
        transition: transform 0.5s ease, box-shadow 0.5s ease;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    }

    /* Animasi lembut muncul dari bawah */
    .card-body {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.8s forwards;
        animation-delay: 0.2s;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
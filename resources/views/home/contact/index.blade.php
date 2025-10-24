<div class="container py-5">
    <!-- Header Kontak -->
    <div class="text-center mb-5">
        <h2 class="fw-bold display-5" style="font-family: 'Poppins', sans-serif; color: #2d2d2d;">
            Kontak Kami
        </h2>
        <p class="text-muted fs-6">
            Hubungi kami untuk konsultasi kerusakan AC dan segera melakukan layanan service AC
        </p>
        <div class="divider mx-auto mt-3 mb-4"></div>
    </div>

    <div class="row justify-content-center g-4">
        <!-- Form Kontak -->
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden contact-card bg-light">
                <div class="card-body p-5">
                    <h5 class="fw-bold mb-4" style="font-size: 1.4rem; color: #3a3a3a;">Kirim Pesan</h5>
                    <form action="/contact/send" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label fw-medium text-secondary">Nama</label>
                            <input type="text"
                                class="form-control form-control-lg rounded-3 bg-body-tertiary @error('name') is-invalid @enderror"
                                name="name" placeholder="Masukan nama Anda">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium text-secondary">Isi Pesan</label>
                            <textarea name="desc" rows="5"
                                class="form-control form-control-lg rounded-3 bg-body-tertiary @error('desc') is-invalid @enderror"
                                placeholder="Masukan pesan Anda"></textarea>
                            @error('desc')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-dark btn-lg w-100 rounded-pill fw-semibold shadow-sm">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Kontak -->
        <div class="col-lg-4 col-md-8">
            <div class="card shadow-sm border-0 rounded-4 h-100 contact-card" style="background: #f3f4f6;">
                <div class="card-body d-flex flex-column justify-content-center p-5">
                    <h4 class="fw-bold text-uppercase mb-4 text-center" style="color: #2d2d2d;">Informasi Kontak</h4>

                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-circle bg-white me-3 shadow-sm">
                            <i class="fas fa-phone fa-lg text-secondary"></i>
                        </div>
                        <span class="fs-6 text-secondary">+62 857-3516-5385</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-circle bg-white me-3 shadow-sm">
                            <i class="fas fa-envelope fa-lg text-secondary"></i>
                        </div>
                        <span class="fs-6 text-secondary">Tjahya_teknik@gmail.com</span>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-circle bg-white me-3 shadow-sm">
                            <i class="fas fa-map-marker-alt fa-lg text-secondary"></i>
                        </div>
                        <span class="fs-6 text-secondary">JL. Raya Cadas Kukun, Rajeg</span>
                    </div>

                    <div class="text-center">
                        <a href="https://wa.me/6285735165385"
                            class="btn btn-outline-dark btn-lg px-5 py-2 rounded-pill fw-semibold shadow-sm"
                            target="_blank">
                            <i class="fab fa-whatsapp me-2"></i> Hubungi via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Divider lembut */
    .divider {
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #a8b0b9, #d0d3d8);
        border-radius: 10px;
    }

    /* Input modern */
    .form-control {
        border: 1px solid #d4d4d4;
    }

    .form-control:focus {
        border-color: #9fa8b3;
        box-shadow: 0 0 10px rgba(180, 180, 180, 0.15);
        transition: all 0.3s ease;
    }

    /* Tombol abu premium */
    .btn-dark {
        background: #3d3d3d;
        border: none;
        color: #fff;
        transition: all 0.3s ease;
    }

    .btn-dark:hover {
        background: #5a5a5a;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    .btn-outline-dark:hover {
        background: #3d3d3d;
        color: #fff;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    /* Ikon lingkaran lembut */
    .icon-circle {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Kartu efek lembut */
    .contact-card {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }

    /* Responsif */
    @media (max-width: 768px) {
        .card-body {
            padding: 2rem 1.5rem !important;
        }
    }
</style>
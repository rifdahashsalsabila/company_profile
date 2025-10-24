<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="font-family: 'Poppins', sans-serif; color: #2d2d2d;">
            Services
        </h2>
        <p class="text-muted fs-6" style="max-width: 650px; margin: 0 auto;">
            Tjahya Teknik menyediakan berbagai layanan profesional
            untuk memenuhi kebutuhan Anda dalam pembelian, pemasangan,
            perawatan, dan perbaikan AC.
        </p>
        <div class="divider mx-auto mt-3 mb-4"></div>
    </div>

    <div class="row g-4">
        @foreach ($service as $item)
        <div class="col-md-3 col-sm-6">
            <div class="card h-100 border-0 shadow-sm text-center p-4 service-card bg-light rounded-4">
                <div class="icon-wrapper mb-3 mx-auto">
                    <i class="{{ $item->icon }} fa-2x text-secondary"></i>
                </div>
                <h5 class="fw-semibold mb-2 text-dark">{{ $item->title }}</h5>
                <p class="text-muted small mb-0" style="line-height: 1.7;">
                    {!! Illuminate\Support\Str::limit($item->desc, 100) !!}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    /* Divider lembut abu elegan */
    .divider {
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, #a8b0b9, #d0d3d8);
        border-radius: 10px;
    }

    /* Kartu layanan */
    .service-card {
        transition: all 0.4s ease;
        background: #f8f9fa;
        border-radius: 20px;
    }

    .service-card:hover {
        background: #f3f4f6;
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }

    /* Ikon lembut dengan lingkaran hint abu */
    .icon-wrapper {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: #e9ecef;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .service-card:hover .icon-wrapper {
        background: #dcdfe3;
        transform: scale(1.05);
    }

    /* Teks dan warna */
    .text-secondary {
        color: #6c757d !important;
    }

    .text-dark {
        color: #2d2d2d !important;
    }

    /* Responsif */
    @media (max-width: 768px) {
        .service-card {
            padding: 1.5rem;
        }
    }
</style>
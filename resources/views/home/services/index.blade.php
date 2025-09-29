<div class="container my-5">
    <div class="text-center mb-4">
        <h4 class="fw-bold">Services</h4>
        <p class="text-muted">
            Tjahya Teknik menyediakan berbagai layanan profesional
            untuk memenuhi kebutuhan Anda dalam hal pembelian, pemasangan,
            perawatan, dan perbaikan AC.
        </p>
    </div>

    <div class="row g-4">
        @foreach ($service as $item)
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 border-0 shadow-sm text-center p-4">
                    <div class="mb-3">
                        <i class="{{ $item->icon }} fa-2x text-secondary"></i>
                    </div>
                    <h5 class="fw-semibold mb-2">{{ $item->title }}</h5>
                    <p class="text-muted mb-0">
                        {!! Illuminate\Support\Str::limit($item->desc, 100) !!}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>

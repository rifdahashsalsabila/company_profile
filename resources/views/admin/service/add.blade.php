<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded-4" style="background: #f9f9fb;">
            <div class="card-body">
                <h5 class="fw-bold mb-3" style="color:#4a4a6a;">
                    {{ isset($service) ? 'Edit Layanan' : 'Tambah Layanan' }}
                </h5>

                @if (isset($service))
                <form action="/admin/service/{{ $service->id }}" method="POST">
                    @method('PUT')
                    @else
                    <form action="/admin/service" method="POST">
                        @endif
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#555;">Title</label>
                            <input type="text" name="title"
                                class="form-control shadow-sm border-0 @error('title') is-invalid @enderror"
                                style="background:#f1f2f6;" placeholder="Masukkan judul layanan"
                                value="{{ isset($service) ? $service->title : old('title') }}">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#555;">Icon</label>
                            <input type="text" name="icon"
                                class="form-control shadow-sm border-0 @error('icon') is-invalid @enderror"
                                style="background:#f1f2f6;" placeholder="Contoh: fa-solid fa-tools"
                                value="{{ isset($service) ? $service->icon : old('icon') }}">
                            @error('icon')
                            <a href="https://fontawesome.com/search?o=r" target="_blank"
                                class="d-block mt-1" style="font-size: 14px; color:#6c757d;">
                                🔗 Klik untuk mencari Icon di FontAwesome
                            </a>
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#555;">Deskripsi</label>
                            <textarea name="desc" class="form-control shadow-sm border-0 @error('desc') is-invalid @enderror"
                                style="background:#f1f2f6; min-height: 120px;"
                                placeholder="Masukkan deskripsi layanan">{{ isset($service) ? $service->desc : old('desc') }}</textarea>
                            @error('desc')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 shadow-sm"
                            style="background:#4a4a6a; border:none;">
                            Simpan
                        </button>
                    </form>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus {
        background-color: #f0f2f7;
        box-shadow: 0 0 0 0.2rem rgba(130, 130, 160, 0.25);
    }

    .btn-primary:hover {
        background-color: #3b3b55 !important;
    }
</style>
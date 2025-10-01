<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Kontak Kami</h2>
        <p class="text-muted">Hubungi kami untuk konsultasi kerusakan AC dan segera melakukan layanan service AC</p>
    </div>

    <div class="row g-4">
        <!-- Form -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Kirim Pesan</h5>
                    <form action="/contact/send" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   name="name" placeholder="Masukan Nama Anda">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Isi Pesan</label>
                            <textarea name="desc" rows="5" 
                                      class="form-control @error('desc') is-invalid @enderror" 
                                      placeholder="Masukan Pesan Anda"></textarea>
                            @error('desc')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary px-4">Kirim</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Kontak -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-3 h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Informasi Kontak</h5>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-phone fa-lg text-primary me-3"></i>
                        <span class="fs-6">000000</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-envelope fa-lg text-primary me-3"></i>
                        <span class="fs-6">Tjahya_teknik@gmail.com</span>
                    </div>

                    <div class="d-flex align-items-center">
                        <i class="fas fa-map-marker-alt fa-lg text-primary me-3"></i>
                        <span class="fs-6">JL. Raya Cadas Kukun, Rajeg</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

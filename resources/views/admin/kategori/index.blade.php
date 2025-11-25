<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded-4" style="background: #f9f9fb;">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0" style="color:#4a4a6a;">Daftar Kategori</h5>

                    <a href="/admin/posts/kategori/create"
                        class="btn btn-primary px-3 py-2 shadow-sm"
                        style="background:#4a4a6a; border:none;">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                </div>

                <!-- TABEL -->
                <table class="table align-middle table-hover">
                    <thead class="table-light" style="background: #eef0f3;">
                        <tr style="color:#555;">
                            <th width="60px">No</th>
                            <th style="padding-left: 35%;">Nama Kategori</th>
                            <th width="150px" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($kategori as $item)
                        <tr>
                            <td class="fw-semibold text-secondary">{{ $loop->iteration }}</td>
                            <td style="color:#3d3d5c; padding-left: 35%;">{{ $item->name }}</td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center" style="gap: 10px;">

                                    <!-- EDIT -->
                                    <a href="/admin/posts/kategori/{{ $item->id }}/edit"
                                        class="btn btn-outline-primary"
                                        style="padding: 6px 16px; border-radius: 6px;">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <button type="submit"
                                        class="btn btn-outline-danger"
                                        style="padding: 6px 16px; border-radius: 6px;">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($kategori->isEmpty())
                <div class="text-center text-muted py-3">
                    Belum ada kategori.
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
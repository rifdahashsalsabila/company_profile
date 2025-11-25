<div class="row">
    <div class="col-md-12">

        <div class="card border-0 shadow-sm rounded-4" style="background:#f9f9fb;">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0" style="color:#4a4a6a;">Daftar Banner</h5>

                    <a href="/admin/banner/create"
                        class="btn btn-primary px-3 py-2 shadow-sm"
                        style="background:#4a4a6a; border:none;">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                </div>

                <!-- TABLE -->
                <table class="table align-middle table-hover">
                    <thead class="table-light" style="background:#eef0f3;">
                        <tr style="color:#555;">
                            <th width="60px">No</th>
                            <th width="120px">Gambar</th> 
                            <th style="padding-left: 30%;">Headline</th> 
                            <th width="170px" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($banner as $item)
                        <tr>
                            <td class="fw-semibold text-secondary">{{ $loop->iteration }}</td>

                            <td>
                                <img src="/{{ $item->gambar }}"
                                    width="110"
                                    class="rounded shadow-sm"
                                    alt="">
                            </td>

                            <td style="color:#3d3d5c; padding-left: 30%;">
                                {{ $item->headline }}
                            </td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center" style="gap: 10px;">

                                    <a href="/admin/banner/{{ $item->id }}/edit"
                                        class="btn btn-outline-primary"
                                        style="padding: 6px 16px; border-radius: 6px;">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>

                                    <form action="/admin/banner/{{ $item->id }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus banner ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-outline-danger"
                                            style="padding: 6px 16px; border-radius: 6px;">
                                            <i class="fas fa-trash me-1"></i> Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                @if($banner->isEmpty())
                <div class="text-center text-muted py-3">
                    Tidak ada banner ditambahkan.
                </div>
                @endif

            </div>
        </div>

    </div>
</div>
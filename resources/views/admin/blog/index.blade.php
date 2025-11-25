<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded-4" style="background: #f9f9fb;">
            <div class="card-body">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0" style="color:#4a4a6a;">Daftar Blog</h5>

                    <a href="/admin/posts/blog/create"
                        class="btn btn-primary px-3 py-2 shadow-sm"
                        style="background:#4a4a6a; border:none;">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                </div>

                <!-- TABLE -->
                <table class="table align-middle table-hover">
                    <thead class="table-light" style="background: #eef0f3;">
                        <tr style="color:#555;">
                            <th>No</th>
                            <th>Cover</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($blog as $item)
                        <tr>
                            <td class="fw-semibold text-secondary">{{ $loop->iteration }}</td>

                            <td>
                                <img src="/{{ $item->cover }}"
                                    width="110"
                                    class="rounded shadow-sm"
                                    alt="">
                            </td>

                            <td style="color:#3d3d5c;">
                                <a href="/admin/posts/blog/{{ $item->id }}"
                                    class="fw-bold text-decoration-none"
                                    style="color:#3d3d5c;">
                                    {{ $item->title }}
                                </a>
                            </td>

                            <td style="color:#6b6b7a;">
                                {{ $item->kategori->name ?? '-' }}
                            </td>

                            <td class="text-center">
                                <div class="d-flex" style="gap: 10px;">
                                    <!-- EDIT -->
                                    <a href="/admin/posts/blog/{{ $item->id }}/edit"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- DELETE -->
                                    <form action="/admin/posts/blog/{{ $item->id }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus blog ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($blog->isEmpty())
                <div class="text-center text-muted py-3">
                    Belum ada postingan blog.
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
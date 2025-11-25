<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded-4" style="background: #f9f9fb;">
            <div class="card-body">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0" style="color:#4a4a6a;">Daftar User</h5>

                    <a href="/admin/user/create"
                        class="btn btn-primary px-3 py-2 shadow-sm"
                        style="background:#4a4a6a; border:none;">
                        <i class="fas fa-user-plus me-1"></i> Tambah
                    </a>
                </div>

                <!-- TABLE -->
                <table class="table align-middle table-hover">
                    <thead class="table-light" style="background: #eef0f3;">
                        <tr style="color:#555;">
                            <th width="60px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th width="120px">Role</th>
                            <th class="text-center" width="170px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td class="fw-semibold text-secondary">{{ $loop->iteration }}</td>

                            <td style="color:#3d3d5c;">{{ $item->name }}</td>

                            <td style="color:#6b6b7a;">{{ $item->email }}</td>

                            <td>
                                <span class="badge bg-secondary-subtle text-dark px-3 py-2 rounded-pill"
                                    style="background:#e6e6ea;">
                                    {{ ucfirst($item->role) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center" style="gap: 10px;">

                                    <!-- EDIT -->
                                    <a href="/admin/user/{{ $item->id }}/edit"
                                        class="btn btn-outline-primary btn-sm shadow-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('user.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-outline-danger btn-sm shadow-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($user->isEmpty())
                <div class="text-center text-muted py-3">
                    Tidak ada user terdaftar.
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
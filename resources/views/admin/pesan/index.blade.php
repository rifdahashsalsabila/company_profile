<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-light border-0 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-semibold text-secondary">
                    <i class="fas fa-envelope-open-text me-2 text-muted"></i> Daftar Pesan
                </h5>
            </div>

            <div class="card-body">
                <table class="table table-hover table-bordered align-middle mb-0">
                    <thead class="table-secondary text-center">
                        <tr>
                            <th width="60px">#</th>
                            <th width="220px">Nama</th>
                            <th>Pesan</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesan as $item)
                        <tr>
                            <td class="fw-semibold text-secondary text-center">{{ $loop->iteration }}</td>
                            <td>
                                <a href="/admin/pesan/{{ $item->id }}"
                                    class="text-decoration-none fw-semibold text-dark">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td class="text-muted">{!! Illuminate\Support\Str::limit($item->desc, 100) !!}</td>
                            <td class="text-center">
                                <form action="/admin/pesan/{{ $item->id }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger btn-sm shadow-sm"
                                        onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                                        <i class="fas fa-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if($pesan->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">
                                Tidak ada pesan masuk.
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


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

<style>
    .card-header {
        font-weight: 600;
        font-size: 1.05rem;
        background-color: #f7f7f7 !important;
        color: #444;
    }

    table.table thead th {
        background: #e0e0e0;
        color: #333;
        font-weight: 600;
    }

    table.table tbody td {
        vertical-align: middle;
        background-color: #fcfcfc;
        color: #555;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f2f6 !important;
        transition: all 0.2s ease-in-out;
    }

    .btn {
        border-radius: 8px;
        transition: all 0.25s ease;
    }

    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-danger {
        border-color: #dc3545;
        color: #dc3545;
        background-color: #fff;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }

    .text-muted {
        color: #6c757d !important;
    }
</style>
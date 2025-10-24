@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-light text-dark border-0">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-cogs me-2 text-secondary"></i> Data Service
                    </h3>
                    <a href="{{ url('/admin/service/create') }}" class="btn btn-outline-secondary border-0 shadow-sm">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </a>
                </div>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0">
                    <thead class="table-secondary text-center">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th style="width: 180px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($service as $item)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-start fw-semibold text-gray-800">{{ $item->title }}</td>
                            <td class="text-secondary"><i class="{{ $item->icon }}"></i></td>
                            <td class="text-nowrap">
                                <a href="{{ url('/admin/service/'.$item->id.'/edit') }}" class="btn btn-outline-warning btn-sm shadow-sm me-1">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>
                                <form action="{{ url('/admin/service/'.$item->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm shadow-sm" onclick="return confirm('Yakin hapus?')">
                                        <i class="fas fa-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($service->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">
                                Tidak ada data service
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<style>
    .card-header {
        font-weight: 600;
        font-size: 1.1rem;
        background-color: #f7f7f7 !important;
    }

    table.table thead th {
        background: #e0e0e0;
        color: #333;
        font-weight: 600;
        text-align: center;
    }

    table.table tbody td {
        vertical-align: middle;
        background-color: #fcfcfc;
        color: #444;
    }

    .btn {
        transition: all 0.25s ease;
        border-radius: 8px;
    }

    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    }

    .btn-outline-secondary {
        color: #555;
        border-color: #ccc;
    }

    .btn-outline-secondary:hover {
        background-color: #e9ecef;
        color: #333;
    }

    .text-gray-800 {
        color: #333 !important;
    }
</style>
@endsection
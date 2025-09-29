@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Service</h3>
                <div class="card-tools">
                    <a href="{{ url('/admin/service/create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th style="width: 180px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($service as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td><i class="{{ $item->icon }}"></i></td>
                            <td>
                                <a href="{{ url('/admin/service/'.$item->id.'/edit') }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ url('/admin/service/'.$item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</section>
@endsection

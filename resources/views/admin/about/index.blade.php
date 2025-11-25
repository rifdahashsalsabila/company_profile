@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card mt-4 about-card">
        <div class="card-header">
            <h3 class="card-title m-0">Form About</h3>
        </div>

        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                {{-- NAME --}}
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $about->name ?? '') }}">
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- COVER --}}
                <div class="form-group mb-3">
                    <label for="exampleInputFile">Cover</label>
                    <input
                        type="file"
                        name="cover"
                        class="form-control @error('cover') is-invalid @enderror"
                        id="exampleInputFile">

                    @error('cover')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    @if(isset($about) && $about->cover)
                    <img src="/{{ $about->cover }}" width="120" class="preview-image" alt="">
                    @endif
                </div>

                {{-- DESCRIPTION --}}
                <div class="form-group mb-3">
                    <label for="summernote">Deskripsi</label>
                    <textarea
                        name="desc"
                        id="summernote"
                        cols="30"
                        rows="6"
                        class="form-control @error('desc') is-invalid @enderror">{{ $about->desc ?? '' }}</textarea>

                    @error('desc')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </div>
</div>
@endsection
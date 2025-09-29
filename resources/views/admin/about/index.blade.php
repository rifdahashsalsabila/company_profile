@extends('admin.layouts.app') @section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #f4f6f9;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .card-header {
            background: #3f6791;
            color: white;
        }

        .btn-primary {
            background-color: #3f6791;
            border: none;
        }

        .btn-primary:hover {
            background-color: #335577;
        }

        .custom-file-label::after {
            content: "Browse";
        }

        img.mt-4 {
            border-radius: 6px;
            border: 1px solid #ddd;
            padding: 3px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title m-0">Form About</h3>
            </div>
            <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data"> @csrf <div class="card-body"> <!-- Name -->
                    <div class="form-group mb-3"> <label for="name">Name</label> <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $about->name ?? '') }}"> @error('name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror </div> <!-- Cover -->
                    <div class="form-group mb-3"> <label for="exampleInputFile">Cover</label>
                        <div class="input-group"> <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" id="exampleInputFile"> </div> @error('cover') <div class="invalid-feedback d-block"> {{ $message }} </div> @enderror @if (isset($about) && $about->cover) <img src="/{{ $about->cover }}" width="120" class="mt-4" alt=""> @endif
                    </div> <!-- Deskripsi -->
                    <div class="form-group mb-3"> <label for="summernote">Deskripsi</label> <textarea name="desc" id="summernote" class="form-control @error('desc') is-invalid @enderror" cols="30" rows="6">{{ $about->desc ?? '' }}</textarea> @error('desc') <div class="invalid-feedback d-block"> {{ $message }} </div> @enderror </div>
                </div>
                <div class="card-footer text-end"> <button type="submit" class="btn btn-primary">Simpan</button> </div>
            </form>
        </div>
    </div>
</body>

</html> @endsection
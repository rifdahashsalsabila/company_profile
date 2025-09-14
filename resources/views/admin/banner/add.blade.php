<!-- <div class="row">
    <div class="col-md-6">
        <div class="card-body">
            @if (isset ($banner))
            <form action="/admin/banner/{{ $banner->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @else
                <form action="/admin/banner" method="POST" enctype="multipart/form-data"> 
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="">Headline</label>
                        <input type="text" name="headline" class="form-control @error('headline') is-invalid
                    @enderror" placeholder="Headline" value="{{isset($user) ? $user->headline : old('headline') }}">
                        @error('headline')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" name="desc" class="form-control @error('desc') is-invalid
                    @enderror" placeholder="desc" value="{{ isset($user) ? $user->desc : old('desc') }}">
                        @error('desc')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid
                    @enderror" placeholder="gambar">


                        @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        @if (isset($banner))
                            <img src="/{{ $banner->gambar }}" width="100" class="mt-4" alt="">
                        @endif

                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
        </div>
    </div>
</div> -->

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
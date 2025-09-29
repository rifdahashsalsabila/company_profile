<div class="container my-5">
    <div class="text-center">
        <h4 class="">Blog</h4>
        <p>Kami melayani berbagai kebutuhan seputar AC, mulai dari service kerusakan ringan hingga perbaikan berat</p>
    </div>

    <div class="row">
        @foreach ($blog as $item)
        <div class="col-md-3 my-3">
            <div class="card shadow-sm">
                <div class="wrapper-card-blog"></div>
                <img src="/{{ optional($item)->cover }}" class="img-card-blog" alt="">
            </div>
            <div class="p-3">
                <a href="/blog/show/{{ $item->id }}" class="text-decoration-none">
                    <h5>{{ optional ($item)->title }}</h5>
                </a>
                {!! Illuminate\Support\Str::limit( optional($item)->body, 100) !!}
            </div>
        </div>
        @endforeach
        {{--<div class="text-center mt-3">
        <a href="" class="btn btn-secondary px-3">Selengkapnya <i class="fas fa-arrow-right"></i></a>
       </div>--}}
    </div>
</div>
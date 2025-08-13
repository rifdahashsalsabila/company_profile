<div class="container my-5">
    <div class="text-center">
        <h4 class="">Blog</h4>
        <p>Kami melayani berbagai kebutuhan seputar AC, mulai dari service kerusakan ringan hingga perbaikan berat</p>
    </div>

<div class="row">
    @for ($i = 0; $i <= 6; $i++)
    
    
        <div class="col-md-3 my-3">
            <div class="card shadow-sm">
                <div class="wrapper-card-blog"></div>
                <img src="/img/outdoor.jpg" class="img-card-blog" alt="">
            </div>
            <div class="p-3">
            <a href="" class="text-decoration-none"><h5>Service AC</h5></a>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus, ex!</p>
                <a href="">Selengkapnya &RightArrow;</a>
            </div>
        </div>
        
     @endfor
        {{--<div class="text-center mt-3">
        <a href="" class="btn btn-secondary px-3">Selengkapnya <i class="fas fa-arrow-right"></i></a>
       </div>--}}
    </div>
</div>
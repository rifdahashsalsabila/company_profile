<style>
    .wrapper-img-banner {
        max-width: 100%;
        max-height: 400px;
    }

    .img-banner {
        width: 100%;
    }
</style>
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>


    <div class="carousel-inner">

    @foreach ($banner as $key => $item)
    
    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
        <div class="wrapper-img-banner">
            <img src="/{{ $item->gambar }}" class="img-banner" alt="">
        </div>
        <div class="container">
            <div class="carousel-caption text-start" style="color: black;">
                <h1>{{ $item->headline }}</h1>
                <p>{{ $item->desc }}</p>
            </div>
        </div>
    </div>

    @endforeach



    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<div class="container mt-5">
    <div class="text-center">
        <h4 class="">About</h4>
        <p>Bingung cari ac atau jasa service? Serahkan pada kami!</p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="/{{ $about->cover }}" width="100%" alt="">
        </div>
        <div class="col-md-6">
        {{ $about->desc }}
        </div>
    </div>
</div>

<div class="bg-secondary my-5">
    <div class="container py-5">
        <div class="text-white">
            <h5>Pelajari Tentang Kami</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet expedita fugit, libero eligendi exercitationem mollitia? Quis obcaecati enim blanditiis odit, tempora sequi deleniti! Porro vitae aliquid quibusdam ex neque quisquam.</p>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="text-center">
        <h4 class="">Services</h4>
        <p>Kami melayani berbagai kebutuhan seputar AC, mulai dari service kerusakan ringan hingga perbaikan berat</p>
    </div>

    <div class="row">
        @foreach ($service as $item)
        
     
            <div class="col-md-3">
            <div class="text-center">
                <i class="fas fa-home fa-2x text-secondary"></i>
                <h5><b>{{ $item->title }}</b></h5>
                <p>{{ $item->desc }}</p>
            </div>
    </div>
    @endforeach
</div>
<div class="text-center mt-3">
    <a href="" class="btn btn-secondary px-3">Selengkapnya <i class="fas fa-arrow-right"></i></a>
</div>
</div>

<div class="bg-light my-5">
    <div class="container py-5">
        <div class="text-dark text-center">
            <h5>Pelajari Tentang Kami</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet expedita fugit, libero eligendi exercitationem mollitia? Quis obcaecati enim blanditiis odit, tempora sequi deleniti! Porro vitae aliquid quibusdam ex neque quisquam.</p>
        </div>
    </div>
</div>

<style>
   
</style>
<div class="container my-2">
    <div class="text-center">
        <h4 class="">Blog</h4>
        <p>Kami melayani berbagai kebutuhan seputar AC, mulai dari service kerusakan ringan hingga perbaikan berat</p>
    </div>

<div class="row">
   @foreach ( $blog as $item )
   
       <div class="col-md-3">
           <div class="card shadow-sm">
               <div class="wrapper-card-blog"></div>
               <img src="/{{ $item->cover }}" class="img-card-blog" alt="">
           </div>
           <div class="p-3">
           <a href="" class="text-decoration-none"><h5>{{ $item->title }}</h5></a>
           <p>
              {!! Illuminate\Support\Str::limit($item->body, 100) !!}
               <a href="/blog/show/{{ $item->id }}">Selengkapnya &RightArrow;</a>
              </p>
           </div>
       </div>
   
   @endforeach
    
        
     
        <div class="text-center mt-3">
        <a href="" class="btn btn-secondary px-3">Selengkapnya <i class="fas fa-arrow-right"></i></a>
       </div>
    </div>
</div>

<div class="bg-secondary my-5">
    <div class="container py-5">
        <div class="text-white">
            <h5>Pelajari Tentang Kami</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet expedita fugit, libero eligendi exercitationem mollitia? Quis obcaecati enim blanditiis odit, tempora sequi deleniti! Porro vitae aliquid quibusdam ex neque quisquam.</p>
        </div>
    </div>
</div>

<div class="container my-2 mb-5">
    <div class="text-center">
        <h4 class="">Hubungi Kami</h4>
        <p>Segera melakukan konsultasi kerusakan AC anda</p>
        <a href="" class="btn btn-secondary px-5" target="blank"><i class="fas fa-phone"></i>Hubungi Kami WhatsApp</a>
    </div>
</div>
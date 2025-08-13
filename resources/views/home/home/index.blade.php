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
        <div class="carousel-item active">
            <div class="wrapper-img-banner">
                <img src="/img/banner.jpg" class="img-banner" alt="">
            </div>
            <div class="container">
                <div class="carousel-caption text-start" style="color: black;">
                    <h1>Example headline.</h1>
                    <p>Some representative placeholder content for the first slide of the carousel.</p>
                    <p> <a class="btn btn-lg" href="#" style=" color: grey;  background-color: rgba(224, 220, 220, 0.72) ; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 12px 24px; transition: all 0.3s ease;"> Sign up today </a> </p>
                </div>
            </div>
        </div>



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
            <img src="/img/about.jpg" width="100%" alt="">
        </div>
        <div class="col-md-6">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam nulla ad sint rem minima provident facilis atque explicabo in cumque distinctio eos dignissimos neque, non amet a, eius illum id? Harum dolor odit nemo sit maiores deserunt autem quod omnis, deleniti corrupti reprehenderit cupiditate sed minus rerum molestiae adipisci voluptate, culpa, voluptatibus fugit incidunt mollitia voluptates nisi nam alias. Ipsum quisquam autem facere velit labore dolor exercitationem. Libero, consectetur quisquam?</p>
            <p>temporibus labore aliquid qui quibusdam. Iusto culpa porro illo eveniet iste impedit, molestias expedita? Asperiores cum quo, molestias expedita debitis voluptatum hic. Non consequuntur, cum quibusdam laboriosam veritatis, corrupti fugiat perspiciatis itaque eos quisquam maxime et voluptatibus temporibus? Amet.</p>
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
        @for ($i = 0 ; $i < 4; $i++)
            <div class="col-md-3">
            <div class="text-center">
                <i class="fas fa-home fa-2x text-secondary"></i>
                <h5><b>Pemasangan Ac</b></h5>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit quasi sit accusamus eligendi nam veniam et nisi inventore minima rerum!</p>
            </div>
    </div>
    @endfor
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
    @for ($i = 0; $i <= 6; $i++)
    
    
        <div class="col-md-3">
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
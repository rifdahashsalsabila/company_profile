<div class="container">

   <div class="container my-5">
    <div class="text-center">
        <h4 class="">Services</h4>
        <p>Kami melayani berbagai kebutuhan seputar AC, mulai dari service kerusakan ringan hingga perbaikan berat</p>
    </div>

    <div class="row mt-5">
       @foreach ($service as $item)
                   <div class="col-my-3">
                   <div class="text-center">
                       <i class="{{ $item->icon }} fa-2x text-secondary"></i>
                       <h5><b>{{ $item->title }}</b></h5>
                      {!! Illuminate\Support\Str::limit($item->desc, 100) !!}
                   </div>
           </div>
       @endforeach
</div>
</div>
<div class="col">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <a href="/admin/pesan" class="btn btn-primary btn-sm px-3"><i class="fas fa-arrow-left">Kembali</i></a>
                    <h4><b>from : {{ $pesan->name}}</b></h4>
                    <p>date crate : {{$pesan->creataed_at }}</p>
                    {!! $pesan->desc !!}
                </div>
            </div>
        </div>
    </div>
</div>
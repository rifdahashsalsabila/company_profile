<div class="page-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="container">

                <a href="/admin/pesan" class="btn btn-primary btn-sm px-3">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

                <h4 class="mt-3"><b>From: {{ $pesan->name }}</b></h4>
                <p class="text-muted">Date created: {{ $pesan->created_at }}</p>

                <div class="content">
                    {!! $pesan->desc !!}
                </div>

            </div>
        </div>
    </div>
</div>
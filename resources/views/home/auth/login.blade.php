<div class="container">
    <div class="row">
        <div class="col-ms-6">
            <div class="card">
                <div class="card-body">

                    <div class="text-center"><strong>
                            <h4>Login</h4>
                        </strong></div>
                    <p class="text-center">Masuk untuk akses ke akun anda</p>

                    @if(session()->has('LoginError'))
                   <div class="alert alert-danger"> {{ session('LoginError') }}</div>
                    @endif
                    <form action="/login/do" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for=""><b>Username</b></label>
                            <input type="text" name="email" class="form-control" placeholder="username">
                        </div>

                        <div class="form-group mt-3">
                            <label for=""><b>Password</b></label>
                            <input type="password" name="password" class="form-control" placeholder="*****">
                        </div>

                        <button class="btn btn-secondary mt-4">Sign in <i class="fas fa-sign-in-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
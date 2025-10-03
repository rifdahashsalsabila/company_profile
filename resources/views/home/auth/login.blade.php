<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <h4 class="fw-bold">Login</h4>
                        <p class="text-muted">Masuk untuk akses ke akun anda</p>
                    </div>

                    @if(session()->has('LoginError'))
                    <div class="alert alert-danger">{{ session('LoginError') }}</div>
                    @endif

                    <form action="/login/do" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label"><b>Email</b></label>
                            <input type="text" name="email" class="form-control" id="email" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label"><b>Password</b></label>
                            <div style="position: relative;">
                                <input type="password" name="password" class="form-control" id="password" required>
                                <i class="fas fa-eye" id="togglePassword"
                                    style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer;"></i>
                            </div>
                        </div>

                        <script>
                            document.getElementById('togglePassword').addEventListener('click', function() {
                                const input = document.getElementById('password');
                                const type = input.type === 'password' ? 'text' : 'password';
                                input.type = type;

                                // toggle icon
                                this.classList.toggle('fa-eye');
                                this.classList.toggle('fa-eye-slash');
                            });
                        </script>


                        <button type="submit" class="btn btn-secondary w-100">
                            Sign in
                        </button>
                    </form>

                    <p class="text-center text-muted mt-3">
                        Belum punya akun? <a href="{{ route('register') }}">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
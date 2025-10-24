<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0" style="border-radius: 20px; background: #f8f9fb;">
                <div class="card-body p-5">

                    <!-- Header -->
                    <div class="text-center mb-4">
                        <h4 class="fw-bold text-secondary">Login</h4>
                        <p class="text-muted">Masuk untuk mengakses akun Anda</p>
                    </div>

                    <!-- Error Alert -->
                    @if($errors->any())
                    <div id="loginError" class="alert d-flex align-items-center shadow-sm mb-4"
                        style="border-radius: 12px; background: #fdecea; color: #a94442; border: none;">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <div>{{ $errors->first() }}</div>
                    </div>

                    <script>
                        setTimeout(() => {
                            const alert = document.getElementById('loginError');
                            if (alert) {
                                alert.style.transition = "opacity 0.5s";
                                alert.style.opacity = 0;
                                setTimeout(() => alert.remove(), 500);
                            }
                        }, 4000);
                    </script>
                    @endif

                    <!-- Form -->
                    <form action="/login/do" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold text-muted">Email</label>
                            <input type="email" name="email" id="email" required
                                class="form-control shadow-sm border-0"
                                style="border-radius: 12px; background: #eef1f6; height: 46px;">
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold text-muted">Password</label>
                            <div style="position: relative;">
                                <input type="password" name="password" id="password" required
                                    class="form-control shadow-sm border-0"
                                    style="border-radius: 12px; background: #eef1f6; height: 46px; padding-right: 40px;">

                                <i class="far fa-eye" id="togglePassword"
                                    style="position:absolute; right:15px; top:50%; transform:translateY(-50%); cursor:pointer; color:#888;"></i>
                            </div>
                        </div>

                        <script>
                            const togglePassword = document.getElementById('togglePassword');
                            togglePassword.addEventListener('click', function() {
                                const input = document.getElementById('password');
                                input.type = input.type === 'password' ? 'text' : 'password';
                                this.classList.toggle('fa-eye');
                                this.classList.toggle('fa-eye-slash');
                            });
                        </script>

                        <button type="submit" class="btn w-100 fw-semibold shadow-sm"
                            style="border-radius: 12px; padding: 10px; background: linear-gradient(135deg, #e6ecf5, #dcd0f2); color: #333; border: none;">
                            <i class="fas fa-sign-in-alt me-2"></i> Sign In
                        </button>
                    </form>

                    <p class="text-center text-muted mt-4 mb-0">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="fw-semibold" style="color:#7c74b8;">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus {
        box-shadow: 0 0 0 3px rgba(180, 170, 220, 0.25);
        outline: none;
    }

    .btn:hover {
        background: linear-gradient(135deg, #dcd0f2, #e6ecf5);
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }
</style>
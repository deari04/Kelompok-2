<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ensures the container covers the full height of the screen */
        }
        .card {
            width: 100%; /* Ensures the card takes up the full width of its container */
            max-width: 500px; /* Set max-width to control the card size */
        }
    </style>
</head>
<body>
    <div class="login-container mt-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center mb-4">Selamat Datang!</h2>
                <ul class="nav nav-tabs" id="authTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                    </li>
                    
                </ul>
                <div class="tab-content mt-3">
                    <!-- Login Form -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @error('password')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror                                      
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        {{-- <div class="mt-3 text-center">
                            <a href="" class="text-muted">Forgot your password?</a>
                        </div>          --}}
                        <div class="mt-4 text-center">
                        <a href="https://wa.me/qr/S4WX6HE54VHOA1" class="btn btn-success d-flex align-items-center justify-content-center py-2" style="border-radius: 8px;" target="_blank">
                            <i class="fab fa-whatsapp fa-2x me-2"></i>
                            <span style="font-size: 1.1rem; font-weight: 500;">Hubungi Kami via WhatsApp</span>
                        </a>
                    </div>

                    <!-- Register Form -->
                    {{-- <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @error('password')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                                @error('password_confirmation')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('role')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-secondary w-100">Register</button>
                        </form>
                    </div> --}}
                        <div class="mt-3 text-center">
                            <a href="login" class="text-muted">Sudah punya akun? Login disini</a>
                        </div>     
                    </div>
                </div>

                {{-- <div class="container-fluid mt-4">
                    @yield('forgotpassword')
                </div> --}}

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

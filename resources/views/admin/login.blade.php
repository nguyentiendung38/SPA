<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login / Register</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            /* Animated Gradient Background */
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: animated-gradient 15s ease infinite;
            height: 100vh;
        }

        @keyframes animated-gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .main-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        /* Glassmorphism Card Effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Customizing Bootstrap Nav Tabs */
        .nav-tabs {
            border-bottom: 0;
        }
        .nav-tabs .nav-link {
            border: 0;
            color: #6c757d;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
        }
        .nav-tabs .nav-link.active,
        .nav-tabs .nav-link:hover,
        .nav-tabs .nav-link:focus {
            color: #0d6efd;
            background-color: transparent;
            border-bottom: 2px solid #0d6efd;
        }
        
        /* Google Button Style */
        .btn-google {
            background-color: #fff;
            color: #495057;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }
        .btn-google:hover {
            background-color: #f8f9fa;
            border-color: #adb5bd;
        }
    </style>
</head>
<body>

<div class="main-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card glass-card text-white">
                    <div class="card-body p-4 p-md-5">

                        <ul class="nav nav-tabs nav-fill mb-4" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active fw-bold" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-pane" type="button" role="tab" aria-controls="login-pane" aria-selected="true">Đăng nhập</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-pane" type="button" role="tab" aria-controls="register-pane" aria-selected="false">Đăng ký</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="login-pane" role="tabpanel" aria-labelledby="login-tab" tabindex="0">
                                <form method="POST" action="{{ route('admin.login.submit') }}">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                                        <label for="email" class="text-dark">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                        <label for="password" class="text-dark">Mật khẩu</label>
                                    </div>
                                    <div class="d-grid mb-3">
                                        <button type="submit" class="btn btn-primary btn-lg fw-bold">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="register-pane" role="tabpanel" aria-labelledby="register-tab" tabindex="0">
                                <form method="POST" action="{{ route('admin.register.submit') }}"> @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="registerName" name="name" placeholder="John Doe" required>
                                        <label for="registerName" class="text-dark">Họ và tên</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="registerEmail" name="email" placeholder="name@example.com" required>
                                        <label for="registerEmail" class="text-dark">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Password" required>
                                        <label for="registerPassword" class="text-dark">Mật khẩu</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" required>
                                        <label for="confirmPassword" class="text-dark">Xác nhận mật khẩu</label>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg fw-bold">Tạo tài khoản</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col"><hr class="text-white-50"></div>
                            <div class="col-auto"><span class="text-white-50">HOẶC</span></div>
                            <div class="col"><hr class="text-white-50"></div>
                        </div>

                        <div class="d-grid">
                            <a href="{{ route('login.google') }}" class="btn btn-google btn-lg fw-bold"> <i class="fab fa-google me-2"></i> Tiếp tục với Google
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
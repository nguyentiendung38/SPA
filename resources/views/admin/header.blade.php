<nav class="navbar navbar-expand-lg" style="background-color: #ffe0e0;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('makeover/images/logo.png') }}" style="width:25%" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              
                <li class="nav-item dropdown">
                    
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                        @guest
                            <!-- Hiển thị khi người dùng chưa đăng nhập -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                            </li>
                        @else
                                    <!-- Hiển thị khi người dùng đã đăng nhập -->


                                    {{--
                            </li> --}}
                            <nav class="navbar navbar-expand-lg bg-body-tertiary p-2">
                                <div class="container-fluid">

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Tài Khoản
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Xin Chào : <br> <span
                                                        class="text-primary">{{ Auth::user()->name }}</span> </a></li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">
                                                    <form action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="nav-link btn btn-link"
                                                            style="padding: 0; border: none; background: none;">Đăng xuất</button>
                                                    </form>
                                                </a></li>
                                        </ul>
                                    </li>


                                </div>
                            </nav>
                            <li>&emsp;&emsp;</li>
                        @endguest
            </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>
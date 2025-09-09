<header class="header_01 isSticky">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 cusLogo">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('makeover/images/logo.png') }}" alt="Makeover" />
                    </a>
                </div>
            </div>
            <div class="col-lg-8 menu-col">
                <a href="javascript:void(0)" class="menu_btn"><i class="icofont-navigation-menu"></i></a>
                <nav class="mainMenu">
                    <ul>
                        <li class="">
                            <a href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                        <!-- <li class="menu-item-has-children">
                            <a href="javascript:void(0);">Dịch vụ</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('package') }}">Bảng giá</a></li>
                                <li><a href="{{ route('booking.index') }}">Đặt lịch</a></li>

                            </ul>
                        </li> -->
                        <li><a href="{{ route('package') }}">Dịch vụ</a></li>

                        <li class="menu-item-has-children">
                            <a href="javascript:void(0);">Cửa hàng</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('products') }}">Sản phẩm</a></li>
                                <li><a href="{{ route('cart') }}">Giỏ hàng</a></li>
                                <li><a href="{{ route('showbill') }}">Hóa đơn</a></li>
                                <li><a href="{{ route('login') }}">Tài khoản</a></li>

                            </ul>
                        </li>
                        <li class="">
                            <a href="{{ route('blog') }}">Tin tức</a>

                        </li>
                        <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2 navCus">
                <div class="navAccess">
                    <a href="javascript:void(0);" class="humBurger"><i class="fa-regular fa-user"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End:: Header Section -->

<!-- popup sidebar widget -->
<section class="popup_sidebar_sec">
    <div class="popup_sidebar_overlay"></div>
    <div class="widget_area">
        <a href="javascript:void(0);" class="widget_closer"><i class="icofont-close-line"></i></a>
        <div class="center_align">
            <div class="about_widget_area">
                <div class="wd_logo">
                    <a href="{{ route('home') }}"><img src="makeover/images/Logo.png" alt="makeover" style="width: 200px;"/></a>
                </div>
                @guest
                    <!-- Hiển thị khi người dùng chưa đăng nhập -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                    </li>
                @else
                    <!-- Hiển thị khi người dùng đã đăng nhập -->
                    <nav class="navbar navbar-expand-lg bg-body-tertiary p-2">
                        <div class="container-fluid">
                            <li class="nav-item user-info">
                                Tài khoản của bạn
                                <ul class="list-unstyled user-info-list">
                                    <li class="user-info-item"><a class="nav-link" href="#">Xin Chào: <br><span
                                                class="text-primary">{{ Auth::user()->name }}</span></a></li>
                                    <li class="user-info-item"><a class="nav-link" href="#">Email: <br><span
                                                class="text-primary">{{ Auth::user()->email }}</span></a></li>
                                    <li class="user-info-item"><a class="nav-link" href="{{ route('profile') }}">Thông tin cá nhân</a></li>
                                    <li class="user-info-item"><a class="nav-link" href="{{ route('showbill') }}">Xem đơn hàng</a></li>
                                    <li class="user-info-item"><a class="nav-link" href="{{ route('showbooking') }}">Xem phiếu đặt lịch</a></li>
                                    <li class="user-info-item"><a class="nav-link" href="{{ route('edit_profile', Auth::user()->id) }}">Đổi mật khẩu</a></li>
                                    <li class="user-info-item">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="mo_btn"><i class="fa-solid fa-right-from-bracket"></i>Đăng
                                                xuất</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </nav>

                @endguest



                <div class="social_item">
                    <a href="https://www.facebook.com/"><i class="icofont-facebook"></i></a>
                    <a href="https://twitter.com/"><i class="icofont-twitter"></i></a>
                    <a href="https://bebo.com/"><i class="icofont-bebo"></i></a>
                    <a href="https://dribbble.com/"><i class="icofont-dribbble"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .user-info {
        padding: 10px;
        border-radius: 8px;
        background-color: #f8f9fa;
        /* Light background */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Light shadow for depth */
        margin-top: 10px;
    }

    .user-info-list {
        margin: 0;
        padding: 0;
    }

    .user-info-item {
        padding: 10px 0;
        border-bottom: 1px solid #e9ecef;
        /* Light border between items */
    }

    .user-info-item:last-child {
        border-bottom: none;
    }

    .nav-link {
        color: #495057;
        /* Slightly darker color */
        text-decoration: none;
        font-weight: 500;
    }

    .nav-link {
        color: #495057;
        /* Màu mặc định */
        text-decoration: none;
        font-weight: 500;
    }

    .nav-link:hover {
        color: #F7A392;
        /* Màu hồng cam nhạt khi hover */
        text-decoration: underline;
        /* Tạo gạch chân khi hover */
    }

    .logout-btn {
        color: #dc3545;
        /* Màu đỏ cho nút đăng xuất */
        font-weight: bold;
        text-align: left;
        cursor: pointer;
    }

    .logout-btn:hover {
        color: #e9ecef;
        /* Màu hồng cam nhạt khi hover nút đăng xuất */
    }

    /* Tùy chọn khác nếu bạn muốn áp dụng cho các nút khác */
    .btn:hover {
        background-color: #F7A392;
        /* Màu nền hồng cam nhạt khi hover cho button */
        border-color: #F7A392;
        /* Viền cũng đổi màu theo */
    }
</style>

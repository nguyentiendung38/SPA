@extends('layout')
@section('titlepage', 'Quên mật khẩu')
@section('content')

<!-- Banner Section -->
<section class="page_banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Quên mật khẩu</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Quên mật khẩu</p>
            </div>
        </div>
    </div>
</section>

<!-- Form Quên Mật Khẩu -->
<section class="cartPage">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="authWrap authForgotPassword">
                    <h2 class="authTitle">Quên mật khẩu</h2>
                    <form class="woocommerce-form-forgot needs-validation" action="{{ route('password.email') }}" method="POST" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <input placeholder="Vui lòng nhập email" type="email" id="email" name="email" value=""
                                       class="form-control" required>
                                <div class="invalid-feedback">Vui lòng nhập email hợp lệ.</div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="woocommerce-button button woocommerce-form-forgot__submit mo_btn">
                                <i class="fas fa-link me-2"></i>Gửi liên kết đặt lại mật khẩu
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</section>
@endsection

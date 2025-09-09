@extends('layout')
@section('titlepage', ' Register')
@section('content')
<section class="page_banner">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Đăng ký</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Trang đăng ký</p>
            </div>

        </div>
    </div>
</section>


<!-- End:: Banner Section -->

<!-- Begin:: Account Section -->
<section class="cartPage">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="authWrap authLogin">
                    <h2 class="authTitle">Đăng ký</h2>
                    <form class="woocommerce-form-login needs-validation" action="{{ route('register') }}" method="POST"
                        novalidate onsubmit="return validateForm()">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <input placeholder="User Name" type="text" id="name" name="name" value=""
                                    class="form-control" required>
                                <div class="invalid-feedback">Vui lòng nhập tên người dùng.</div>
                            </div>
                            <div class="col-sm-12">
                                <input placeholder="Số điện thoại" type="tel" id="phone" name="phone" value=""
                                    class="form-control" required>
                                <div class="invalid-feedback">Vui lòng nhập số điện thoại.</div>
                            </div>
                            <div class="col-sm-12">
                                <input placeholder="Email của bạn" type="email" id="email" name="email" value=""
                                    class="form-control" required>
                                <div class="invalid-feedback">Vui lòng nhập email hợp lệ.</div>
                            </div>
                            <div class="col-sm-12">
                                <input placeholder="Mật khẩu" type="password" id="password" name="password"
                                    class="form-control" required>
                                <div class="invalid-feedback" id="password-error">Vui lòng nhập mật khẩu.</div>
                            </div>
                            <div class="col-sm-12">
                                <input placeholder="Nhập lại mật khẩu" type="password" id="password-confirm"
                                    name="password_confirmation" class="form-control" required>
                                <div class="invalid-feedback">Vui lòng nhập lại mật khẩu.</div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit"
                                    class="woocommerce-button button woocommerce-form-login__submit mo_btn" name=""
                                    value="">
                                    <i class="icofont-user-alt-7"></i>Đăng ký
                                </button>
                            </div>
                            <div class="col-lg-6">
                                <p></p>
                                <a href="{{ route('register') }}"> Đăng ký</a>/<a href="{{ route('password.request') }}"> Quên mật khẩu</a>
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

@extends('layout')
@section('titlepage', ' Login')
@section('content')

<!-- popup sidebar widget -->

<!-- Begin:: Banner Section -->
<section class="page_banner">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Đăng nhập</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Trang đăng nhập</p>
            </div>

        </div>
    </div>
</section>
<!-- End:: Banner Section -->

<section class="cartPage">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="authWrap authLogin">
                    <h2 class="authTitle">Đăng nhập</h2>
                    <form class="woocommerce-form-login needs-validation" action="{{ route('login') }}" method="POST"
                        novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <input placeholder="Vui lòng nhập email" type="email" id="email" name="email" value=""
                                    class="form-control" required>
                                <div class="invalid-feedback">Vui lòng nhập email hợp lệ.</div>
                            </div>
                            <div class="col-sm-12">
                                <input placeholder="Mật khẩu" type="password" id="password" name="password"
                                    class="form-control" required>
                                <div class="invalid-feedback">Vui lòng nhập mật khẩu.</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-5">
                                    <button type="submit"
                                        class="woocommerce-button button woocommerce-form-login__submit mo_btn"
                                        name="login" value="Log in">
                                        <i class="icofont-unlock"></i>Đăng nhập
                                    </button>
                                </div>
                                <div class="col-lg-6">
                                    <p></p>
                                    <a href="{{ route('register') }}"> Đăng ký</a>/<a href="{{ route('password.request') }}"> Quên mật khẩu</a>
                                </div>
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

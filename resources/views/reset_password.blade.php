@extends('layout')
@section('titlepage', 'Quên mật khẩu')
@section('content')

<!-- Banner Section -->
<section class="page_banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Cập nhật mật khẩu</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Trang cập nhật mật khẩu</p>
            </div>
        </div>
    </div>
</section>

<!-- Form Update  password -->
<section class="cartPage">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="authWrap authForgotPassword">
                    <h2 class="authTitle">Cập nhật mật khẩu</h2>
                    <form class="woocommerce-form-forgot needs-validation" action="{{ route('password.update') }}"
                        method="POST" novalidate>
                        @csrf

                        <input type="hidden" name="token" value="{{ request()->token }}" />

                        <div class="row">
                            <div class="col-sm-12">
                                <input placeholder="Vui lòng nhập email" type="email" id="email" name="email"
                                    value="{{ request()->get('email') }}" class="form-control" readonly>
                            </div>

                            <div class="col-sm-12">
                                <input placeholder="Mật khẩu" type="password" id="password" name="password"
                                    class="form-control" required>
                                <div class="invalid-feedback">Vui lòng nhập mật khẩu.</div>
                            </div>

                            <div class="col-sm-12">
                                <input placeholder="Mật khẩu" type="password" id="password_confirmation"
                                    name="password_confirmation" class="form-control" required>
                                <div class="invalid-feedback">Vui lòng nhập mật khẩu.</div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit"
                                    class="woocommerce-button button woocommerce-form-forgot__submit mo_btn">
                                    <i class="bi bi-lock"></i> Cập nhật lại mật khẩu
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
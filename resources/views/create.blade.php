@extends('layout')
@section('titlepage', 'Thanh toán')

@section('content')
<section class="page_banner">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Thanh toán</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Trang thanh toán</p>
            </div>

        </div>
    </div>
</section>

<div class="cartPage">
    <div class="container">
        <div class="checkout-container">
            <div class="checkout-left">
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
        <label class="form-label">Loại thanh toán</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_type" id="payment_cash" value="cash" required>
            <label class="form-check-label" for="payment_cash">Thanh toán khi nhận hàng</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_type" id="payment_vnpay" value="vnpay" required>
            <label class="form-check-label" for="payment_vnpay">VN Pay</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_type" id="payment_momo" value="momo" disabled>
            <label class="form-check-label" for="payment_momo">Momo (đang cập nhật)</label>
        </div>
    </div>
                    <button type="submit" class="mo_btn"><i class="fa-solid fa-cart-shopping"></i>THANH TOÁN</button>
                </form>

            </div>
            <div class="checkout-right">
                <h5 class="text-danger">Thông tin sản phẩm</h5>
                <table class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
                    <thead>
                        <tr>
                            <th>Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems['names'] as $index => $name)
                            <tr>
                                <td><img src="{{ asset('upload/' . $cartItems['images'][$index]) }}" alt="" width="100px">
                                </td>
                                <td>{{ $name }}</td>
                                <td>{{ number_format($cartItems['prices'][$index], 0, ',', '.') }} VNĐ</td>
                                <td>{{ $cartItems['quantities'][$index] }}</td>
                                <td>{{ number_format($cartItems['prices'][$index] * $cartItems['quantities'][$index], 0, ',', '.') }}
                                    VNĐ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <br>
    <style>

    </style>
    @endsection
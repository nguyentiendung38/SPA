@extends('layout')

@section('title', 'Chi tiết lịch hẹn')

@section('content')
<section class="page_banner">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Chi tiết lịch hẹn</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Trang chi tiết lịch hẹn
                </p>
            </div>

        </div>
    </div>
</section>

<div class="cartPage">
    <div class="container">
        <h1>Chi tiết lịch hẹn #{{ $bookings->id }}</h1>
        <div class="row">
            <div class="col-lg-6">
                <p>Dịch vụ: {{ $bookings->service->service_name }}</p>
                <p>Gói dịch vụ: {{ $bookings->package->package_name }}</p>
                <p>Tổng tiền: {{ $bookings->package->price }}</p>
            </div>
            <div class="col-lg-6">
                <p>Ngày & giờ:
                    {{ $bookings->appointment_datetime ? \Carbon\Carbon::parse($bookings->appointment_datetime)->format('d-m-Y H:i') : 'Không có dữ liệu' }}
                </p>
                <p>Lời nhắn: {{ $bookings->message }}</p>
            </div>
        </div>



        <p>Trạng thái: {{ $bookings->status }}</p>
        <button class=" mo_btn "><a class="" href="{{ route('home') }}"><i class="fa-solid fa-cart-plus"></i>QUAY
                LẠI
                TRANG CHỦ</a></button>

    </div>

</div>

@endsection
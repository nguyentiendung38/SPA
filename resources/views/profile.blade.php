@extends('layout')

@section('title', 'Thông tin cá nhân')

@section('content')

<div class="shopPage">


    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Thông tin </h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Trang thông tin</p>
            </div>

        </div>
    </div>

    <div class="profile-container">
        <h1>Thông Tin Cá Nhân</h1>
        <div class="profile-content">
            <!-- Phần ảnh và nút thay đổi ảnh -->
            <div class="profile-image-section">
                <img src="{{ asset('upload/' . Auth::user()->image) }}" alt="Ảnh đại diện" class="profile-image">

                <form action="{{ route('edit_profile', Auth::user()->id) }}" method="GET">
                    @csrf
                    <button type="submit" class="mo_btn"><i class="fa-solid fa-pen-to-square"></i>Sửa thông tin</button>
                </form>
            </div>

            <div class="profile-info">
                <div class="profile-section">
                    <label>Họ và tên:</label>
                    <p>{{ Auth::user()->name }}</p>
                </div>
                <div class="profile-section">
                    <label>Email:</label>
                    <p>{{ Auth::user()->email }}</p>
                </div>
                <div class="profile-section">
                    <label>Số điện thoại:</label>
                    <p>{{ Auth::user()->phone }}</p>
                </div>
                <div class="profile-section">
                    <a class="mo_btn" href="{{ route('showbill') }}"><i class="fa-solid fa-file"></i>Xem hóa đơn</a>
                    <a class="mo_btn" href="{{ route('showbooking') }}"><i class="fa-solid fa-calendar-days"></i>Xem lịch hẹn</a>
                </div>


            </div>

        </div>
    </div>
</div>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    .profile-container {
        max-width: 700px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-container h1 {
        text-align: center;
        color: #333;
    }

    .profile-content {
        display: flex;
        align-items: flex-start;
        gap: 100px;
    }

    .profile-image-section {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .profile-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .change-photo-btn {
        padding: 8px 12px;
        background-color: #ffe0e0;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
    }

    .change-photo-btn:hover {
        background-color: #ffe0e0;
    }

    .profile-info {
        flex-grow: 1;
    }

    .profile-section {
        margin: 15px 0;
    }

    .profile-section label {
        font-weight: bold;
        color: #555;
    }

    .profile-section p {
        margin: 5px 0;
        font-size: 16px;
        color: #333;
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
@endsection
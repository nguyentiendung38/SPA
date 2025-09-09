@extends('layout')
@section('titlepage', 'Booking')
@section('content')

<!-- Hiển thị thông báo thành công hoặc lỗi -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<!-- Begin:: Banner Section -->
<section class="page_banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Đặt lịch</h2>
                <p class="breadcrumbs"><a href="index.html">Trang chủ</a><span>/</span>Trang đặt lịch</p>
            </div>
        </div>
    </div>
</section>
<!-- End:: Banner Section -->

<!-- Begin:: Appointment Section -->
<section class="commonSection apointmentSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="appointment_area">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="appointment_form">
                                <h3>Đặt lịch hẹn cho dịch vụ: {{ $service->service_name }}</h3>
                                <p>Chúng tôi cam kết mang đến sự chăm sóc tận tình, giúp khách hàng cảm thấy thư giãn và hài lòng trong mỗi dịch vụ.</p>

                                <!-- Form đặt lịch hẹn -->
                                <form action="{{ route('book.appointment') }}" method="POST" class="row" id="booking-form">
                                    @csrf

                                    <!-- Hiển thị dịch vụ đã chọn -->
                                    <div class="input-field col-lg-6 col-md-6">
                                        <select name="service_id" id="service-id" required>
                                            @if(isset($service))
                                            <option value="{{ $service->id }}" selected>{{ $service->service_name }}</option>
                                            @endif
                                        </select>
                                    </div>

                                    <!-- Chọn gói dịch vụ -->
                                    <div class="input-field col-lg-6 col-md-6">
                                        <select name="package_id" id="package-id" required>
                                            @if(isset($package))
                                            <option value="{{ $package->id }}" selected>{{ $package->package_name }}</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="input-field col-lg-12">
                                        
                                        <input type="text" value="Tổng tiền: {{ isset($package) ? number_format($package->price, 0, ',', '.') . ' VND' : '0 VND' }}" 
                                        readonly />
                                    </div>

                                    <!-- Các trường khác của form -->
                                    <div class="input-field col-lg-12">
                                        <input type="text" name="date_time" class="datetime-picker" placeholder="Chọn ngày & giờ (YYYY-MM-DD HH:mm)" required />
                                    </div>
                                    <div class="input-field col-lg-12">
                                        <textarea name="message" placeholder="Lời nhắn của bạn"></textarea>
                                    </div>
                                    <div class="input-field col-lg-12">
                                        <button type="submit" class="mo_btn"><i class="icofont-calendar"></i>Đặt lịch hẹn</button>
                                    </div>
                                </form>



                            </div>
                        </div>

                        <div class="col-lg-5 col-md-5">
                            <div class="icon_box_01">
                                <h4><i class="icofont-clock-time"></i>Giờ làm việc:</h4>
                                <p>Thứ 2 đến Thứ 6: 9:00 sáng — 9:00 tối<br>Thứ 7 và Chủ nhật: 9:00 sáng — 10:00 tối<br>Chủ nhật: 9:00 sáng — 6:00 tối</p>
                            </div>
                            <div class="icon_box_01">
                                <h4><i class="icofont-location-pin"></i>Địa chỉ:</h4>
                                <p>Trường Chinh<br>Quận 12<br>Thành phố Hồ Chí Minh</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End:: Appointment Section -->

@endsection
@extends('layout')
@section('titlepage',' Booking')
@section('content')

<!-- Begin:: Banner Section -->
<section class="page_banner">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Đặt lịch</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Trang đặt lịch</p>
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
                                <h3>Đặt lịch hẹn</h3>
                                <p>Chúng tôi cam kết mang đến sự chăm sóc tận tình, giúp khách hàng cảm thấy thư
                                    giãn và hài lòng trong mỗi dịch vụ.</p>
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <form action="{{ route('book.appointment') }}" method="post" class="row">
                                    @csrf <div class="input-field col-lg-6">
                                        <input type="text" name="name" placeholder="Tên
                                            " />
                                    </div>
                                    <div class="input-field col-lg-6">
                                        <input type="email" name="email" placeholder="E-mail
                                            " />
                                    </div>
                                    <div class="input-field col-lg-6">
                                        <input type="number" name="phone" placeholder="Số điện thoại" />
                                    </div>
                                    <div class="input-field col-lg-6">
                                        <select name="select_subject">
                                            @foreach($services as $service)
                                            <optgroup label="{{ $service->service_name }}">
                                                @foreach($service->packages as $package)
                                                <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-field col-lg-12">
                                        <input type="text" name="date_time" class="datetime-picker" placeholder="Chọn ngày & giờ (YYYY-MM-DD HH:mm)" />
                                        <i class="icofont-ui-calendar"></i>
                                    </div>
                                    <div class="input-field col-lg-12">
                                        <textarea name="message" placeholder="Lời nhắn của bạn"></textarea>
                                    </div>
                                    <div class="input-field col-lg-12">
                                        <button type="submit" class="mo_btn"><i class="icofont-calendar"></i>Đặt
                                            lịch hẹn</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="icon_box_01">
                                <h4><i class="icofont-clock-time"></i>Giờ làm việc:

                                </h4>
                                <p>
                                    Thứ 2 đến Thứ 6: 9:00 sáng — 9:00 tối<br>
                                    Thứ 7 và Chủ nhật: 9:00 sáng — 10:00 tối<br>
                                    Chủ nhật: 9:00 sáng — 6:00 tối
                                </p>
                            </div>
                            <div class="icon_box_01">
                                <h4><i class="icofont-location-pin"></i>Địa chỉ:</h4>
                                <p>
                                    Trường Chinh<br>
                                    Quận 12<br>
                                    Thành phố Hồ Chí Minh
                                </p>
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
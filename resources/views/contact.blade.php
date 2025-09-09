@extends('layout')
@section('titlepage', 'Liên hệ')
@section('content')

<!-- Begin:: Banner Section -->
<section class="page_banner">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Liên hệ</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Trang liên hệ</p>
            </div>

        </div>
    </div>
</section>

<section class="commonSection">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3101.379468464456!2d106.62614613851544!3d10.8270277846069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752950e953fd47%3A0x4a86971c5245acfc!2zNTI4IMSQLiBUcsaw4budbmcgQ2hpbmgsIFBoxrDhu51uZyAxMywgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1730531463424!5m2!1svi!2s"
                    width="100%" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

    
</section>

<!-- End:: Google Maps Section -->

<!-- Begin:: Contact Form Section -->
<section class="contactSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="sectionTitle text-center">
                    <img src="makeover/images/icons/2.png" alt="">
                    <h5 class="primaryFont">Liên hệ với chúng tôi</h5>
                    <h2>Hãy nói những gì bạn muốn tới <span class="colorPrimary fontWeight400">Lalisa</span></h2>
                    <p>
                        Chào mừng bạn đến với Lalisa, trung tâm chăm sóc sức khỏe và làm đẹp hàng đầu, nơi chúng tôi cam
                        kết mang đến cho bạn những trải nghiệm tuyệt vời nhất trong việc chăm sóc bản thân. Với đội ngũ
                        chuyên viên giàu kinh nghiệm và tận tâm, chúng tôi cung cấp một loạt các dịch vụ từ chăm sóc da,
                        massage thư giãn, đến các liệu trình làm đẹp hiện đại.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="appointment_area">
                    <div class="row">
                        <div class="col-lg-8 col-md-7">
                            <div class="appointment_form">
                                <form action="#" method="post" class="row" id="contact_form">
                                    <div class="input-field col-lg-6">
                                        <input class="required" type="text" name="name" placeholder="Tên">
                                    </div>
                                    <div class="input-field col-lg-6">
                                        <input class="required" type="email" name="email" placeholder="E-mail">
                                    </div>
                                    <div class="input-field col-lg-6">
                                        <input type="number" name="con_phone" placeholder="Số điện thoại">
                                    </div>
                                    <div class="input-field col-lg-6 select-area">
                                        <select class="required" name="selec">
                                            <option selected="selected">Chọn Chủ Đề</option>
                                            <option value="Sports Massage">Massage Thể Thao</option>
                                            <option value="Stone Massage">Massage Đá</option>
                                            <option value="Body Massage">Massage Toàn Thân</option>
                                            <option value="Head Massage">Massage Đầu</option>
                                            <option value="Facial Massage">Massage Mặt</option>
                                        </select>

                                    </div>
                                    <div class="input-field col-lg-12">
                                        <textarea class="required" name="con_message"
                                            placeholder="Lời nhắn của bạn"></textarea>
                                    </div>
                                    <div class="input-field col-lg-12">
                                        <button type="submit" class="mo_btn mob_lg"><i class="icofont-calendar"></i>
                                            Gửi lời nhắn</button>
                                        <div class="con_message"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 noPaddingLeft noPaddingRight">
                            <div class="icon_box_03">
                                <i class="icofont-location-pin"></i>
                                <h4>Lalisa Spa</h4>
                                <p>
                                    Tân Chánh Hiệp, Quận 12, Tp.HCM<br>
                                    +84 365335832<br />
                                    lalisasap@gmail.com
                                </p>
                            </div>
                            <div class="icon_box_03">
                                <i class="icofont-clock-time"></i>
                                <h4>Giờ mở cửa</h4>
                                <p>
                                    Thứ 2 – Thứ 6 09:00 – 21:00<br>
                                    Chủ nhật 9:00 – 18:00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End:: Contact Form Section -->

@endsection
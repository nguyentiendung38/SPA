@extends('layout')
@section('titlepage', ' Home')
@section('content')

    <!-- popup sidebar widget -->

    <!-- Begin:: Slider Section -->
    <section class="slider_01">
        <div class="rev_slider_wrapper">
            <div id="rev_slider_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                <ul>
                    <li data-index="rs-3046" data-transition="random-premium" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                        data-masterspeed="1000" data-thumb="" data-rotate="0" data-saveperformance="off" data-title=""
                        data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                        data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <div class="tp-caption" data-x="['left', 'left', 'center', 'center']" data-hoffset="['0']"
                            data-y="['middle']" data-voffset="['-180','-180','-170','-150']" data-width="['100%']"
                            data-height="['auto']" data-whitesapce="['normal']" data-type="image"
                            data-frames='[{"delay":1200,"speed":600,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                            data-textAlign="['left', 'left', 'center', 'center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,25]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[80,50,0,25]">
                        </div>
                        <div class="tp-caption headFont ws_nowrap" data-x="['left', 'left', 'center', 'center']"
                            data-hoffset="['-3', '-3', '0', '0']" data-y="['middle']"
                            data-voffset="['-40','-40','-45','-25']" data-fontsize="['60','65','60',''60]"
                            data-fontweight="900" data-lineheight="['70', '70', '70', '55']"
                            data-width="['600','500','100%', '100%']" data-height="['auto']" data-whitesapce="normal"
                            data-color="['#252525']" data-type="text" data-responsive_offset="off"
                            data-frames='[{"delay":1300,"speed":600,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"power2.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                            data-textAlign="['left', 'left', 'center', 'center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,25,25]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[80,50,25,25]">
                            Chăm sóc <span class="colorPrimary fontWeight400">sức khỏe
                                và làm đẹp</span>
                        </div>
                        <div class="tp-caption ws_nowrap" data-x="['left', 'left', 'center', 'center']" data-hoffset="['0']"
                            data-y="['middle']" data-voffset="['95','95','75','70']" data-fontsize="['14','14','14','14']"
                            data-fontweight="['400', '400', '400', '400']" data-lineheight="['28']"
                            data-width="['450','400','100%','100%']" data-height="['400']" data-whitesapce="['normal']"
                            data-color="['#252525']" data-type="text" data-responsive_offset="off"
                            data-frames='[{"delay":1500,"speed":500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"power2.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                            data-textAlign="['left', 'left', 'center', 'center']" data-paddingtop="[160,0,0,0]"
                            data-paddingright="[0,0,0,30]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[20,40,0,30]"
                            data-margintop="[130,0,0,0]" data-marginleft="[80,0,0,0]"
                            style=" background-size: cover; background-position: center;">
                            <a href="{{ route('booking.index') }}" class="mo_btn mob_lg"><i class="icofont-cart-alt"></i>Đặt
                                lịch
                                hẹn ngay đi</a>

                        </div>
                        <!-- <div class="tp-caption tp-resizeme" data-x="['left', 'left', 'center', 'center']"
                                        data-hoffset="['0']" data-y="['middle']" data-voffset="['160','160','150','120']"
                                        data-fontsize="['14'" data-fontweight="400" data-lineheight=".8" data-width="['100%']"
                                        data-height="['auto']" data-whitesapce="['normal']" data-color="['#01d85f']"
                                        data-type="text" data-responsive_offset="off"
                                        data-frames='[{"delay":1700,"speed":400,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"power2.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                        data-textAlign="['left', 'left', 'center', 'center']" data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[80,50,0,0]">

                                    </div> -->

                        <div class="tp-caption d-md-none d-sm-none d-xs-none d-lg-block"
                            data-frames='[{"delay":2000,"speed":700,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"power3.inOut"},
                                            {"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                            data-type="text" data-x="right" data-y="top" data-hoffset="['-250','-150','0','0']"
                            data-voffset="['-170','-146','0','0']" data-width="['auto']" data-height="['auto']"
                            data-visibility="['on', 'on', 'off', 'off']">
                            <div class="round_anim"></div>
                        </div>
                        <div class="tp-caption d-md-none d-sm-none d-xs-none d-lg-block cusLayer"
                            data-frames='[{"delay":2400,"speed":700,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},
                                        {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]'
                            data-type="image" data-x="right" data-y="bottom" data-hoffset="['-320','-320','0','0']"
                            data-voffset="['-170','-146','0','0']" data-width="['auto']" data-height="['auto']"
                            data-visibility="['on', 'on', 'off', 'off']">
                            <img src="makeover/images/vvvv.png" alt="App Store">
                        </div>
                        <div class="tp-caption d-md-none d-sm-none d-xs-none"
                            data-frames='[{"delay":2800,"speed":800,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                            data-type="image" data-x="left" data-y="bottom" data-hoffset="['-320','-320','0','0']"
                            data-voffset="['-170','-146','0','0']" data-width="['auto']" data-height="['auto']"
                            data-visibility="['on', 'off', 'off', 'off']"><img src="makeover/images/bg/page_layer.png"
                                alt="App Store"></div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="commonSection welcomeSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="sectionTitle text-center">
                        <img src="makeover/images/icons/1.png" alt="" />
                        <h5 class="primaryFont">Xin chào</h5>
                        <h2 style="min-width: 1000px;">Trải nghiệm những dịch vụ <span
                                class="colorPrimary fontWeight400">tốt nhất</span></h2>
                        <br>
                        Chúng tôi hân hạnh chào đón bạn đến với trung tâm chăm sóc sức khỏe & làm Đẹp! </br> Tại đây,
                        bạn
                        sẽ được trải nghiệm những liệu trình chăm sóc sức khỏe và làm đẹp chuyên sâu, giúp bạn thư
                        giãn và nạp lại năng lượng. Hãy để chúng tôi chăm sóc bạn và mang lại sự tươi mới cho cuộc
                        sống hàng ngày của bạn!
                        </p>
                    </div>
                </div>
            </div>

            <div id="serviceCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="actionBox">
                            <h3>Liệu trình chăm sóc da</h3>
                            <p>Liệu trình tự nhiên giúp tái tạo và nuôi dưỡng làn da <br> từ sâu bên trong.</p>
                            <a href="{{ route('package') }}" class="mo_btn"><i class="icofont-cart-alt"></i>Xem sản
                                phẩm</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="actionBox abBg2">
                            <h3>Dịch vụ gội đầu</h3>
                            <p>Làm sạch da đầu, giảm căng thẳng và <br />nuôi dưỡng tóc mềm mượt tự nhiên</p>
                            <a href="{{ route('package') }}" class="mo_btn"><i class="icofont-cart-alt"></i>Xem sản
                                phẩm</a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>

    <!-- <section class="commonSection aboutSection">
                <div class="layer_img move_anim">
                    <img src="makeover/images/bg/7.png" alt="" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 noPaddingRight clearfix">
                            <div class="aboutImg float-right clearfix">
                                <div class="shape1">
                                    <img src="makeover/images/bg/4.png" alt="" />
                                </div>
                                <div class="shape2">
                                    <img src="makeover/images/bg/5.png" alt="" />
                                </div>
                                <div class="shape3 move_anim_two">
                                    <img src="makeover/images/4.png" alt="" />
                                </div>
                                <div class="abImg float-right">
                                    <img src="makeover/images/a-03.png" alt="" />
                                </div>
                                <div class="expCounter">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="abContent">

                                <h2>
                                    Dịch vụ <span class="fontWeight400 colorPrimary">làm nail</span>
                                </h2>
                                <p class="leads">
                                    Chăm sóc móng tay chuyên nghiệp, giúp móng chắc khỏe, sáng bóng và bền đẹp.

                                </p>
                                <p>
                                    Chúng tôi cung cấp dịch vụ làm nail đa dạng với các kỹ thuật hiện đại, giúp bạn có được bộ
                                    móng hoàn hảo, từ cắt tỉa, dưỡng móng cho đến trang trí và sơn gel chuyên nghiệp. Hãy tận
                                    hưởng dịch vụ chăm sóc đặc biệt, mang đến sự thư giãn và phong cách cá nhân độc đáo cho bạn.
                                </p>
                                <a href="about.html" class="mo_btn mob_lg mob_shadow"><i class="icofont-long-arrow-right"></i>Tìm
                                    hiểu thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->

    <div class="commonSection serviceSection hasBeforeDecoration hasAfterDecoration">
        <div class="layer_img l_01 move_anim">
            <img src="makeover/images/bg/12.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="sectionTitle text-center">
                        <img src="makeover/images/icons/2.png" alt="" />
                        <h5 class="primaryFont">Chúng tôi có gì</h5>
                        <h2>Sản phẩm <span class="colorPrimary fontWeight400">bán chạy</span></h2>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        @foreach ($newProducts as $item)
                            <div class="col-lg-3 col-md-6">
                                <div class="product_item text-center">
                                    <div class="pi_thumb">
                                        <img src="{{ asset('upload/' . $item->image) }}" alt="" class="img-fluid"
                                            style="width: 300px; height: 320px; object-fit: cover;" />

                                        <div class="pi_01_actions">
                                            <a href="{{ route('detail', ['id' => $item->id]) }}"
                                                onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{ $item->id }}').submit();">
                                                <i class="icofont-cart-alt"></i>
                                            </a>
                                            <a href="{{ route('detail', ['id' => $item->id]) }}">
                                                <i class="icofont-eye"></i>
                                            </a>
                                        </div>

                                        <form id="add-to-cart-form-{{ $item->id }}"
                                            action="{{ route('cart.add', $item->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>


                                        <div class="prLabels">
                                            <p class="justin">New</p>
                                        </div>
                                    </div>
                                    <div class="pi_content">
                                        <p><a href="shop.html">
                                                @if ($item->category)
                                                    {{ $item->category->name }}
                                                @endif
                                            </a></p>
                                        <h3><a href="single-product.html">{{ $item->name }}</a></h3>
                                        <div class="product_price clearfix">
                                            <span class="price">{{ number_format($item->price, 0, ',', '.') }} VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                </div>

            </div>

        </div>
        <div class="layer_img l_02 move_anim_two">
            <img src="makeover/images/bg/11.png" alt="" />
        </div>
    </div>
    <!-- End:: Service Section -->

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
                                    <p>Chúng tôi cam kết mang đến sự chăm sóc tận tình, giúp khách hàng cảm thấy thư giãn và
                                        hài lòng trong mỗi dịch vụ.
                                    </p>

                                    <!-- Form đặt lịch hẹn -->
                                    <form action="{{ route('book.appointment') }}" method="POST" class="row">
                                    @csrf

                                    <!-- Chọn dịch vụ -->
                                    <div class="input-field col-lg-6 col-md-6">
                                        <select id="service-id" name="service_id" required>
                                            <option value="">Chọn dịch vụ</option>
                                            @foreach($services as $service) <!-- Đảm bảo rằng bạn truyền $services vào view -->
                                            <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Chọn gói dịch vụ -->
                                    <div class="input-field col-lg-6 col-md-6">
                                        <select id="package-id" name="package_id" required>
                                            <option value="">Chọn gói dịch vụ</option>
                                        </select>
                                    </div>
                                    <div class="input-field col-lg-12">
                                        <input
                                            id="total-price"
                                            type="text"
                                            value="Tổng tiền: 0 VND"
                                            readonly
                                             />
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

    <section class="commonSection pricingSection hasBeforeDecoration hasAfterDecoration">
        <div class="layer_img l_03 move_anim">
            <img src="makeover/images/bg/14.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sectionTitle text-left">
                        <img src="makeover/images/icons/2.png" alt="">
                        <h5 class="primaryFont">Gợi ý</h5>
                        <h2>Giá <span class="colorPrimary fontWeight400">dịch vụ</span></h2>
                        <p>
                            Chúng tôi cung cấp các dịch vụ chất lượng cao với mức giá hợp lý, nhằm đáp ứng nhu cầu của
                            khách hàng. Đội ngũ chuyên gia của chúng tôi luôn sẵn sàng hỗ trợ và tư vấn để đảm bảo bạn
                            nhận được dịch vụ tốt nhất. Hãy để chúng tôi đồng hành cùng bạn trong mọi bước đi!

                        </p>
                    </div>
                </div>
            </div>
            <div class="container ">
                @foreach ($services as $service)
                    <div class="col-md-12">
                        <div class="package_item pl_area">

                            <img src=" {{ asset('upload/' . $service->image) }}" alt="" />
                            <h5>
                                <a href="javascript:void(0);">{{ $service->service_name }}</a>
                                <span class="piborder"></span>
                                <span>Chỉ từ</span>
                                {{ $service->price }}
                            </h5>
                            <p>{{ $service->description }}</p>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="commonSection testimonialSlider">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimoanial_area">
                        <div class="tw_testiSlider">
                            <div class="item">
                                <div class="quote">
                                    <img src="makeover/images/home_01/quote.png" alt="" />
                                    <span></span><span></span><span></span><span></span>
                                </div>
                                <p class="quatation">
                                    Dịch vụ ở đây rất tuyệt vời! Tôi cảm thấy làn da của mình thay đổi rõ rệt sau khi sử
                                    dụng dịch vụ chăm sóc da.<br>
                                    Tôi sẽ quay lại đây thường xuyên.
                                </p>
                                <div class="test_author">
                                    <span>Nguyễn Thị Lan</span>
                                    <p>Hà Nội, Việt Nam</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="quote">
                                    <img src="makeover/images/home_01/quote.png" alt="" />
                                    <span></span><span></span><span></span><span></span>
                                </div>
                                <p class="quatation">
                                    Đội ngũ nhân viên rất thân thiện và nhiệt tình. Các liệu pháp chăm sóc thật sự hiệu quả
                                    và tôi rất hài lòng.
                                </p>
                                <div class="test_author">
                                    <span>Trần Văn Hùng</span>
                                    <p>TP. Hồ Chí Minh, Việt Nam</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="quote">
                                    <img src="makeover/images/home_01/quote.png" alt="" />
                                    <span></span><span></span><span></span><span></span>
                                </div>
                                <p class="quatation">
                                    Rất hài lòng với dịch vụ ở đây, không gian thư giãn và sản phẩm chăm sóc da chất lượng
                                    cao.
                                </p>
                                <div class="test_author">
                                    <span>Phạm Minh Anh</span>
                                    <p>Đà Nẵng, Việt Nam</p>
                                </div>
                            </div>
                            <!-- Thêm các item khác nếu cần -->
                        </div>
                        <div class="testiNav">
                            <div class="navitem">
                                <img src="makeover/images/90x90 (1).png" alt="" />
                            </div>
                            <div class="navitem">
                                <img src="makeover/images/90x90 (2).png" alt="" />
                            </div>
                            <div class="navitem">
                                <img src="makeover/images/90x90 (3).png" alt="" />
                            </div>
                            <div class="navitem">
                                <img src="makeover/images/90x90 (1).png" alt="" />
                            </div>
                            <div class="navitem">
                                <img src="makeover/images/90x90 (2).png" alt="" />
                            </div>
                            <div class="navitem">
                                <img src="makeover/images/90x90 (3).png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="commonSection blogSection">
        <div class="layer_img l_04 move_anim">
            <img src="makeover/makeover/images/bg/16.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="sectionTitle text-center">
                        <img src="makeover/makeover/images/icons/2.png" alt="">
                        <h5 class="primaryFont">Tin Tức Về Công Ty Chúng Tôi</h5>
                        <h2>Tin Tức <span class="colorPrimary fontWeight400">Mới Nhất</span></h2>
                        <p>
                            Chúng tôi luôn cập nhật những thông tin mới nhất để mang đến cho bạn những dịch vụ tốt nhất. Hãy
                            cùng khám phá những ưu đãi và cập nhật mới nhất của chúng tôi!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($popularPosts as $post)
                    <div class="col-lg-4 col-md-6">

                        <div class="blog_item_01">
                            <img src="{{ asset('upload/' . $post->image) }}" alt="{{ $post->title }}" />
                            <div class="bp_content">
                                <span>February 18, 2017</span>
                                <h3><a href="{{ route('show_blog', $post->id) }}">{{ $post->title }}</a></h3>
                                </a></h3>
                                <a class="lr_more" href="{{ route('show_blog', $post->id) }}">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>


@endsection
@push('scripts')
<!-- Thêm jQuery -->
<script>
    $(document).ready(function() {
        // Bắt sự kiện khi người dùng thay đổi dịch vụ
        $('#service-id').on('change', function() {
            var serviceId = $(this).val();
            console.log(serviceId); // Kiểm tra giá trị serviceId (nếu cần)

            if (serviceId) {
                // Gửi AJAX nếu có serviceId
                $.ajax({
                    url: '/get-packages/' + serviceId, // Gửi request tới route
                    method: 'GET',
                    success: function(response) {
                        // Kiểm tra response để xác nhận cấu trúc
                        console.log(response.packages);

                        // Xóa các option cũ trong dropdown gói dịch vụ
                        $('#package-id').empty();
                        $('#package-id').append('<option value="">Chọn gói dịch vụ</option>'); // Option mặc định

                        // Thêm các gói dịch vụ mới vào dropdown
                        $.each(response.packages, function(index, package) {
                            $('#package-id').append('<option value="' + package.id + '" data-price="' + package.price + '">' + package.package_name + '</option>');
                            $('#package-id').niceSelect('update');
                        });
                    },
                    error: function() {
                        alert('Không thể tải gói dịch vụ!');
                    }
                });
            } else {
                // Nếu không có dịch vụ, xóa các gói dịch vụ
                $('#package-id').empty();
                $('#package-id').append('<option value="">Chọn gói dịch vụ</option>');
                $('#total-price').val('Tổng tiền: 0 VND'); // Reset tổng tiền

            }
        });
        $('#package-id').on('change', function() {
            var selectedOption = $(this).find(':selected'); // Lấy option được chọn
            var price = selectedOption.data('price'); // Lấy giá từ thuộc tính data-price

            // Cập nhật trường tổng tiền
            if (price) {
                $('#total-price').val('Tổng tiền: ' + new Intl.NumberFormat('vi-VN').format(price) + ' VND');
            } else {
                $('#total-price').val('Tổng tiền: 0 VND'); // Nếu không chọn gói, đặt giá trị mặc định
            }
        });
    });
</script>

@endpush
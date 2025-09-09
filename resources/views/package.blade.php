@extends('layout')
@section('titlepage', ' Package')
@section('content')


<!-- Begin:: Banner Section -->
<section class="page_banner">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Bản giá</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Bản giá</p>
            </div>

        </div>
    </div>
</section>

<!-- Begin:: Package Section -->
<section class="commonSection packagegPage">
    <div class="layer_img l_03 move_anim">
        <img src="makeover/images/bg/14.png" alt="" />
    </div>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="sectionTitle text-center">
                <img src="makeover/images/icons/2.png" alt="">
                <h5 class="primaryFont">Welcome</h5>
                <h2>Các dịch vụ của <span class="colorPrimary fontWeight400">Lalisa</span></h2>
                <p>
                    Chúng tôi cung cấp các dịch vụ chất lượng cao với mức giá hợp lý, nhằm đáp ứng nhu cầu của
                    khách hàng. Đội ngũ chuyên gia của chúng tôi luôn sẵn sàng hỗ trợ và tư vấn để đảm bảo bạn
                    nhận được dịch vụ tốt nhất. Hãy để chúng tôi đồng hành cùng bạn trong mọi bước đi!

                </p>
            </div>
        </div>
    </div>
    <div class="container ">
        @foreach($services as $service)
        <div class="col-md-12">
            <div class="package_item pl_area">

                <img src=" {{ asset('upload/' . $service->image) }}" alt="" />
                <h5>
                    <a href="javascript:void(0);">{{ $service->service_name}}</a>
                    <span class="piborder"></span>
                    <span>Chỉ từ</span>
                    {{$service->price}}
                </h5>
                <p>{{ $service->description }}</p>
            </div>

        </div>
        @endforeach
    </div>
</section>
<!-- End:: Package Section -->

<!-- Begin:: Pricing Section -->
<section class="commonSection pricingSection3">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="sectionTitle text-center">
                    <img src="makeover/images/icons/2.png" alt="">
                    <h5 class="primaryFont">Welcome</h5>
                    <h2>Gói dịch vụ của<span class="colorPrimary fontWeight400"> Lalisa</span></h2>
                    <p>
                        Những gói dịch vụ, gồm nhiều bước làm bạn thoải mái, xinh đẹp hơn, tơi mới hơn sau những ngày
                        làm việc học tập vất vả. Hãy đến với chúng tôi, chúng tôi luôn tận tình châm sóc bạn.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($allPackages as $item)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
                <div class="product_item w-100">
                    <div class="pricingTable text-center">
                        <h3>{{ $item->package_name }}</h3>
                        <div class="pt_price">{{ number_format($item->price, 0, ',', '.') }}<i>VND</i>/ <span>lần</span></div>
                        <ul>
                            <li>{{ $item->service->service_name ?? 'Không có dịch vụ' }}</li>
                            <li>{{ $item->description }}</li>
                        </ul>
                        <!-- Nút Đặt ngay sẽ truyền thông tin đến trang đặt lịch -->
                        <a href="{{ route('booking.form', ['package_id' => $item->id, 'service_id' => $item->service_id]) }}" class="mo_btn">
                            <i class="icofont-calendar"></i>Đặt ngay
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>



        <br>
        <!-- <div class="row d-flex justify-content-center">
            <a href="" class="mo_btn"><i class="fas fa-boxes me-2"></i>Xem toàn bộ gói dịch vụ</a>
        </div> -->

    </div>
</section>




@endsection
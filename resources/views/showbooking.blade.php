@extends('layout')
@section('title', 'Danh sách lịch hẹn')
@section('content')
<section class="page_banner">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Danh sách lịch Hẹn</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Trang danh sách lịch hẹn </p>
            </div>

        </div>
    </div>
</section>

<div class="cartPage">
    <div class="container">
        <h1>Danh sách lịch hẹn của bạn</h1>
        @if ($appointments->isEmpty())
        <p>Bạn chưa có lịch hẹn nào.</p>
        @else
        @foreach ($appointments as $appointment)
        <div class="card">
            <div class="card-header">Lịch Hẹn: {{ $appointment->id }}</div>
            <div class="card-body">
                <table class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
                    <thead class="table" style="background-color: #ffe0e0;">
                        <tr>
                            <th>Dịch Vụ</th>
                            <th>Gói Dịch Vụ</th>
                            <th>Tổng tiền</th>
                            <th>Ngày & Giờ</th>
                            <th>Lời Nhắn</th>
                            <th>Trạng Thái</th>
                            <th>Chi Tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $appointment->service->service_name }}</td>
                            <td>{{ $appointment->package->package_name }}</td>
                            <td>{{ $appointment->package->price }}</td>

                            <td>
                                @if($appointment->appointment_datetime)
                                {{ \Carbon\Carbon::parse($appointment->appointment_datetime)->format('d-m-Y H:i') }}
                                @else
                                <p style="color:red">Không có dữ liệu</p>
                                @endif
                            </td>



                            <td>{{ $appointment->message }}</td>
                            <td>
                                <p style="color:red">{{ $appointment->status }}</p>
                            </td>
                            <td>
                                <a href="{{ route('bookingdetail', ['id' => $appointment->id]) }}">
                                    <button type="button" class="btn btn-light">Chi tiết</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
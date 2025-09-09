@extends('layout')

@section('title', 'Danh sách đơn hàng')

@section('content')
<section class="page_banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Đơn hàng</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Trang đơn hàng</p>
            </div>
        </div>
    </div>
</section>

<div class="cartPage">
    <div class="container">
        <h1 class="">Danh sách đơn hàng của bạn</h1>

        @if($orders->isEmpty())
            <p class="" style="font-size: 18px; color: #888;">Bạn chưa có đơn hàng nào.</p>
        @else
            @foreach ($orders as $order)
                <div class="card mb-4">
                    <div class="card-header">Đơn hàng: {{ $order->madh }}</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
                            <thead class="table" style="background-color: #ffe0e0;">
                                <tr>
                                    <th>Mã Đơn Hàng</th>
                                    <th style="width: 250px;">Item</th>
                                    <th>Tên Người Đặt</th>
                                    <th>Địa Chỉ</th>
                                    <th>Ngày đặt</th>
                                    <th>Đơn giá</th>
                                    <th>Trạng Thái</th>
                                    <th>Thêm</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#{{ $order->madh }}</td>
                                    <td>
                                        @foreach ($order->items as $item)
                                            <div class="card-body">
                                                <img src="{{ asset('upload/' . $item->product->image) }}"
                                                    alt="{{ $item->product->name }}" style="width: 50px; height: 50px;">
                                                <span>{{ $item->product->name }}</span>
                                                <span class="text-danger">x {{ $item->quantity }}</span>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>{{ number_format($order->total, 0, ',', '.') }}</td>
                                    <td>
                                        @if (array_key_exists($order->status, $statuses))
                                            <p style="color:green">{{ $statuses[$order->status] }}</p>
                                        @else
                                            <p style="color:red">Trạng thái không xác định</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('show', ['id' => $order->id]) }}">
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
        <nav aria-label="">
            {{ $orders->links('pagination::bootstrap-5') }}
        </nav>
    </div>
</div>

@endsection
@extends('admin.layout')
@section('titlepage', 'Đơn hàng')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <h2>Danh Sách Đơn Hàng</h2>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('search_order') }}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" name="query" type="search" placeholder="Tiềm kiếm đơn hàng"
                            aria-label="Search">
                        <button class="btn " style="background-color: #FF9999; color: white; border: none;"
                            type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="col-lg-6"></div>
            </div>
            <br>
            <br>
            <table class="table table-striped table-bordered">
                <thead class="table" style="background-color: #ffe0e0;">
                    <tr>
                        <th>ID</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên </th>
                        <th style="width: 250px;">Item</th>
                        <th>Số lượng</th>
                        <th style="width: 150px;">Thành tiền</th>
                        <th>Ngày đặt</th>
                        <th>SDT </th>
                        <th>Địa chỉ</th>
                        <th style="width: 200px;">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->madh }}</td>
                            <td>{{ $order->name }}</td>
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
                            <td>{{ $order->items->sum('quantity') }}</td>
                            <td>{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>
                                @if ($order->status < 4)
                                    <form action="{{ route('admin.order.updateStatus', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()">
                                            @foreach ($statuses as $key => $status)
                                                <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>
                                                    {{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                @else
                                    <span class="text-success">Đơn hàng đã hoàn thành</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Hiển thị liên kết phân trang -->
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    </div>
</main>

@endsection
@extends('admin.layout')
@section('titlepage', 'Đơn hàng')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
        <h2>Sản phẩm liên quan "<span class="text-primary">{{ $query }}</span>"</h2>
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
                    @foreach ($order as $order)
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
           
        </div>
    </div>
</main>

@endsection

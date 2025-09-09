@extends('admin.layout')
@section('titlepage', 'Quản lý Đặt Lịch')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <h2>Danh Sách Đặt Lịch</h2>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <table class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
                <thead class="table" style="background-color: #ffe0e0;">
                    <tr>
                        <th>ID</th>
                        <th>Tên Người Dùng</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Dịch Vụ</th>
                        <th>Gói Dịch Vụ</th>
                        <th>Tổng tiền</th>
                        <th>Ngày & Giờ</th>
                        <th>Lời Nhắn</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->user->email}}</td>
                        <td>{{ $booking->user->phone ?? 'Chưa có số điện thoại' }}</td>
                        <td>{{ $booking->service->service_name }}</td>
                        <td>
                            @if($booking->package)
                            {{ $booking->package->package_name }}
                            @else
                            <span class="text-danger">Chưa có gói dịch vụ</span>
                            @endif
                        </td>
                        <td>
                            {{ number_format($booking->package->price, 0, ',', '.') . ' VND' }}
                        </td>
                        <td>{{ $booking->appointment_datetime }}</td>
                        <td>{{ $booking->message }}</td>
                        <td>
                            <form action="{{ route('admin.updateBooking', $booking->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Đang chờ</option>
                                    <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                                    <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.deleteBooking', $booking->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
            {{ $bookings->links('pagination::bootstrap-5') }} <!-- Đảm bảo sử dụng kiểu Bootstrap 5 -->
            </div>

        </div>
    </div>
</main>

<style>
 /* Màu chữ của các trang chưa active */
.pagination .page-item .page-link {
    color: black; /* Màu chữ của các trang chưa active */
}

/* Màu nền của trang active */
.pagination .page-item.active .page-link {
    background-color: #FF6A6A; /* Màu nền của trang active */
    border-color: #FF6A6A; /* Màu viền của trang active */
    color: white; /* Màu chữ của trang active */
}

/* Thêm hiệu ứng hover cho các trang chưa active */
.pagination .page-item .page-link:hover {
    background-color: #f5f5f5;
    color: #FF6A6A;
}

</style>
@endsection
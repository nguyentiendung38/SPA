@extends('admin.layout')
@section('titlepage', 'Dashboard')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-2 mb-3">
                <a href="{{ route('productadmin') }}" style="text-decoration: none;">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title"><i class="fas fa-box"></i>
                                Sản phẩm</p>
                            <p class="card-text">Có: {{ $totalProducts }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2 mb-3">
                <a href="{{ route('packageadmin') }}" style="text-decoration: none;">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title"><i class="fas fa-boxes"></i>
                                Gói dịch vụ</p>
                            <p class="card-text">Có: {{ $totalPackages }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2 mb-3">
                <a href="{{ route('useradmin') }}" style="text-decoration: none;">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title"><i class="fas fa-users"></i>
                                Người dùng</p>
                            <p class="card-text">Có: {{ $totalUsers }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2 mb-3">
                <a href="{{ route('order') }}" style="text-decoration: none;">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title"><i class="fas fa-shopping-cart"></i>
                                Đơn hàng</p>
                            <p class="card-text">Có: {{ $totalOrders }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2 mb-3">
                <a href="{{ route('order') }}" style="text-decoration: none;">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title"><i class="fas fa-shopping-cart"></i>
                                Tổng booking</p>
                            <p class="card-text">Có: {{ $totalBookings }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2 mb-3">
                <a href="{{ route('blogadmin') }}" style="text-decoration: none;">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title"><i class="fas fa-tags"></i>
                                Số bài viết</p>
                            <p class="card-text">Có: {{ $totalBlogs }}</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="text-center">Doanh Thu Sản Phẩm Tổng và Theo Ngày</p>
                <canvas id="combinedRevenueChart" style="max-height: 400px;"></canvas>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <h5><a href="{{ route('admin.bookings') }}" style="text-decoration: none; color: #000; ">Booking mới nhất</a></h5>
                <table class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
                    <thead class="table" style="background-color: #ffe0e0;">
                        <tr>
                            <th>Tên </th>
                            <th>Gói Dịch Vụ</th>
                            <th>Tổng tiền</th>
                            <th>Ngày & Giờ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->user->name }}</td>
                                <td>
                                    @if($booking->package)
                                        {{ $booking->package->package_name }}
                                    @else
                                        <span class="text-danger">Chưa có gói dịch vụ</span>
                                    @endif
                                </td>
                                <td>{{$booking->package->price}}</td>
                                <td>{{ $booking->appointment_datetime }}</td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-8">
                <h5><a href="{{ route('order') }}" style="text-decoration: none; color: #000;">Đơn hàng mới nhất</a></h5>
                <table class="table table-striped table-bordered">
                    <thead class="table" style="background-color: #ffe0e0;">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Item</th>
                            <th>Thành tiền</th>
                            <th>Ngày đặt</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>

                                <td>{{ $order->madh }}</td>
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
                                <td>{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                                <td>{{ $order->created_at->format('d/m/Y') }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>


    </div>
</main>
<style>
    .card {
        background-color: #E6A4B4;
        border: 1px solid #ffc1c1;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Đổ bóng nhẹ */
        transition: box-shadow 0.3s ease;
        /* Hiệu ứng chuyển đổi */
    }

    /* Hiệu ứng đổ bóng mạnh hơn khi hover */
    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .card-title,
    .card-text {
        color: rgb(56, 42, 42);
        /* Màu trắng cho tiêu đề và nội dung */
  
        /* Viền nhẹ màu đen cho chữ */

    }

    .card .card-title i {
        color: #FFF8E3;

    }
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('combinedRevenueChart').getContext('2d');

    // Lấy dữ liệu từ PHP
    const dailyRevenue = @json($dailyRevenue); // Doanh thu theo ngày từ orders
    const dailyBooking = @json($dailyBooking); // Doanh thu theo ngày từ bookings
    const totalRevenue = {{ $totalRevenue }}; // Tổng doanh thu từ orders + bookings

    // Sắp xếp lại mảng dailyRevenue và dailyBooking từ ngày cũ nhất tới mới nhất
    dailyRevenue.sort((a, b) => new Date(a.date) - new Date(b.date));
    dailyBooking.sort((a, b) => new Date(a.date) - new Date(b.date));

    // Trích xuất labels (ngày) và dữ liệu (doanh thu từ orders)
    const labels = dailyRevenue.map(item => item.date);
    const dailyRevenueData = dailyRevenue.map(item => item.revenue);

    // Đồng bộ hóa labels (ngày) giữa dailyRevenue và dailyBooking
    const bookingMap = new Map(dailyBooking.map(item => [item.date, item.revenue]));
    const dailyBookingData = labels.map(date => bookingMap.get(date) || 0); // Nếu không có thì lấy 0

    // Thêm label cho tổng doanh thu
    labels.push('Tổng Doanh Thu');
    dailyRevenueData.push(totalRevenue);
    dailyBookingData.push(0); // Không hiển thị doanh thu đặt lịch cho tổng

    // Tạo biểu đồ
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels, // Ngày + Tổng doanh thu
            datasets: [
                {
                    label: 'Doanh Thu Từ Đơn Hàng',
                    data: dailyRevenueData.slice(0, -1), // Dữ liệu từng ngày từ orders
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Doanh Thu Từ Đặt Lịch',
                    data: dailyBookingData.slice(0, -1), // Dữ liệu từng ngày từ bookings
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Tổng Doanh Thu',
                    data: Array(labels.length - 1).fill(null).concat(totalRevenue), // Chỉ hiện tổng ở cuối
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) { return value.toLocaleString() + ' VNĐ'; }
                    }
                }
            },
            plugins: {
                legend: { display: true } // Hiển thị chú thích
            }
        }
    });
});
</script>




@endsection
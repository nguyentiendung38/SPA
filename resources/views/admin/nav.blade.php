<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse shadow-sm" style="background:#ffffff" ;>
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('admin*') ? 'active' : '' }}"
                    href="{{ route('admin') }}" style="color: #000000;">
                    <i class="fas fa-home me-2"></i>
                    Bảng điều khiển
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('categoryadmin*') ? 'active' : '' }}"
                    href="{{ route('categoryadmin') }}" style="color: #000000;">
                    <i class="fas fa-chart-bar me-2"></i>
                    Danh mục sản phẩm
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('productadmin*') ? 'active' : '' }}"
                    href="{{ route('productadmin') }}" style="color: #000000;">
                    <i class="fas fa-box me-2"></i>
                    Sản phẩm
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('service_admin*') ? 'active' : '' }}"
                    href="{{ route('service_admin') }}" style="color: #000000;">
                    <i class="fa-solid fa-truck-fast me-2"></i>
                    Dịch vụ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('packageadmin*') ? 'active' : '' }}"
                    href="{{ route('packageadmin') }}" style="color: #000000;">
                    <i class="fas fa-boxes me-2 "></i>
                    Gói dịch vụ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('admin/order*') ? 'active' : '' }}"
                    href="{{ route('order') }}" style="color: #000000;">
                    <i class="fas fa-shopping-cart me-2"></i>
                    Đơn hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('admin/bookings*') ? 'active' : '' }}"
                    href="{{ route('admin.bookings') }}" style="color: #000000;">
                    <i class="fas fa-calendar-check me-2"></i>
                    Đặt lịch
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('useradmin*') ? 'active' : '' }}"
                    href="{{ route('useradmin') }}" style="color: #000000;">
                    <i class="fas fa-users me-2"></i>
                    Khách hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('blog*') ? 'active' : '' }}"
                    href="{{ route('blogadmin') }}" style="color: #000000;">
                    <i class="fas fa-tags me-2"></i>
                    Tin tức
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('admin/comments*') ? 'active' : '' }}"
                    href="{{ route('admin.comments') }}" style="color: #000000;">
                    <i class="fa fa-commenting me-2"></i>
                    Bình luận
                </a>
            </li>

        </ul>
    </div>
</nav>



<style>
    #sidebarMenu {
        position: sticky;
        /* Giúp sidebar dính vào vị trí khi cuộn */
        top: 0;
        /* Vị trí bắt đầu dính khi cuộn */
        height: 100vh;
        /* Đảm bảo sidebar cao bằng chiều cao màn hình */
        overflow-y: auto;
        /* Nếu nội dung quá dài, cho phép cuộn bên trong sidebar */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Thêm hiệu ứng đổ bóng nhẹ */
        background-color: #ffffff;
        /* Màu nền của sidebar */
    }

    #sidebarMenu .nav-link.active {
        background-color: #FF9999;
        /* Màu xanh Bootstrap */
        color: #ffffff;
        font-weight: 500;
    }

    #sidebarMenu .nav-link:hover {
        background-color: #ffe0e0;
        color: #ffffff;
    }
</style>

<script>
    // Lấy tất cả các mục nav-link
    let navLinks = document.querySelectorAll('#sidebarMenu .nav-link');

    // Lặp qua từng mục và lắng nghe sự kiện click
    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            // Xóa class 'active' khỏi tất cả các mục
            navLinks.forEach(link => link.classList.remove('active'));

            // Thêm class 'active' vào mục được click
            this.classList.add('active');
        });
    });
    window.addEventListener('scroll', function() {
    let sidebar = document.getElementById('sidebarMenu');
    if (window.scrollY > 0) {
        sidebar.style.backgroundColor = '#f8f9fa'; // Màu nền khi cuộn
        sidebar.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.1)'; // Đổ bóng khi cuộn
    } else {
        sidebar.style.backgroundColor = '#ffffff'; // Màu nền ban đầu
        sidebar.style.boxShadow = 'none'; // Bỏ đổ bóng
    }
});

</script>
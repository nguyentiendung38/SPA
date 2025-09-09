<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="makeover/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="makeover/images/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .pagination .page-link {
            background-color: #f7a392;
            /* Màu hồng */
            border-color: #f7a392;
            /* Màu viền */
            color: white;
            /* Màu chữ */
        }

        .pagination .page-link:hover {
            background-color: #f5917d;
            /* Màu hồng đậm khi hover */
            border-color: #f7a392;
        }

        .pagination .page-item.active .page-link {
            background-color: #f5917d;
            /* Màu nền khi đang ở trang hiện tại */
            border-color: #f7a392;
        }
    </style>
</head>

<body>
    <!-- Header -->

    @include('admin.header')

    <!-- Sidebar and Content -->


    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('admin.nav')

            <!-- Main Content -->
            @yield('content')
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>
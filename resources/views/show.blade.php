@extends('layout')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<section class="page_banner">
    <style>
        .rating-section {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-start;
        }

        .star-rating input {
            display: none;
        }

        .star {
            font-size: 30px;
            cursor: pointer;
            color: #ddd;
            transition: color 0.2s;
        }

        .star:hover,
        .star:hover~.star,
        .star-rating input:checked~.star {
            color: #f5b301;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Chi tiết</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Home</a><span>/</span>Products</p>
            </div>

        </div>
    </div>
</section>
<div class="cartPage">
    <div class="container">
        <h1>Chi tiết đơn hàng <span class="colorPrimary fontWeight400">#{{ $order->madh }}</span></h1>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <p>Người đặt hàng: {{ $order->name }}</p>
                    <p>Email: {{ $order->email }}</p>
                </div>
                <div class="col-lg-6">
                    <p>Số điện thoại: {{ $order->phone }}</p>
                    <p>Địa chỉ: {{ $order->address }}</p>
                </div>
            </div>
        </div>


        <h2>Danh sách sản phẩm:</h2>
        <table class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
            <thead class="table" style="background-color: #ffe0e0;">
                <tr>

                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th>Ngày đặt</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>

                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                        <td>{{ number_format($item->quantity * $item->price, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-primary custom-btn" data-bs-toggle="modal"
                                onclick="showModal({{ $item->id }})" data-bs-target="#modalRating-{{ $item->id }}">
                                Đánh giá
                            </button>


                            <div class="modal fade" id="modalRating-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="modalRating-{{ $item->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Đánh giá sản phẩm:
                                                {{ $item->product->name }}
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <form class="commentForm" data-product-id="{{ $item->product->id }}">
                                                @csrf
                                                <!-- Phần chọn số sao -->
                                                <div class="rating-section">
                                                    <div class="star-rating">
                                                        <!-- Lặp từ 1 đến 5 để chọn số sao -->
                                                        <input type="radio" id="star5" name="rating" value="5">
                                                        <label for="star5" class="star">
                                                            <i class="icofont-star"></i>
                                                        </label>
                                                        <input type="radio" id="star4" name="rating" value="4">
                                                        <label for="star4" class="star">
                                                            <i class="icofont-star"></i>
                                                        </label>
                                                        <input type="radio" id="star3" name="rating" value="3">
                                                        <label for="star3" class="star">
                                                            <i class="icofont-star"></i>
                                                        </label>
                                                        <input type="radio" id="star2" name="rating" value="2">
                                                        <label for="star2" class="star">
                                                            <i class="icofont-star"></i>
                                                        </label>
                                                        <input type="radio" id="star1" name="rating" value="1">
                                                        <label for="star1" class="star">
                                                            <i class="icofont-star"></i>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="comment_text" class="form-label">Nhận xét</label>
                                                    <textarea class="form-control" id="comment-{{ $item->id }}"
                                                        name="comment_text" rows="3"></textarea>
                                                </div>
                                                <input type="hidden" name="product_id-{{ $item->id }}"
                                                    value="{{ $item->product->id }}">
                                                <input type="hidden" name="user_id" value="{{ $order->user_id }}">

                                                <button type="submit" class="btn btn-primary">Gửi</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p>Tổng tiền: {{ number_format($order->total, 0, ',', '.') }} VNĐ</p>
        <button class=" mo_btn "><a class="" href="{{ route('home') }}"><i class="fa-solid fa-cart-plus"></i>QUAY
                LẠI
                TRANG CHỦ</a></button>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        function showModal(id) {
            var modal = new bootstrap.Modal(document.getElementById('modalRating-' + id));
            modal.show();
        }

        document.addEventListener('DOMContentLoaded', function () {
            const stars = document.querySelectorAll('.star');
            stars.forEach(function (star) {
                star.addEventListener('click', function () {
                    const rating = star.previousElementSibling.value;
                    const stars = star.parentElement.querySelectorAll('.star');
                    stars.forEach(function (s) {
                        if (s.previousElementSibling.value <= rating) {
                            s.classList.add('text-warning');
                        } else {
                            s.classList.remove('text-warning');
                        }
                    });
                });
            });
        });


        function generateStars(rating) {
            rating = Math.max(1, Math.min(5, parseInt(rating, 10)));

            let stars = '';
            for (let i = 0; i < rating; i++) {
                stars += '<span>⭐</span>';
            }
            for (let i = rating; i < 5; i++) {
                stars += '<span>☆</span>';
            }
            return stars;
        }

        $(document).on('submit', '.commentForm', function (e) {
            e.preventDefault();

            const form = $(this);
            const rating = form.find('input[name="rating"]:checked').val();
            const comment = form.find('textarea[name="comment_text"]').val();
            const productId = form.data('product-id');
            const userId = $('input[name="user_id"]').val();

            if (!rating) {
                alert('Vui lòng chọn số sao!');
                return;
            }

            if (!comment.trim()) {
                alert('Vui lòng nhập nhận xét!');
                return;
            }

            $.ajax({
                url: "{{ route('product.comment.post') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    rating: rating,
                    comment_text: comment,
                    product_id: productId,
                    user_id: userId
                },
                success: function (data) {
                    alert('Cảm ơn bạn đã đánh giá sản phẩm!');
                    location.reload();
                },
                error: function (xhr) {
                    alert('Đã xảy ra lỗi khi gửi đánh giá. Vui lòng thử lại sau.');
                }
            });
        });
    </script>
@endpush
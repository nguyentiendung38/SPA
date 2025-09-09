@extends('layout')
@section('titlepage', $item->name)
@section('content')

<!-- Begin:: Single Products Section -->
<section class="singleProduct">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product_gallery">
                    <ul id="product_gallery" class="gallery_sliders cS-hidden">
                        <li data-thumb="{{ asset('upload/' . $item->image) }}">
                            <div class="pg_item"><img src="{{ asset('upload/' . $item->image) }}" alt="" /></div>
                        </li>
                        <li data-thumb="{{ asset('upload/' . $item->image) }}">
                            <div class="pg_item"><img src="{{ asset('upload/' . $item->image) }}" alt="" />
                            </div>
                        </li>
                        <li data-thumb="{{ asset('upload/' . $item->image) }}">
                            <div class="pg_item"><img src="{{ asset('upload/' . $item->image) }}" alt="" />
                            </div>
                        </li>
                        <li data-thumb="{{ asset('upload/' . $item->image) }}">
                            <div class="pg_item"><img src="{{ asset('upload/' . $item->image) }}" alt="" />
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product_details">
                    <h3>{{ $item->name }}</h3>
                    <div class="product_price clearfix">
                        <span class="price">
                            <del><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($item->price, 0, ',', '.') }}
                                        VNĐ</bdi></span></del>
                            <ins><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($item->price, 0, ',', '.') }}
                                        VNĐ</bdi></span></ins>
                        </span>
                    </div>
                    <div class="woocommerce-product-rating">
                        @php
                            // Tính tổng số lượng bình luận và trung bình sao
                            $totalComments = $comments->count();
                            $averageRating = $totalComments > 0 ? $comments->avg('rating') : 0;
                        @endphp

                        <!-- Hiển thị đánh giá trung bình -->
                        @if ($totalComments > 0)
                            <div class="star-rating" role="img"
                                aria-label="Rated {{ number_format($averageRating, 1) }} out of 5">
                                <span class="w80">
                                    Đánh giá trung bình:
                                    <strong class="rating">{{ number_format($averageRating, 1) }}</strong>
                                    trên 5
                                </span>
                            </div>
                        @else
                            <p>Chưa có đánh giá nào</p>
                        @endif

                        <!-- Hiển thị số lượng bình luận -->
                        <p class="sicc_title">
                            {{ $totalComments }} bình luận
                        </p>
                    </div>


                    <div class="pd_excrpt">
                        <p>
                            {{ $item->description }}
                        </p>
                    </div>
                    <div class="cart_quantity clearfix">
                        <div class="quantity quantityd clearfix">
                            <!-- Nút giảm số lượng -->
                            <button type="button" class="minus qtyBtn btnMinus">-</button>

                            <!-- Input hiển thị số lượng -->
                            <input type="number" class="carqty input-text qty text" id="displayQuantity" name="quantity"
                                value="1" min="1">

                            <!-- Nút tăng số lượng -->
                            <button type="button" class="plus qtyBtn btnPlus">+</button>
                        </div>

                        <!-- Form gửi dữ liệu -->
                        <form action="{{ route('cart.add', $item->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" id="quantityInput" value="1">
                            <button type="submit" class="mo_btn"><i class="icofont-cart-alt"></i> Thêm vào giỏ
                                hàng</button>
                        </form>
                    </div>

                    <div class="pro_meta clearfix">
                        <h5>Thông tin</h5>
                        <!-- <div class="mtItem">
                                    SKU: 01
                                </div> -->
                        <div class="mtItem">
                            Danh mục sản phẩm: <a href="">{{ $item->category->name }}</a>

                        </div>
                        <div class="mtItem">
                            Số lượng sản phẩm còn: <a href="">{{ $item->quantity }}</a>
                        </div>

                    </div>
                    <div class="pro_m_social">
                        <h5>Chia sẻ:</h5>
                        <a target="_blank" href="https://www.facebook.com/"><i class="icofont-facebook"></i></a>
                        <a target="_blank" href="https://twitter.com/"><i class="icofont-twitter"></i></a>
                        <a target="_blank" href="https://bebo.com/"><i class="icofont-bebo"></i></a>
                        <a target="_blank" href=""><i class="icofont-dribbble"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_tabarea">
                    <ul class="nav nav-tabs productTabs" id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active" id="description-tab" data-toggle="tab" href="#description" role="tab"
                                aria-controls="description" aria-selected="true">Thông tin sản phẩm</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                aria-selected="false">Đánh giá</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="pdtci_content">
                                <p>
                                    {{ $item->description }}
                                </p>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="pdtci_content">
                                <div class="comment_area">
                                    <div class="sic_comments">
                                        <h3 class="sicc_title" id="commentCount"></h3>
                                        <ol class="sicc_list">
                                        </ol>
                                        @forelse($comments as $comment)
                                            <article class="single_comment productComent">
                                                <img src={{ asset('upload/' . $comment->user->image) }} alt=""
                                                    style="width: 50px; height: 50px; border-radius: 50%;" />
                                                <h4 class="cm_author"><a href="javascript:void(0);">
                                                        {{ $comment->user->name }}
                                                    </a>
                                                </h4>
                                                <span class="cm_date">
                                                    {{ $comment->created_at->format('d-m-Y H:i:s') }}
                                                </span>
                                                <div class="sc_content">
                                                    <p>
                                                        {{ $comment->comment_text }}
                                                    </p>
                                                </div>
                                                <div class="sc_rating">
                                                    @for ($i = 0; $i < $comment->rating; $i++)
                                                        <i class="icofont-star text-warning"></i>
                                                    @endfor
                                                </div>

                                                @if (Auth::check() && Auth::user()->id == $comment->user_id)
                                                    <a href="javascript:void(0);" class="deleteComment"
                                                        data-id="{{ $comment->id }}"
                                                        style="position: absolute; right: 10px; top: 10px;">
                                                        <i class="icofont-trash"></i>
                                                    </a>
                                                @endif
                                            </article>
                                        @empty
                                            <p>Chưa có đánh giá nào</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="related_area">
                    <h2>Sản phẩm liên quan</h2>
                    <div class="related_carousel owl-carousel">
                        @foreach ($relatedProducts as $item)
                            <div class="product_item text-center">
                                <div class="pi_thumb">
                                    <img src="{{ asset('upload/' . $item->image) }}" alt=""
                                        style="width: 300px; height: 200px; object-fit: cover;" />
                                    <div class="pi_01_actions">
                                        <a href="{{ route('detail', ['id' => $item->id]) }}"
                                            onclick="event.preventDefault(); document.getElementById('add-to-cart-form-{{ $item->id }}').submit();">
                                            <i class="icofont-cart-alt"></i>
                                        </a>
                                        <a href="{{ route('detail', ['id' => $item->id]) }}">
                                            <i class="icofont-eye"></i>
                                        </a>
                                    </div>
                                    <div class="prLabels">
                                        <p class="justin">New</p>
                                    </div>
                                </div>
                                <div class="pi_content">
                                    <p><a href="">
                                            @if ($item->category)
                                                {{ $item->category->name }}
                                            @endif
                                        </a></p>
                                    <h3><a href="">{{ $item->name }}</a></h3>
                                    <div class="product_price clearfix">
                                        <span class="price">{{ number_format($item->price, 0, ',', '.') }} VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End:: Single Products Section -->

@endsection

@push('scripts')
    <script>
        $(document).on('click', '.deleteComment', function () {
            const id = $(this).data('id');
            $.ajax({
                url: "{{ route('product.comment.delete') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function (data) {
                    alert('Xóa thành công');
                    location.reload();
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnPlus = document.querySelector('.btnPlus');
            const btnMinus = document.querySelector('.btnMinus');
            const displayQuantity = document.getElementById('displayQuantity');
            const quantityInput = document.getElementById('quantityInput');

            // Nút tăng số lượng
            btnPlus.addEventListener('click', () => {
                let currentValue = parseInt(displayQuantity.value) || 1;
                currentValue += 0;
                displayQuantity.value = currentValue;
                quantityInput.value = currentValue; // Đồng bộ giá trị ẩn
            });

            // Nút giảm số lượng
            btnMinus.addEventListener('click', () => {
                let currentValue = parseInt(displayQuantity.value) || 1;
                if (currentValue > 1) {
                    currentValue -= 0;
                    displayQuantity.value = currentValue;
                    quantityInput.value = currentValue; // Đồng bộ giá trị ẩn
                }
            });

            // Xử lý khi người dùng nhập trực tiếp vào ô input
            displayQuantity.addEventListener('input', () => {
                let value = parseInt(displayQuantity.value);
                if (value < 1 || isNaN(value)) {
                    value = 1; // Giá trị tối thiểu là 1
                }
                displayQuantity.value = value;
                quantityInput.value = value; // Đồng bộ giá trị ẩn
            });
        });
    </script>
@endpush
@extends('layout')
@section('titlepage', 'Giỏ hàng')
@section('content')
<section class="page_banner">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <h2 class="banner-title">Giỏ hàng</h2>
                <p class="breadcrumbs"><a href="{{ route('home') }}">Trang chủ</a><span>/</span>Trang giỏ hàng</p>
            </div>

        </div>
    </div>
</section>

<section class="cartPage">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="woocommerce">
                    <!--  -->
                    <div class="woocommerce-cart-form">
                        <table class="shop_table">
                            <thead>
                                <tr>
                                    <th class="product-name">Item</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng tiền</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cart->items->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <p>Giỏ hàng của bạn hiện đang trống.</p>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($cart->items as $item)
                                        <tr class="cart_item">
                                            <td class="product-name" data-title="Product">
                                                <img src="{{ asset('upload/' . $item->product->image) }}" alt="" width="200px">
                                                {{ $item->product->name }}
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($item->product->price, 0, ',', '.') }}
                                                        VNĐ</bdi></span>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity"
                                                style="width: 250px; padding: 5px; text-align: center;">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <form action="{{ route('cart.update', $item->id) }}" method="POST"
                                                        style="margin: 0;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="decrement" value="1">
                                                        <button class="btn btn-outline-secondary" type="submit">-</button>
                                                    </form>

                                                    <div id="quantity-display-{{ $item->id }}" class="mx-2"
                                                        style="width: 50px; text-align: center; font-size: 16px;">
                                                        {{ $item->quantity }}
                                                    </div>

                                                    <form action="{{ route('cart.update', $item->id) }}" method="POST"
                                                        style="margin: 0;">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                                        <button class="btn btn-outline-secondary" type="submit">+</button>
                                                    </form>
                                                </div>
                                            </td>



                                            <td class="product-subtotal" data-title="Subtotal">
                                                <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                                        VNĐ</bdi></span>
                                            </td>
                                            <td class="product-remove">
                                                <a href="" class="">
                                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn mo_btn" type="submit"><i
                                                                class="fa-solid fa-trash-can"></i></button>
                                                    </form>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="actions">
                                                <div class="coupon">
                                                    <label for="coupon_code">Mã giảm giá:</label>
                                                    <input type="text" name="coupon_code" class="input-text" id="coupon_code"
                                                        value="" placeholder="Mã giảm giá">
                                                    <button type="submit" class="button" name="apply_coupon"
                                                        value="Apply coupon">Áp dụng mã</button>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!--  -->
                    <div class="row">
                        <div class="col-7">
                            <button class=" mo_btn "><a class="" href="{{ route('home') }}"><i class="fa-solid fa-cart-plus"></i>TIẾP
                                    TỤC MUA HÀNG</a></button>
                        </div>
                        <div class="col-5">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Tạm tính</th>
                                        <th>{{ number_format($cart->items->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }}
                                            VNĐ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Tổng tiền</th>
                                        <th>{{ number_format($cart->items->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }}
                                            VNĐ</th>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{{ route('checkout.create') }}" method="GET">
                                @csrf
                                @foreach ($cart->items as $item)
                                    <input type="hidden" name="product_id[]" value="{{ $item->product->id }}">
                                    <!-- Chỉnh sửa ở đây -->
                                    <input type="hidden" name="name[]" value="{{ $item->product->name }}">
                                    <input type="hidden" name="image[]" value="{{ $item->product->image }}">
                                    <input type="hidden" name="price[]" value="{{ $item->product->price }}">
                                    <input type="hidden" name="quantity[]" value="{{ $item->quantity }}">
                                @endforeach
                                <button type="submit" class="mo_btn"><i class="fa-solid fa-cart-shopping"></i>THANH TOÁN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
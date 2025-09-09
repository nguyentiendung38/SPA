@extends('admin.layout')
@section('titlepage', 'Control Pannel')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h2>Thêm Mới Sản Phẩm</h2>

                <form class="form-container" action="{{ route('update_product', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="name">Tên sản phẩm</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ $product->name }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="description">Thông tin</label>
                        <textarea class="form-control" id="description" name="description"
                            rows="3">{{ $product->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="price">Giá</label>
                        <input class="form-control" type="number" id="price" name="price" value="{{ $product->price }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="image">Ảnh</label>
                        <div class="mb-2">
                            <img src="{{ asset('upload/' . $product->image) }}" alt="Avatar" class="img-thumbnail" width="100">
                        </div>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" 
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category_id">Loại</label>

                        <select class="form-select" id="category_id" name="category_id" required>
                            @foreach ($category_products as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <button class="btn" style="background-color: #FF9999; color: white; border: none;" type="submit">Sửa
                        sản phẩm</button>

                </form>
            </div>
            <div class="col-lg-2"></div>


        </div>
    </div>

</main>
@endsection
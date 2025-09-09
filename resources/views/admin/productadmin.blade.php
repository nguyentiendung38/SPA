@extends('admin.layout')
@section('titlepage', 'Control Pannel')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <h2>Thêm Sản Phẩm</h2>

                <form class="needs-validation" action="{{ route('add_product') }}" method="POST"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Tên sản phẩm</label>
                        <input class="form-control" type="text" id="name" name="name" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập tên sản phẩm.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="description">Thông tin</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="price">Giá</label>
                        <input class="form-control" type="number" id="price" name="price" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập giá sản phẩm.
                        </div>
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="image">Ảnh</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="0" min="0"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category_id">Loại</label>

                        <select class="form-select" id="category_id" name="category_id" required>
                            @foreach ($category_products as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <button class="btn " style="background-color: #FF9999; color: white; border: none;"
                        type="submit">Thêm sản phẩm</button>
                </form>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Danh Sách Sản Phẩm</h2>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{ route('search_admin') }}" method="GET" class="d-flex" role="search">
                            <input class="form-control me-2" name="query" type="search" placeholder="Tiềm kiếm sản phẩm"
                                aria-label="Search">
                            <button class="btn " style="background-color: #FF9999; color: white; border: none;"
                                type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
                <table class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
                    <thead class="table" style="background-color: #ffe0e0;">
                        <tr>
                            <th>ID</th>
                            <th>Hình ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Thông tin sản phẩm</th>
                            <th>Lượt xem</th>
                            <th>Lượt bán</th>
                            <th>Số lượng sp</th>
                            <th>Loại</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newestProducts as $item)  
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><img src="{{ asset('upload/' . $item->image) }}" alt="" width="50px"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->view }}</td>
                                <td>{{ $item->sold }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    @if ($item->category)
                                        {{ $item->category->name }}
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('edit_product', $item->id) }}" method="GET"
                                        class="d-inline-block">
                                        <button class="btn btn-sm btn-warning" type="submit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('delete_product', $item->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    {{ $newestProducts->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
    </div>

</main>
@endsection
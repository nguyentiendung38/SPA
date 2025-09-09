@extends('admin.layout')
@section('titlepage', 'Control Pannel')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">


            
                <h2>Sản phẩm liên quan "<span class="text-primary">{{ $query }}</span>"</h2>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Hình ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Thông tin sản phẩm</th>
                            <th>Lượt xem</th>
                            <th>Lượt bán</th>
                            <th>Loại</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><img src="{{ asset('upload/' . $item->image) }}" alt="" width="50px"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->view }}</td>
                                <td>{{ $item->sold }}</td>
                                <td>
                                    @if ($item->category)
                                        {{ $item->category->name }}
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('edit_product', $item->id) }}" method="GET" class="d-inline-block">
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
                    {{ $products->appends(['query' => $query])->links('pagination::bootstrap-5') }}
                </nav>
            
        </div>
    </div>

</main>
@endsection
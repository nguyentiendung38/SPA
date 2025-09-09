@extends('admin.layout')
@section('titlepage', 'Control Pannel')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <h2>Thêm Dịch vụ</h2>
                <form class="needs-validation" action="{{ route('addService') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Tên Dịch vụ</label>
                        <input class="form-control" type="text" id="name" name="service_name" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập tên dịch vụ.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        <div class="invalid-feedback">
                            Vui lòng nhập mô tả dịch vụ.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="price">Giá</label>
                        <input class="form-control" type="number" id="price" name="price" step="0.01" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập giá dịch vụ.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="image">Ảnh</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    
                    <button class="btn" style="background-color: #FF9999; color: white; border: none;" type="submit">Thêm Dịch vụ</button>
                </form>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Danh Sách Dịch vụ</h2>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
                <table class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
                    <thead class="table" style="background-color: #ffe0e0;">
                        <tr>
                            <th>ID</th>
                            <th>Tên dịch vụ</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Hình ảnh</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allService as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->service_name }}</td>
                                <td>{{ $service->description }}</td>
                                <td>{{ $service->price }}</td>
                                <td><img src="{{ asset('upload/' . $service->image) }}" alt="" width="150px"></td>
                                <td>
                                    <form action="{{ route('editService', $service->id) }}" method="GET" class="d-inline-block">
                                        <button class="btn btn-sm btn-warning" type="submit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('deleteService', $service->id) }}" method="POST" class="d-inline-block">
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
                <nav aria-label="Page navigation">
                    {{ $allService->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
    </div>
</main>
@endsection

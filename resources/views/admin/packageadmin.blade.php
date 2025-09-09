@extends('admin.layout')
@section('titlepage', 'Control Pannel')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <h2>Thêm Gói Dịch Vụ</h2>
                <form class="needs-validation" action="{{ route('add_package') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="service_id">Dịch vụ</label>
                        <select class="form-select" id="service_id" name="service_id" required>
                            <option value="">Chọn dịch vụ</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Vui lòng chọn dịch vụ.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="package_name">Tên Gói Dịch Vụ</label>
                        <input class="form-control" type="text" id="package_name" name="package_name" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập tên gói dịch vụ.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description">Mô Tả</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                        <div class="invalid-feedback">
                            Vui lòng nhập mô tả gói dịch vụ.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="price">Giá</label>
                        <input class="form-control" type="number" id="price" name="price" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập giá gói dịch vụ.
                        </div>
                    </div>
                    <button class="btn" style="background-color: #FF9999; color: white; border: none;" type="submit">Thêm Gói Dịch Vụ</button>
                </form>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Danh Sách Gói Dịch Vụ</h2>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
                <table class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
                    <thead class="table" style="background-color: #ffe0e0;">
                        <tr>
                            <th>ID</th>
                            <th>Tên Gói Dịch Vụ</th>
                            <th>Mô Tả</th>
                            <th>Giá</th>
                            <th>Dịch Vụ</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allPackages as $package)
                            <tr>
                                <td>{{ $package->id }}</td>
                                <td>{{ $package->package_name }}</td>
                                <td>{{ $package->description }}</td>
                                <td>{{ $package->price }}</td>
                                <td>{{ $package->service->service_name ?? 'Không có dịch vụ' }}</td> <!-- Lấy tên dịch vụ nếu có -->
                                <td>
                                    <form action="{{ route('edit_package', $package->id) }}" method="GET" class="d-inline-block">
                                        <button class="btn btn-sm btn-warning" type="submit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('delete_package', $package->id) }}" method="POST" class="d-inline-block">
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
            </div>
        </div>
    </div>
</main>
@endsection

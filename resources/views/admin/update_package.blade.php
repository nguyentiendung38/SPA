@extends('admin.layout')
@section('titlepage', 'Cập Nhật Gói Dịch Vụ')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h2>Cập Nhật Gói Dịch Vụ</h2>
        <form class="needs-validation" action="{{ route('update_package', $package->id) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT') <!-- Thêm phương thức PUT -->
            
            <div class="mb-3">
                <label class="form-label" for="service_id">Dịch vụ</label>
                <select class="form-select" id="service_id" name="service_id" required>
                    <option value="">Chọn dịch vụ</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ $package->service_id == $service->id ? 'selected' : '' }}>
                            {{ $service->service_name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Vui lòng chọn dịch vụ.
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="package_name">Tên Gói Dịch Vụ</label>
                <input class="form-control" type="text" id="package_name" name="package_name" value="{{ $package->package_name }}" required>
                <div class="invalid-feedback">
                    Vui lòng nhập tên gói dịch vụ.
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="description">Mô Tả</label>
                <textarea class="form-control" id="description" name="description" required>{{ $package->description }}</textarea>
                <div class="invalid-feedback">
                    Vui lòng nhập mô tả.
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="price">Giá</label>
                <input class="form-control" type="number" id="price" name="price" value="{{ $package->price }}" required>
                <div class="invalid-feedback">
                    Vui lòng nhập giá.
                </div>
            </div>

            <button class="btn" style="background-color: #FF9999; color: white; border: none;" type="submit">Cập Nhật Gói Dịch Vụ</button>

        </form>
    </div>
</main>
@endsection

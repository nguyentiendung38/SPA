@extends('admin.layout')
@section('titlepage', 'Cập Nhật Dịch Vụ')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h2>Cập Nhật Dịch Vụ</h2>
        <form class="needs-validation" action="{{ route('updateService', $service->id) }}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')



            <div class="mb-3">
                <label class="form-label" for="name">Tên sản phẩm</label>
                <input class="form-control" type="text" id="service_name" name="service_name" value="{{ $service->service_name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="description">Thông tin</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $service->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" for="price">Giá</label>
                <input class="form-control" type="number" id="price" name="price" value="{{ $service->price }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="image">Ảnh</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>

            

            <button class="btn" style="background-color: #FF9999; color: white; border: none;" type="submit">Cập Nhật Dịch Vụ</button>
        </form>
    </div>
</main>
@endsection

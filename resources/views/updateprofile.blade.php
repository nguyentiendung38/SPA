@extends('layout')
@section('titlepage', 'Control Panel')
@section('content')
<div class="cartPage">
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-4">Sửa người dùng</h2>

                <form class="form-container" action="{{ route('update_profile', $profile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label" for="name">Tên</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $profile->name) }}" required>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="phone">Số điện thoại</label>
                        <input class="form-control" type="number" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}" required>
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="image">Ảnh đại diện</label>
                        @if($profile->image)
                        <div class="mb-2">
                            <img src="{{ asset('upload/' . $profile->image) }}" alt="Avatar" class="img-thumbnail" width="100">
                        </div>
                        @endif
                        <input class="form-control" type="file" id="image" name="image">
                        <small class="form-text text-muted">Nếu không thay đổi, hãy để trống.</small>
                        @error('image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password">Mật khẩu</label>
                        <input placeholder="Nhập mật khẩu mới (nếu thay đổi)" type="password" id="password" name="password" class="form-control">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password-confirm">Nhập lại mật khẩu</label>
                        <input placeholder="Nhập lại mật khẩu" type="password" id="password-confirm" name="password_confirmation" class="form-control">
                        @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button class="mo_btn" type="submit"><i class="fa-solid fa-check"></i>Cập nhật</button>
                        <a href="{{ route('profile') }}" class="mo_btn"><i class="fa-solid fa-xmark"></i>Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
</div>
@endsection

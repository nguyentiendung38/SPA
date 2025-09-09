@extends('admin.layout')
@section('titlepage', 'Control Pannel')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h2>Sửa người dùng</h2>

                <form class="form-container" action="{{ route('update_user', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="name">Tên </label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone">Phone </label>
                        <input class="form-control" type="number" id="phone" name="phone" value="{{ $user->phone }}"
                            required>

                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" value="{{ $user->email }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Mật khẩu</label>
                        <input class="form-control" type="password" id="password" name="password"
                            value="{{ $user->password }}" required>

                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>User</option>
                            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>




                    <button class="btn" style="background-color: #FF9999; color: white; border: none;" type="submit">Sửa </button>

                </form>
            </div>
            <div class="col-lg-2"></div>


        </div>
    </div>

</main>
@endsection
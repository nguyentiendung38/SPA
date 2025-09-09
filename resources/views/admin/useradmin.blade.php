@extends('admin.layout')
@section('titlepage', 'Control Pannel')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <h2>Thêm người dùng</h2>

                <form class="needs-validation" action="{{ route('add_user') }}" method="POST"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Tên </label>
                        <input class="form-control" type="text" id="name" name="name" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập tên
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Mật khẩu</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                        <div class="invalid-feedback">Vui lòng nhập mật khẩu.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password-confirm">Nhập lại mật khẩu</label>
                        <input class="form-control" type="password" id="password-confirm" name="password_confirmation"
                            required>
                        <div class="invalid-feedback">Vui lòng nhập lại mật khẩu.</div>
                    </div>







                    <button class="btn " style="background-color: #FF9999; color: white; border: none;"
                        type="submit">Thêm người dùng</button>
                </form>
            </div>

            <div class="col-lg-9">
                <table class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
                    <thead class="table" style="background-color: #ffe0e0;">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Ảnh</th>
                            <th>Quyền hạng</th>
                            <th>Thao tác</th> <!-- Thêm cột mới -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allUser as $item)  
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td><img src="{{ asset('upload/' . $item->image) }}" alt="Ảnh đại diện" width="80px">
                                </td>
                                <td>{{ $item->role === 1 ? 'Admin' : 'User' }}</td>
                                <td>
                                    <form action="{{ route('edit_user', $item->id) }}" method="GET" class="d-inline-block">
                                        <button class="btn btn-sm btn-warning" type="submit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('delete_user', $item->id) }}" method="POST"
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

            </div>
        </div>
    </div>

</main>
@endsection
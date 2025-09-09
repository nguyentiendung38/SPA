@extends('admin.layout')
@section('titlepage', 'Quản Lý Bài Viết')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <h2>Thêm Bài Viết</h2>
                <form class="needs-validation" action="{{ route('add_blog') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="title">Tiêu đề</label>
                        <input class="form-control" type="text" id="title" name="title" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập tiêu đề bài viết.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="content">Nội dung</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                        <div class="invalid-feedback">
                            Vui lòng nhập nội dung bài viết.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category_blogs_id">Danh mục</label>
                        <select class="form-select" id="category_blogs_id" name="category_blogs_id" required>
                            <option value="">Chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Vui lòng chọn danh mục.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="image">Hình ảnh</label>
                        <input class="form-control" type="file" id="image" name="image" accept="image/*">
                    </div>
                    <button class="btn" style="background-color: #FF9999; color: white; border: none;" type="submit">Thêm Bài Viết</button>
                </form>
            </div>

            <div class="col-lg-9">
                <h2>Danh Sách Bài Viết</h2>
                <table class="table table-striped table-bordered" style="border-radius: 10px; overflow: hidden;">
                    <thead class="table" style="background-color: #ffe0e0;">
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allBlogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ \Str::limit($blog->content, 50) }}</td>
                                <td>{{ $blog->category ? $blog->category->name : 'Không có danh mục' }}</td>
                                <td>
                                    @if($blog->image)
                                        <img src="{{ asset('upload/' . $blog->image) }}" alt="Hình ảnh" style="width: 50px; height: auto;">
                                    @else
                                        Không có hình ảnh
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('edit_blog', $blog->id) }}" method="GET" class="d-inline-block">
                                        <button class="btn btn-sm btn-warning" type="submit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('delete_blog', $blog->id) }}" method="POST" class="d-inline-block">
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

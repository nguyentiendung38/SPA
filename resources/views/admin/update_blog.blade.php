@extends('admin.layout')
@section('titlepage', 'Cập Nhật Bài Viết')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h2>Cập Nhật Bài Viết</h2>

                <form class="form-container" action="{{ route('update_blog', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label" for="title">Tiêu đề</label>
                        <input class="form-control" type="text" id="title" name="title" value="{{ $blog->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="content">Nội dung</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required>{{ $blog->content }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="category_blogs_id">Danh mục</label>
                        <select class="form-select" id="category_blogs_id" name="category_blogs_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="image">Hình ảnh (nếu có)</label>
                        <input class="form-control" type="file" id="image" name="image">
                        @if ($blog->image)
                            <img src="{{ asset('upload/' . $blog->image) }}" alt="Hình ảnh" style="width: 50px; height: auto; margin-top: 10px;">
                        @else
                            Không có hình ảnh
                        @endif
                    </div>

                    <button class="btn" style="background-color: #FF9999; color: white; border: none;" type="submit">Cập Nhật Bài Viết</button>

                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</main>
@endsection

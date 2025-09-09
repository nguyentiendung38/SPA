@extends('admin.layout')
@section('titlepage', 'Quản lý bình luận')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <h2>Danh sách bình luận</h2>

        <!-- Hiển thị thông báo khi xóa thành công -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nội dung bình luận</th>
                    <th>Sản phẩm</th>
                    <th>Người dùng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->comment_text }}</td>
                    <td>{{ $comment->product->name ?? 'Sản phẩm đã bị xóa' }}</td>
                    <td>{{ $comment->user->name ?? 'Người dùng đã bị xóa' }}</td> <!-- Kiểm tra nếu người dùng bị xóa -->
                    <td>
                        <form action="{{ route('admin.comments.delete', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Hiển thị phân trang -->
        {{ $comments->links() }}
    </div>
</main>
@endsection

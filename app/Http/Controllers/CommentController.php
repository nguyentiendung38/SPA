<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Hiển thị danh sách bình luận, với thông tin về sản phẩm và người dùng
    public function comments()
    {
        // Lấy tất cả bình luận cùng với thông tin sản phẩm và người dùng (sử dụng eager loading)
        $comments = Comment::with(['product', 'user'])->orderBy('id', 'desc')->paginate(10); // Phân trang

        return view('admin.comments', compact('comments'));
    }

    // Xóa bình luận theo ID
    public function deleteComment($id)
    {
        // Tìm bình luận theo ID, nếu không tìm thấy sẽ ném lỗi 404
        $comment = Comment::findOrFail($id);
        $comment->delete();

        // Redirect lại danh sách bình luận với thông báo thành công
        return redirect()->route('admin.comments')->with('success', 'Đã xóa bình luận thành công!');
    }

    // Thêm bình luận mới (nếu cần)
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào (nếu cần)
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'comment_text' => 'required|string|max:500',
        ]);

        // Lưu bình luận vào cơ sở dữ liệu
        Comment::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'comment_text' => $request->comment_text,
        ]);

        // Redirect về trang danh sách bình luận
        return redirect()->route('admin.comments')->with('success', 'Đã thêm bình luận thành công!');
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category_blog;
use Illuminate\Http\Request;

class BlogController extends Controller {
    public function blog() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $popularPosts = Post::orderBy('views', 'desc')->take(5)->get();
        $category_blogs = Category_blog::all();

        return view('blog', compact('posts', 'popularPosts', 'category_blogs'));
    }

    public function show_blog($id) {
        $post = Post::findOrFail($id); // Lấy bài viết theo ID
        $popularPosts = Post::orderBy('views', 'desc')->take(5)->get();
        $category_blogs = Category_blog::all();

        return view('show_blog', compact('post', 'popularPosts', 'category_blogs'));
    }
}

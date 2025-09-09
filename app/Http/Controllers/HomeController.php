<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Products;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $popularPosts = Post::orderBy('views', 'desc')->take(3)->get();
        $services = Service::all(); // Giả sử bạn đã có bảng services
        $packages = Package::all(); // Lấy tất cả packages
      
        $allProducts = Products::with('category')->orderBy('id', 'asc')->paginate(8);
        $newProducts = Products::with('category')->orderBy('id', 'desc')->paginate(8);
        return view('home', compact('services','packages','popularPosts', 'allProducts','newProducts'));
    }
}
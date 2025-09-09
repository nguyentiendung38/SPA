<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Booking;
class OrderController extends Controller
{

    public function show($id){
        $order = Order::with(['orderItems.product', 'user'])->findOrFail($id);
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->get();
        return view('show', compact('order','cart'));
    }

    public function showbill()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(5); // Lấy tất cả các đơn hàng của người dùng hiện tại
    
        // Định nghĩa các trạng thái
        $statuses = [
            1 => 'Chờ xác nhận',
            2 => 'Đang chuẩn bị hàng',
            3 => 'Đang giao',
            4 => 'Đã hoàn thành'
        ];
    
        return view('showbill', compact('orders', 'statuses')); // Truyền collection các đơn hàng và trạng thái sang view showbill.blade.php
    }
  

public function bookings($id)
{
    $bookings = Booking::with(['service', 'package'])->findOrFail($id);
    return view('bookingdetail', compact('bookings'));
}

   
    
}

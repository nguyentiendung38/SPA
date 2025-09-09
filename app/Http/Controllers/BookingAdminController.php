<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingAdminController extends Controller
{
    public function bookings() 
    {
        $currentUser = Auth::user(); // Lấy thông tin người dùng đã đăng nhập
        
        $bookings = Booking::with('user', 'service', 'package')->orderBy('id', 'desc')->paginate(10); // Tải thông tin người dùng, dịch vụ và gói
        return view('admin.bookings', compact('bookings','currentUser'));
    }

    public function updateBooking(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $request->validate(['status' => 'required|string']);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('admin.bookings')->with('success', 'Cập nhật trạng thái đặt lịch thành công!');
    }

    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings')->with('success', 'Xóa đặt lịch thành công!');
    }
}


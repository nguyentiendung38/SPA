<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Service;

use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    
// Thêm vào trong BookingController
public function index()
{
    $services = Service::all(); 
   
    return view('booking.index', compact('services'));
}



    public function showBookingForm($package_id)
    {
        // Lấy thông tin gói dịch vụ
        $package = Package::find($package_id);
    
        // Kiểm tra nếu gói dịch vụ không tồn tại
        if (!$package) {
            // In ra thông báo lỗi nếu gói dịch vụ không tồn tại
            return redirect()->route('package')->with('error', 'Gói dịch vụ không tồn tại!');
        }
    
        // Lấy thông tin dịch vụ tương ứng với gói dịch vụ
        $service = $package->service;
    
        // Trả về view với thông tin dịch vụ và gói dịch vụ
        return view('booking.index', compact('service', 'package'));
    }
    
    
public function booking(Request $request)
{
    
    // Kiểm tra người dùng đã đăng nhập chưa
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để đặt lịch!');
    }

    // Kiểm tra thông tin dịch vụ và gói dịch vụ có hợp lệ không
    $service = Service::find($request->service_id);
    $package = Package::find($request->package_id);

    if (!$service || !$package) {
        return redirect()->route('booking.index')->with('error', 'Dịch vụ hoặc gói dịch vụ không hợp lệ!');
    }

    // Lưu thông tin lịch hẹn vào cơ sở dữ liệu
    $appointment= Booking::create([
        'user_id' => Auth::id(),
        'service_id' => $request->service_id,
        'package_id' => $request->package_id,
        'message' => $request->message,
        'appointment_datetime' => $request->date_time,
        'status' => 'pending',
    ]);

    // Chỉ redirect một lần và hiển thị thông báo thành công
    return redirect()->route('bookingdetail', ['id' => $appointment->id])
    ->with('success', 'Đặt lịch thành công!');
}

    
    public function showbooking()
    {
        $appointments = Booking::where('user_id', Auth::id())->with(['service', 'package'])->get();
        return view('showbooking', compact('appointments'));
    }
    

}
<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    function package(){
       
        $services = Service::all(); // Lấy tất cả dịch vụ
        $allPackages = Package::with('service')->paginate(6);
        return view('package', compact('allPackages','services'));
    }
    public function getPackagesByService($serviceId)
    {
        // Lấy các gói dịch vụ của dịch vụ đã chọn
        $packages = Package::where('service_id', $serviceId)->get();
    
        // Kiểm tra nếu không có gói dịch vụ
        if ($packages->isEmpty()) {
            return response()->json(['message' => 'Không có gói dịch vụ cho dịch vụ này.'], 404);
        }
    
        // Trả về các gói dịch vụ dưới dạng JSON
        return response()->json(['packages' => $packages]);
    }
    

}

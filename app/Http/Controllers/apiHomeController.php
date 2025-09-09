<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Products;

class apiHomeController extends Controller
{
    //
    public function bestsellerProducts()
    {
        $bestsellers = Products::where('sold', 1)->limit(10)->get();
        //thêm truy vấn 
        // sửa data thành mãng lưu nhiều truy vấn như new

        return response()->json([
            'status' => 200,
            'data' => $bestsellers
        ]);
    }

}

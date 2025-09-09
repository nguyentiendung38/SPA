<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class apiProductsController extends Controller
{
    //
    public function index(){
        $products = Products::all();
        return response()->json(
            [
            'status'=>200,
            'message'=> $products,
            ]

        );
    }


 }


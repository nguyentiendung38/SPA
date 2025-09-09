<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Get cart from session
        $cart = Auth::user()->cart;

        // Calculate total price
        $total = $cart->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Create new order
        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total,
        ]);

        // Create order items
        foreach ($cart->items as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);
        }

        // Clear cart
        $cart->items()->delete();
        $cart->delete();

        // Redirect to success page
        return redirect()->route('home')->with('success', 'Đơn hàng của bạn đã được xử lý thành công!');
    }
}


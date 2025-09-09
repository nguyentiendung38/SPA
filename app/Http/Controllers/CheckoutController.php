<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
class CheckoutController extends Controller
{
    public function create(Request $request)
    {
        $cartItems = [
            'product_id' => $request->input('product_id'), // Chỉnh sửa ở đây
            'names' => $request->input('name'),
            'images' => $request->input('image'),
            'prices' => $request->input('price'),
            'quantities' => $request->input('quantity')
        ];

        session(['cartItems' => $cartItems]);

        return view('create', compact('cartItems'));
    }
    public function store(Request $request)
    {
        // Kiểm tra loại thanh toán
        $paymentType = $request->input('payment_type');

        if ($paymentType === 'vnpay') {
            return $this->vnpay_payment($request); // Chuyển hướng xử lý qua VNPay
        }

        // Xử lý tạo đơn hàng thanh toán thông thường (khi nhận hàng)
        $order = new Order();
        $order->user_id = Auth::id();
        $order->madh = 'LalisaSpa' . mt_rand(10000, 99999);
        $order->total = 0;
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->status = 1;

        if ($order->save()) {
            $totalAmount = 0;
            $cartItems = Auth::user()->cart->items;

            foreach ($cartItems as $cartItem) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $cartItem->product_id;
                $orderItem->price = $cartItem->product->price;
                $orderItem->quantity = $cartItem->quantity;
                $orderItem->save();

                $totalAmount += $cartItem->product->price * $cartItem->quantity;

                $product = $cartItem->product;
                $product->quantity -= $cartItem->quantity;
                if ($product->quantity < 0) {
                    return redirect()->route('cart')->with('error', 'Không đủ số lượng sản phẩm trong kho.');
                }

                $product->sold += $cartItem->quantity;
                $product->save();
                $cartItem->delete();
            }

            $order->total = $totalAmount;
            $order->save();

            return redirect()->route('show', [$order->id])->with('success', 'Đã thanh toán thành công!');
        }

        return redirect()->route('cart')->with('error', 'Đã xảy ra lỗi trong quá trình thanh toán!');
    }


    public function vnpay_payment(Request $request)
    {
        $vnp_TmnCode = "7AAQAGAG"; // Mã website VNPay
        $vnp_HashSecret = "Y0P97T33Y7L2N6JPVXZWU10LYHCIQ3EO"; // Chuỗi mã hóa bí mật
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('checkout.vnpay_return');
    
        // Tính lại tổng tiền từ giỏ hàng
        $total = 0;
        $cartItems = Auth::user()->cart->items;
        foreach ($cartItems as $cartItem) {
            $total += $cartItem->product->price * $cartItem->quantity;
        }
    
        // Kiểm tra giá trị hợp lệ
        if ($total < 5000 || $total >= 1000000000) {
            return redirect()->route('cart')->with('error', 'Số tiền giao dịch phải từ 5,000 đến dưới 1 tỷ đồng.');
        }
    
        $order_id = 'LalisaVNPay' . mt_rand(10000, 99999);
        $vnp_Amount = intval($total) * 100; // Tổng tiền x100 để thành đơn vị VNĐ
    
        // Tạo đơn hàng
        $order = new Order();
        $order->user_id = Auth::id();  // Lấy user_id từ người dùng đã đăng nhập
        $order->madh = $order_id; // Mã giao dịch của VNPay
        $order->total = $total; // Tổng tiền
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->status = 1; // Đơn hàng chưa thanh toán
    
        // Lưu đơn hàng vào DB
        if (!$order->save()) {
            return redirect()->route('cart')->with('error', 'Lỗi khi lưu thông tin đơn hàng!');
        }
    
        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => now()->format('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $request->ip(),
            "vnp_Locale" => "vn",
            "vnp_OrderInfo" => "Thanh toán đơn hàng " . $order_id,
            "vnp_OrderType" => "billpayment",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $order_id,
        ];
    
        ksort($inputData);
        $query = http_build_query($inputData);
        $vnpSecureHash = hash_hmac('sha512', $query, $vnp_HashSecret);
        $vnpUrl = $vnp_Url . "?" . $query . "&vnp_SecureHash=" . $vnpSecureHash;
    
        return redirect($vnpUrl);
    }
    


    public function vnpay_return(Request $request)
{
    $inputData = $request->all();
    $vnp_SecureHash = $inputData['vnp_SecureHash'];
    unset($inputData['vnp_SecureHashType'], $inputData['vnp_SecureHash']);
    
    // Kiểm tra tính toàn vẹn của dữ liệu
    ksort($inputData);
    $hashData = http_build_query($inputData);
    $hashSecret = "Y0P97T33Y7L2N6JPVXZWU10LYHCIQ3EO"; // Chuỗi mã hóa bí mật của bạn
    
    // Kiểm tra tính hợp lệ của SecureHash
    if (hash_hmac('sha512', $hashData, $hashSecret) === $vnp_SecureHash) {
        if ($inputData['vnp_ResponseCode'] === '00') {
            // Thanh toán thành công

            $orderId = $inputData['vnp_TxnRef']; // Mã giao dịch của VNPay
            $amount = $inputData['vnp_Amount'] / 100; // Số tiền (chuyển từ VNĐ x100 về đơn vị VNĐ)

            // Tìm đơn hàng và cập nhật trạng thái
            $order = Order::where('madh', $orderId)->first();
            if ($order) {
                $order->status = 2; // Đơn hàng đã thanh toán
                $order->save();
                
                // Lưu các sản phẩm trong giỏ hàng vào bảng OrderItems
                foreach (Auth::user()->cart->items as $cartItem) {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $cartItem->product_id;
                    $orderItem->price = $cartItem->product->price;
                    $orderItem->quantity = $cartItem->quantity;
                    $orderItem->save();

                    // Cập nhật số lượng tồn kho của sản phẩm
                    $product = $cartItem->product;
                    $product->quantity -= $cartItem->quantity;
                    if ($product->quantity < 0) {
                        return redirect()->route('cart')->with('error', 'Không đủ số lượng sản phẩm trong kho.');
                    }

                    // Cập nhật số lượng sản phẩm đã bán
                    $product->sold += $cartItem->quantity;
                    $product->save();

                    // Xóa sản phẩm trong giỏ hàng
                    $cartItem->delete();
                }

                // Xóa giỏ hàng của người dùng
                $user = Auth::user();
                $cart = $user->cart;
                $cart->items()->delete(); // Xóa các sản phẩm trong giỏ hàng
                $cart->delete(); // Xóa giỏ hàng

                // Chuyển hướng đến trang xác nhận thanh toán thành công
                return redirect()->route('show', [$order->id])->with('success', 'Thanh toán thành công và đơn hàng đã được lưu!');
            }

            return redirect()->route('cart')->with('error', 'Không tìm thấy đơn hàng!');
        } else {
            // Nếu mã phản hồi không phải là '00' (thất bại)
            return redirect()->route('cart')->with('error', 'Giao dịch không thành công!');
        }
    }

    // Nếu dữ liệu không hợp lệ
    return redirect()->route('cart')->with('error', 'Dữ liệu không hợp lệ!');
}

    








}

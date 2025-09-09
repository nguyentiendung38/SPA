<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        if (Auth::check()) {
            $cart = Auth::user()->cart;
            if (!$cart) {
                $cart = Cart::create(['user_id' => Auth::id()]);
            }
            return view('cart', compact('cart'));  // Trỏ tới cart.blade.php
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng.');
        }
    }

    public function addToCart(Request $request, $productId)
    {
        // Kiểm tra sản phẩm có tồn tại không
        $product = Products::findOrFail($productId);
    
        // Kiểm tra nếu số lượng sản phẩm là 0
        if ($product->quantity <= 0) {
            return back()->with('error', 'Sản phẩm này đã hết hàng.'); // Quay lại trang trước và hiển thị thông báo
        }
    
        if (Auth::check()) {
            // Lấy giỏ hàng của người dùng, nếu chưa có thì tạo mới
            $cart = Auth::user()->cart;
            if (!$cart) {
                $cart = Cart::create(['user_id' => Auth::id()]);
            }
    
            // Lấy số lượng từ request (mặc định là 1)
            $quantity = max(1, (int) $request->input('quantity', 1)); // Đảm bảo số lượng không nhỏ hơn 1
    
            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            $cartItem = $cart->items()->where('product_id', $productId)->first();
    
            if ($cartItem) {
                // Nếu có, tăng số lượng
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                // Nếu chưa, tạo mới
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ]);
            }
    
            return redirect()->route('cart')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
    }
    

    

    public function updateCart(Request $request, $itemId)
    {
        if (Auth::check()) {
            $cartItem = CartItem::findOrFail($itemId);
            $product = Products::find($cartItem->product_id); // Lấy sản phẩm tương ứng
    
            if (!$product) {
                return redirect()->route('cart')->with('error', 'Sản phẩm không tồn tại.');
            }
    
            // Kiểm tra số lượng còn lại trong kho
            if ($request->has('increment')) {
                if ($cartItem->quantity + 1 > $product->quantity) {
                    return redirect()->route('cart')->with('error', 'Không thể tăng số lượng vì sản phẩm chỉ còn ' . $product->quantity . ' trong kho.');
                }
                $cartItem->quantity += 1;
            } elseif ($request->has('decrement')) {
                $cartItem->quantity -= 1;
    
                // Nếu số lượng là 0, xóa sản phẩm khỏi giỏ hàng
                if ($cartItem->quantity < 1) {
                    $cartItem->delete();
                    return redirect()->route('cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
                }
            } else {
                if ($request->quantity > $product->quantity) {
                    return redirect()->route('cart')->with('error', 'Số lượng yêu cầu vượt quá số lượng trong kho.');
                }
                $cartItem->quantity = $request->quantity;
            }
    
            $cartItem->save();
    
            return redirect()->route('cart')->with('success', 'Số lượng sản phẩm đã được cập nhật!');
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để cập nhật giỏ hàng.');
        }
    }
    
    
    public function removeFromCart($itemId)
    {
        if (Auth::check()) {
            $cartItem = CartItem::findOrFail($itemId);
            $cartItem->delete();

            return redirect()->route('cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xóa sản phẩm khỏi giỏ hàng.');
        }
    }
}

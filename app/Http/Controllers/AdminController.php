<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category_blog;
use App\Models\Category_products;
use App\Models\Category_service;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Package;
use App\Models\Post;
use App\Models\Products;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function admin()
    {
        $totalProducts = Products::count(); // Tổng số sản phẩm
        $totalBookings = Booking::count(); // Tổng số đặt lịch
        $totalServices = Service::count(); // Tổng số dịch vụ
        $totalPackages = Package::count(); // Tổng số gói dịch vụ
        $totalOrders = Order::count(); // Tổng số đơn hàng
        $totalUsers = User::count(); // Tổng số người dùng
        $totalBlogs = Post::count(); // Tổng số bài viết
        $totalRevenueOrders = Order::sum('total'); // Doanh thu tổng từ orders
    
        // Doanh thu tổng từ bookings
        $totalRevenueBookings = DB::table('booking')
            ->join('packages', 'booking.package_id', '=', 'packages.id') // Join để lấy giá từ packages
            ->sum('packages.price');
    
        // Tổng doanh thu (orders + bookings)
        $totalRevenue = $totalRevenueOrders + $totalRevenueBookings;
    
        $orders = Order::orderBy('id', 'desc')->limit(3)->get();
        $bookings = Booking::with('user', 'service', 'package')->limit(3)->get();
        $latestServices = Service::orderBy('created_at', 'desc')->take(5)->get();
    
        // Doanh thu theo ngày từ orders
        $dailyRevenue = Order::select(
            DB::raw('DATE(created_at) as date'), // Lấy ngày
            DB::raw('SUM(total) as revenue') // Tổng doanh thu trong ngày
        )
            ->groupBy('date') // Gom nhóm theo ngày
            ->orderBy('date', 'desc') // Sắp xếp ngày mới nhất
            ->take(15)
            ->get();
    
        // Doanh thu theo ngày từ bookings
        $dailyBooking = DB::table('booking')
            ->join('packages', 'booking.package_id', '=', 'packages.id')
            ->select(
                DB::raw('DATE(booking.created_at) as date'),
                DB::raw('SUM(packages.price) as revenue')
            )
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
    
        return view('admin.admin', compact(
            'bookings',
            'orders',
            'totalProducts',
            'totalBookings',
            'totalServices',
            'totalPackages',
            'totalUsers',
            'totalOrders',
            'totalRevenue', // Gửi tổng doanh thu (orders + bookings)
            'totalBlogs',
            'latestServices',
            'dailyRevenue',
            'dailyBooking'
        ));
    }
    

    //     ||       ============================================================
//     ||                              PRODUCT
//     \/       ============================================================
    public function productadmin()
    {
        $newestProducts = Products::orderBy('id', 'desc')->paginate(6);
        $category_products = Category_products::orderBy('name', 'asc')->get(); // Lấy danh sách các danh mục
        return view('admin.productadmin', compact('newestProducts', 'category_products'));
    }
    public function search_admin(Request $request)
    {
        $query = $request->input('query');
        $products = Products::where('name', 'LIKE', "%$query%")->paginate(6);
        return view('admin.search_admin', compact('products', 'query'));
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:category_products,id',
            'quantity' => 'required|integer', // Validate cột quantity
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048', // Kiểm tra hình ảnh
        ]);

        // Lưu sản phẩm vào cơ sở dữ liệu
        $data = $request->only(['name', 'description', 'price', 'category_id', 'quantity']); // Thêm quantity vào dữ liệu

        // Xử lý lưu hình ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $imageName);
            $data['image'] = $imageName;
        }

        Products::create($data);

        return redirect()->route('productadmin')->with('success', 'Sản phẩm đã được thêm thành công.');
    }


    public function delete_product($id)
    {
        $product = Products::find($id);

        if ($product) {
            // Xóa tệp hình ảnh nếu nó tồn tại
            if ($product->image && file_exists(public_path('upload/' . $product->image))) {
                unlink(public_path('upload/' . $product->image));
            }

            // Xóa bản ghi sản phẩm khỏi cơ sở dữ liệu
            $product->delete();

            return redirect()->route('productadmin')->with('success', 'Sản phẩm đã được xóa thành công.');
        } else {
            return redirect()->route('productadmin')->with('error', 'Không tìm thấy sản phẩm.');
        }
    }

    public function edit_product($id)
    {
        $product = Products::find($id);
        if ($product) {
            $category_products = Category_products::orderBy('id', 'asc')->get(); // Lấy danh sách các danh mục
            return view('admin.updateproduct', compact('product', 'category_products'));
        } else {
            return redirect()->route('productadmin')->with('error', 'Không tìm thấy sản phẩm.');
        }
    }

    public function update_product(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:category_products,id',
            'quantity' => 'required|numeric', // Validate cột quantity
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048', // Kiểm tra hình ảnh
        ]);

        $product = Products::find($id);
        if ($product) {
            $data = $request->only(['name', 'description', 'price', 'category_id', 'quantity']);

            if ($request->hasFile('image')) {
                // Xóa ảnh cũ nếu tồn tại
                if ($product->image && file_exists(public_path('upload/' . $product->image))) {
                    unlink(public_path('upload/' . $product->image));
                }

                // Lưu ảnh mới
                $image = $request->file('image');
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('upload'), $imageName);
                $data['image'] = $imageName;
            }

            $product->update($data);

            return redirect()->route('productadmin')->with('success', 'Sản phẩm đã được cập nhật thành công.');
        } else {
            return redirect()->route('productadmin')->with('error', 'Không tìm thấy sản phẩm.');
        }
    }

    //     ||       ============================================================
//     ||                              CATEGORY
//     \/       ============================================================

    public function categoryadmin()
    {
        $allCategories = Category_products::withCount('products')->orderBy('id', 'asc')->get();
        return view('admin.categoryadmin', compact('allCategories'));
    }
    public function add_category(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        // Lưu sản phẩm vào cơ sở dữ liệu
        $data = $request->only(['name']);

        Category_products::create($data);

        return redirect()->route('categoryadmin')->with('success', 'Danh mục thêm thành công.');
    }
    public function delete_category($id)
    {
        $allCategories = Category_products::find($id);

        if ($allCategories) {
            // Kiểm tra xem danh mục có chứa sản phẩm nào không
            if ($allCategories->products()->count() > 0) {
                return redirect()->route('categoryadmin')->with('error', 'Danh mục này vẫn còn sản phẩm, không thể xóa.');
            } else {
                $allCategories->delete();
                return redirect()->route('categoryadmin')->with('success', 'Danh mục đã được xóa thành công.');
            }
        } else {
            return redirect()->route('categoryadmin')->with('error', 'Không tìm thấy danh mục.');
        }
    }

    public function edit_category($id)
    {
        $allCategories = Category_products::find($id);

        if ($allCategories) {
            return view('admin.updatecategory', compact('allCategories'));
        } else {
            return redirect()->route('categoryadmin')->with('error', 'Không tìm thấy sản phẩm.');
        }
    }

    public function update_category(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $category = Category_products::find($id);
        if ($category) {
            $data = $request->only(['name', 'status']);

            $category->update($data);

            return redirect()->route('categoryadmin')->with('success', 'Danh mục đã được cập nhật thành công.');
        } else {
            return redirect()->route('categoryadmin')->with('error', 'Không tìm thấy danh mục.');
        }
    }

    // //     ||       ============================================================
// //     ||                              USER
// //     \/       ============================================================

    public function useradmin()
    {
        $allUser = User::orderBy('id', 'asc')->get();
        return view('admin.useradmin', compact('allUser'));
    }
    public function add_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        User::create([
            'name' => $request->name,
            'phone' => 0,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => 0,
            'role' => 1,
        ]);

        return redirect()->route('useradmin')->with('success', 'Người dùng thêm thành công.');
    }
    public function delete_user($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('useradmin')->with('error', 'Không tìm thấy người dùng.');
        }

        // Kiểm tra nếu người dùng hiện tại đang cố gắng tự xóa chính mình
        if (Auth::id() == $user->id) {
            return redirect()->route('useradmin')->with('error', 'Bạn không thể tự xóa tài khoản của chính mình.');
        }

        try {
            // Kiểm tra sự tồn tại của giỏ hàng
            if ($user->cart) {
                // Xóa tất cả các mục trong giỏ hàng của người dùng
                foreach ($user->cart->items as $item) {
                    $item->delete();
                }
                // Xóa giỏ hàng của người dùng
                $user->cart()->delete();
            }

            // Xóa người dùng
            $user->delete();

            return redirect()->route('useradmin')->with('success', 'Người dùng đã được xóa thành công.');
        } catch (\Exception $e) {
            return redirect()->route('useradmin')->with('error', 'Đã xảy ra lỗi khi xóa người dùng: ' . $e->getMessage());
        }
    }
    public function edit_user($id)
    {
        $user = User::find($id);

        if ($user) {
            return view('admin.updateuser', compact('user'));
        } else {
            return redirect()->route('useradmin')->with('error', 'Không tìm thấy người dùng.');
        }
    }

    public function update_user(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|integer|in:0,1',

        ]);

        $user = User::find($id);
        if ($user) {
            $data = $request->only(['name', 'role']);

            $user->update($data);

            return redirect()->route('useradmin')->with('success', 'Người dùng đã được cập nhật thành công.');
        } else {
            return redirect()->route('useradmin')->with('error', 'Không tìm thấy người dùng.');
        }
    }


    // //     ||       ============================================================
// //     ||                              ORDER
// //     \/       ============================================================

    public function order()
    {

        $orders = Order::orderBy('id', 'desc')->paginate(6);

        $statuses = [
            1 => 'Chờ xác nhận',
            2 => 'Đang chuẩn bị hàng',
            3 => 'Đang được giao',
            4 => 'Đơn hàng đã hoàn thành',
        ];

        return view('admin.order', compact('orders', 'statuses'));
    }
    public function search_order(Request $request)
    {
        $query = $request->input('query');
        $order = Order::with('items')->where('madh', 'LIKE', "%$query%")->paginate(10);

        $statuses = [
            1 => 'Chờ xác nhận',
            2 => 'Đang chuẩn bị hàng',
            3 => 'Đang được giao',
            4 => 'Đơn hàng đã hoàn thành',
        ];
        return view('admin.search_order', compact('order', 'query', 'statuses'));
    }


    public function updateStatus(Request $request, $orderId)
    {

        $order = Order::findOrFail($orderId);


        if ($order->status < 4) {
            $order->status++;
            $order->save();
        }


        $orders = Order::orderBy('id', 'desc')->paginate(10);
        $statuses = [
            1 => 'Chờ xác nhận',
            2 => 'Đang chuẩn bị hàng',
            3 => 'Đang được giao',
            4 => 'Đơn hàng đã hoàn thành',
        ];


        return view('admin.order', compact('orders', 'statuses'))->with('success', 'Trạng thái đơn hàng đã được cập nhật!');
    }

    // //     ||       ============================================================
// //     ||                              SERVICE
// //     \/       ============================================================
    // Hiển thị danh sách dịch vụ
    public function index()
{
    $allService = Service::orderBy('id', 'desc')->paginate(4); // Lấy dịch vụ không có danh mục
    return view('admin.service_admin', compact('allService'));
}


    // Thêm dịch vụ mới
    public function addService(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);
    
        $data = $request->only(['service_name', 'description', 'price']);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $imageName);
            $data['image'] = $imageName;
        }
        Service::create($data);
    
        return redirect()->route('service_admin')->with('success', 'Dịch vụ thêm thành công.');
    }
    

    // Xóa dịch vụ
    public function deleteService($id)
{
    $service = Service::find($id);

    if ($service) {
        // Xóa tệp hình ảnh nếu nó tồn tại
        if ($service->image && file_exists(public_path('upload/' . $service->image))) {
            unlink(public_path('upload/' . $service->image));
        }

        // Xóa bản ghi dịch vụ khỏi cơ sở dữ liệu
        $service->delete();

        return redirect()->route('service_admin')->with('success', 'Dịch vụ đã được xóa thành công.');
    } else {
        return redirect()->route('service_admin')->with('error', 'Không tìm thấy dịch vụ.');
    }
}


    // Chỉnh sửa dịch vụ
    public function editService($id)
    {
        $service = Service::find($id);
    
        if ($service) {
            return view('admin.update_service', compact('service'));
        } else {
            return redirect()->route('service_admin')->with('error', 'Không tìm thấy dịch vụ.');
        }
    }
    


    // Cập nhật dịch vụ
    public function updateService(Request $request, $id)
{
    $service = Service::find($id);

    if (!$service) {
        return redirect()->route('service_admin')->with('error', 'Không tìm thấy dịch vụ.');
    }

    $request->validate([
        'service_name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
    ]);

    $service->service_name = $request->input('service_name');
    $service->description = $request->input('description');
    $service->price = $request->input('price');

    if ($request->hasFile('image')) {
        // Xóa ảnh cũ nếu có
        if ($service->image && file_exists(public_path('upload/' . $service->image))) {
            unlink(public_path('upload/' . $service->image));
        }

        $image = $request->file('image');
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        $image->move(public_path('upload'), $imageName);
        $service->image = $imageName;
    }

    $service->save();

    return redirect()->route('service_admin')->with('success', 'Dịch vụ đã được cập nhật thành công.');
}

    // //     ||       ============================================================
// //     ||                              SERVICE
// //     \/       ============================================================

    public function packageadmin()
    {
        $services = Service::all(); // Lấy tất cả dịch vụ
        $allPackages = Package::with('service')->get(); // Lấy tất cả các gói dịch vụ cùng với dịch vụ liên quan
        return view('admin.packageadmin', compact('allPackages', 'services'));
    }

    public function add_package(Request $request)
    {

        $request->validate([
            'service_id' => 'required|exists:service,id', // Kiểm tra service_id phải tồn tại
            'package_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Lưu gói dịch vụ vào cơ sở dữ liệu
        $data = $request->only(['service_id', 'package_name', 'description', 'price']);

        Package::create($data);

        return redirect()->route('packageadmin')->with('success', 'Gói dịch vụ đã được thêm thành công.');
    }

    public function delete_package($id)
    {
        $package = Package::find($id);

        if ($package) {
            $package->delete();
            return redirect()->route('packageadmin')->with('success', 'Gói dịch vụ đã được xóa thành công.');
        } else {
            return redirect()->route('packageadmin')->with('error', 'Không tìm thấy gói dịch vụ.');
        }
    }

    public function edit_package($id)
    {
        $package = Package::find($id);

        if ($package) {
            $services = Service::all(); // Lấy danh sách tất cả dịch vụ để hiển thị trong form chỉnh sửa
            return view('admin.update_package', compact('package', 'services'));
        } else {
            return redirect()->route('packageadmin')->with('error', 'Không tìm thấy gói dịch vụ.');
        }
    }

    public function update_package(Request $request, $id)
    {
        $request->validate([
            'service_id' => 'required|exists:service,id', // Kiểm tra service_id phải tồn tại
            'package_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $package = Package::find($id);
        if ($package) {
            $data = $request->only(['service_id', 'package_name', 'description', 'price']);
            $package->update($data);

            return redirect()->route('packageadmin')->with('success', 'Gói dịch vụ đã được cập nhật thành công.');
        } else {
            return redirect()->route('packageadmin')->with('error', 'Không tìm thấy gói dịch vụ.');
        }
    }

    ////////////// ADMIN CUA BLOGS //////////////

    public function blogadmin()
    {
        $categories = Category_blog::all(); // Lấy tất cả các danh mục
        $allBlogs = Post::with('category')->get(); // Lấy tất cả các bài viết cùng với danh mục liên quan
        return view('admin.blogadmin', compact('allBlogs', 'categories'));
    }

    public function add_blog(Request $request)
    {
        $request->validate([
            'category_blogs_id' => 'required|exists:category_blogs,id', // Kiểm tra category_id phải tồn tại
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048', 
        ]);

        // Lưu bài viết vào cơ sở dữ liệu
        $data = $request->only(['category_blogs_id', 'title', 'content']);

        // Xử lý lưu hình ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $imageName);
            $data['image'] = $imageName;
        }

        Post::create($data);

        return redirect()->route('blogadmin')->with('success', 'Bài viết đã được thêm thành công.');
    }

    public function delete_blog($id)
    {
        $blog = Post::find($id);

        if ($blog) {
            if ($blog->image && file_exists(public_path('upload/' . $blog->image))) {
                unlink(public_path('upload/' . $blog->image)); // Xóa ảnh nếu tồn tại
            }

            $blog->delete();
            return redirect()->route('blogadmin')->with('success', 'Bài viết đã được xóa thành công.');
        } else {
            return redirect()->route('blogadmin')->with('error', 'Không tìm thấy bài viết.');
        }
    }

    public function edit_blog($id)
    {
        $blog = Post::find($id);

        if ($blog) {
            $categories = Category_blog::all(); // Lấy tất cả danh mục để hiển thị trong form chỉnh sửa
            return view('admin.update_blog', compact('blog', 'categories'));
        } else {
            return redirect()->route('blogadmin')->with('error', 'Không tìm thấy bài viết.');
        }
    }

    public function update_blog(Request $request, $id)
    {
        $request->validate([
            'category_blogs_id' => 'required|exists:category_blogs,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        $blog = Post::find($id);
        if ($blog) {
            $data = $request->only(['category_blogs_id', 'title', 'content']);

            // Xử lý cập nhật hình ảnh
            if ($request->hasFile('image')) {
                if ($blog->image && file_exists(public_path('upload/' . $blog->image))) {
                    unlink(public_path('upload/' . $blog->image)); // Xóa ảnh cũ
                }

                $image = $request->file('image');
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('upload'), $imageName);
                $data['image'] = $imageName;
            }

            // Cập nhật bài viết
            $blog->update($data);

            return redirect()->route('blogadmin')->with('success', 'Bài viết đã được cập nhật thành công.');
        } else {
            return redirect()->route('blogadmin')->with('error', 'Không tìm thấy bài viết.');
        }
    }

    public function loginForm()
    {
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 1) { // Kiểm tra role admin
                return redirect()->route('admin');
            }
            Auth::logout();
        }

        return back()->with('error', 'Email hoặc mật khẩu không chính xác');
    }



}

<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingAdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// ========================== HOME =============================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/products', [ProductsController::class, 'products'])->name('products');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/show_blog/{id}', [BlogController::class, 'show_blog'])->name('show_blog');

Route::get('/products/{id}', [ProductsController::class, 'detail'])->name('detail');
Route::post('/product/{id}/comment', [ProductsController::class, 'comment'])->name('product.comment');
Route::get('/search', [ProductsController::class, 'search'])->name('search');

//cart
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

// comment
    Route::post('/product/comment/post', [ProductsController::class, 'comment'])->name('product.comment.post');
    // xử lý yêu cầu post, thêm bình luận vào sp có id tương ứng. Khi gửi bình luận sẽ gọi phương thức cmt trong productcontroller
    // người dùng bình luận qua form, sẽ xử lý và chuyển tiếp tới phương thức cmt trong productcontroller
    // controller xác thực và lưu bình luận vào bảng cmt
    Route::post('/product/comment/delete', [ProductsController::class, 'deleteComment'])->name('product.comment.delete');
    // Xử lý yêu cầu xóa bình luận từ phía người dùng.
});

Route::get('/product/comment/{id}', [ProductsController::class, 'getComment'])->name('product.getComment');
// Lấy danh sách bình luận của sản phẩm để hiển thị


//checkout
Route::get('/checkout', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('show');
Route::get('/showbill', [OrderController::class, 'showbill'])->name('showbill');

//thanh toán onl
Route::post('/checkout/vnpay', [CheckoutController::class, 'vnpay_payment'])->name('vnpay_payment');
Route::get('/checkout/vnpay_return', [CheckoutController::class, 'vnpay_return'])->name('checkout.vnpay_return');



//booking

// Route::get('/booking', [ServiceController::class, 'index'])->name('booking.index');
// Route::post('/select-package', [ServiceController::class, 'selectPackage'])->name('select.package');

//user
Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserController::class, 'register']);
Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);
// quen mk
Route::get('/forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [UserController::class, 'sendResetLink'])->name('password.email');
// Route cho việc đặt lại mật khẩu
Route::get('password/reset/{token}', [UserController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('password/reset', [UserController::class, 'resetPassword'])->name('password.update');

Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/profile/edit/{id}', [UserController::class, 'edit_profile'])->name('edit_profile');
Route::put('/profile/update/{id}', [UserController::class, 'update_profile'])->name('update_profile');
// Route::get('/forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('password.request');
// Route::post('/forgot-password', [UserController::class, 'sendResetLink'])->name('password.email');


Route::get('/package', [PackageController::class, 'package'])->name('package');
Route::get('/booking/index', [BookingController::class, 'index'])->name('booking.index');
Route::get('/get-packages/{serviceId}', [PackageController::class, 'getPackagesByService']);

Route::get('/booking/{package_id}', [BookingController::class, 'showBookingForm'])->name('booking.form');
Route::post('/book-appointment', [BookingController::class, 'booking'])->name('book.appointment');

Route::get('/showbooking', [BookingController::class, 'showbooking'])->name('showbooking');
Route::get('/bookings/{id}', [OrderController::class, 'bookings'])->name('bookingdetail');


// Google Login Routes
Route::get('login/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);


// Admin Login Routes
Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login.submit');
Route::post('/admin/register', [App\Http\Controllers\Admin\AuthController::class, 'register'])->name('admin.register.submit');

// ========================== ADMIN =============================
Route::middleware([AdminMiddleware::class])->group(function () {



Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/search_admin', [AdminController::class, 'search_admin'])->name('search_admin');

//products
Route::get('/productadmin', [AdminController::class, 'productadmin'])->name('productadmin');
Route::post('/admin/products', [AdminController::class, 'add_product'])->name('add_product');
Route::delete('productadmin/{id}', [AdminController::class, 'delete_product'])->name('delete_product');
Route::get('/admin/products/{id}/edit', [AdminController::class, 'edit_product'])->name('edit_product');
Route::put('/admin/products/{id}', [AdminController::class, 'update_product'])->name('update_product');

// category
Route::get('/categoryadmin', [AdminController::class, 'categoryadmin'])->name('categoryadmin');
Route::post('/admin/category', [AdminController::class, 'add_category'])->name('add_category');
Route::delete('categoryadmin/{id}', [AdminController::class, 'delete_category'])->name('delete_category');
Route::get('/admin/category/{id}/edit', [AdminController::class, 'edit_category'])->name('edit_category');
Route::put('/admin/category/{id}', [AdminController::class, 'update_category'])->name('update_category');

//user
Route::get('/useradmin', [AdminController::class, 'useradmin'])->name('useradmin');
Route::post('/admin/useradmin', [AdminController::class, 'add_user'])->name('add_user');
Route::delete('useradmin/{id}', [AdminController::class, 'delete_user'])->name('delete_user');
Route::get('/admin/useradmin/{id}/edit', [AdminController::class, 'edit_user'])->name('edit_user');
Route::put('/admin/useradmin/{id}', [AdminController::class, 'update_user'])->name('update_user');

// category_sv
Route::get('/category_sv_admin', [AdminController::class, 'category_sv_admin'])->name('category_sv_admin');
Route::post('/admin/category_sv', [AdminController::class, 'add_category_sv'])->name('add_category_sv');
Route::delete('category_sv_admin/{id}', [AdminController::class, 'delete_category_sv'])->name('delete_category_sv');
Route::get('/admin/category_sv/{id}/edit', [AdminController::class, 'edit_category_sv'])->name('edit_category_sv');
Route::put('/admin/category_sv/{id}', [AdminController::class, 'update_category_sv'])->name('update_category_sv');

//admin của service
Route::get('/service_admin', [AdminController::class, 'index'])->name('service_admin'); // Hiển thị danh sách service
Route::post('/admin/service', [AdminController::class, 'addService'])->name('addService'); // Thêm mới service
Route::delete('/service_admin/{id}', [AdminController::class, 'deleteService'])->name('deleteService'); // Xóa service
Route::get('/admin/service/{id}/edit', [AdminController::class, 'editService'])->name('editService'); // Sửa service (hiển thị form)
Route::put('/admin/service/{id}', [AdminController::class, 'updateService'])->name('updateService'); // Cập nhật service

// admin của package
Route::get('/packageadmin', [AdminController::class, 'packageadmin'])->name('packageadmin');
Route::post('/admin/packages/add', [AdminController::class, 'add_package'])->name('add_package');
Route::delete('/admin/packages/{id}', [AdminController::class, 'delete_package'])->name('delete_package');
Route::get('/admin/packages/edit/{id}', [AdminController::class, 'edit_package'])->name('edit_package');
Route::put('/admin/packages/update/{id}', [AdminController::class, 'update_package'])->name('update_package');

//order
Route::get('/admin/order', [AdminController::class, 'order'])->name('order');
Route::get('/search_order', [AdminController::class, 'search_order'])->name('search_order');
Route::patch('/admin/order/{orderId}/status', [AdminController::class, 'updateStatus'])->name('admin.order.updateStatus');

//booking admin
Route::get('/admin/bookings', [BookingAdminController::class, 'bookings'])->name('admin.bookings');
Route::patch('/admin/bookings/{id}', [BookingAdminController::class, 'updateBooking'])->name('admin.updateBooking');
Route::delete('/admin/bookings/{id}', [BookingAdminController::class, 'deleteBooking'])->name('admin.deleteBooking');

//blogs admin
Route::get('/blogadmin', [AdminController::class, 'blogadmin'])->name('blogadmin'); // Danh sách bài viết
Route::post('/admin/blogs/add', [AdminController::class, 'add_blog'])->name('add_blog'); // Thêm bài viết
Route::delete('/admin/blogs/{id}', [AdminController::class, 'delete_blog'])->name('delete_blog'); // Xóa bài viết
Route::get('/admin/blogs/edit/{id}', [AdminController::class, 'edit_blog'])->name('edit_blog'); // Sửa bài viết
Route::put('/admin/blogs/update/{id}', [AdminController::class, 'update_blog'])->name('update_blog'); // Cập nhật bài viết

// comment admin
Route::delete('/admin/comments/{id}', [CommentController::class, 'deleteComment'])->name('admin.comments.delete');
Route::get('/admin/comments', [CommentController::class, 'comments'])->name('admin.comments');

});

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'default.jpg', // Gán giá trị mặc định
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => 'default.jpg',
            'role' => 0, // Đăng ký bình thường thì role là 0
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công.');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
    
            if ($user->role == 1) {
                return redirect()->route('admin')->with('success', 'Đăng nhập thành công.');
            }
    
            $redirect = $request->redirect;
            if ($redirect) {
                return redirect()->route('detail', ['id' => $redirect])->with('success', 'Đăng nhập thành công.');
            }
            return redirect()->route('home')->with('success', 'Đăng nhập thành công.');
        }
    
        return redirect()->back()->with('error', 'Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin.');
    }
    

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Đăng xuất thành công.');
    }

    // Hiển thị form quên mật khẩu
    public function showForgotPasswordForm()
    {
        return view('forgot_password');
    }

    // Xử lý gửi link đặt lại mật khẩu
    public function sendResetLink(Request $request)
    {
        \Log::info('Request Data: ', $request->all()); // ghi log thông tin yêu cầu vào file log

        $request->validate(['email' => 'required|email']); // xác thực email

        $status = Password::sendResetLink($request->only('email'));// gửi link đặt lại email

        return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __('We have emailed your password reset link!')) // thành công thì thông báo thành xông
        : back()->withErrors(['email' => __('We can\'t find a user with that email address.')]);
    }

    public function showResetPasswordForm()
    {
        return view('reset_password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required', // xác thực yêu cầu đặt lại mật khẩu
            'email' => 'required|email', // đúng định dạng
            'password' => 'required|min:8|confirmed', // ít nhất 8 chữ
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password), // mã hóa và cập nhật mật khẩu mới
                ])->setRememberToken(\Str::random(60)); // tạo token nhớ đăng nhập

                $user->save(); // lưu thay đổi và database
            }
        );

        return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status)) // thành công thì hướng đến đn với thông báo thành công
        : back()->withErrors(['email' => [__($status)]]);
    }

    public function profile(Request $request)
    {
        return view('profile');
    }

    public function edit_profile($id)
    {
        $profile = User::find($id);

        if ($profile) {
            return view('updateprofile', compact('profile'));
        }

        return redirect()->route('profile')->with('error', 'Không tìm thấy.');
    }

    public function update_profile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Không bắt buộc
            'password' => 'nullable|string|min:8|confirmed', // Không bắt buộc
        ]);
    
        $profile = User::find($id);
    
        if (!$profile) {
            return redirect()->route('profile')->with('error', 'Người dùng không tồn tại.');
        }
    
        // Chuẩn bị dữ liệu để cập nhật
        $data = $request->only(['name', 'phone']);
    
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password); // Mã hóa mật khẩu
        }
    
        // Xử lý upload ảnh mới nếu có
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($profile->image && file_exists(public_path('upload/' . $profile->image))) {
                unlink(public_path('upload/' . $profile->image));
            }
    
            // Lưu ảnh mới
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $imageName);
            $data['image'] = $imageName;
        }
    
        // Cập nhật hồ sơ
        $profile->update($data);
    
        return redirect()->route('profile')->with('success', 'Cập nhật thành công.');
    }
    
}

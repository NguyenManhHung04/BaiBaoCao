<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function getlogin()
    {
        return view('Login');
    }

    public function dologin(Request $request)
    {
        $credentials = [
            'password' => $request->password,
            'status' => 1
        ];
        //User
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credentials["email"] = $request->username;
        } else {
            $credentials["username"] = $request->username;
        }
        //Đăng nhập
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('website.getlogin')->with("message", "Đăng nhập thất bại, đăng nhập lại!");
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function getregister()
    {
        return view("Register");
    }
    public function doregister(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'required|email|unique:nmh_user,email', // Cập nhật ở đây
        'gender' => 'required|in:male,female',
        'username' => 'required|string|unique:nmh_user,username|max:255', // Cập nhật ở đây
        'password' => 'required|string|min:6|confirmed'
    ]);

    // Tạo người dùng mới
    $user = new User(); // Bạn cần đảm bảo User model đang tham chiếu đến bảng nmh_user
    $user->name = $validated['name'];
    $user->phone = $validated['phone'];
    $user->email = $validated['email'];
    $user->gender = $validated['gender'];
    $user->username = $validated['username'];
    $user->password = Hash::make($validated['password']); // mã hóa mật khẩu
    $user->roles = 'customer';
    $user->status = 1;
    $user->created_at = Carbon::now();
    $user->created_by = Auth::id() ?? 1;
    $user->save();

    // Chuyển hướng đến trang đăng nhập kèm thông báo thành công
    return redirect()->route('website.getlogin')->with('success', 'Registration successful! Please log in.');

}


    public function getcontact()
    {
        return view("Contact");
    }
    public function docontact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->created_at = date('Y-m-d H:i:s');

        $contact->save();
        return redirect()->route('website.getcontact');
    }
}

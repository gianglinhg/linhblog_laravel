<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;
use Session;

class AuthController extends Controller
{
    public function index(){
        $title = 'Trang chủ';
        return view('global.auth.dashboard',compact('title'));
    }
    public function register(){
        $data['title'] = 'Đăng kí';
        return view('global.auth.register', $data);
    }
    public function post_register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required | unique:users | email' ,
            'password' => 'required',
            'confirm-password' => 'required | same:password',
        ],[
            'name.required' => 'Tên buộc phải nhập',
            'email.required' => 'Email buộc phải nhập',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Không đúng định dạng email',
            'password.required' => 'Mật khẩu buộc phải nhập',
            'confirm-password.required' => 'Nhập lại mật khẩu buộc phải nhập',
            'confirm-password.same' => 'Nhập lại mật khẩu không khớp'
        ]);
        // $user = new User([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ]);
        // $user->save();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return to_route('auth.login')->with('success', 'Đăng ký thành công, hãy đăng nhập');
    }
    public function login(){
        return view('global.auth.login',[
            'title' => 'Đăng nhập'
        ]);
    }
    public function post_login(Request $request){
        $request->validate([
            'email'=>'required|max:255|email',
            'password'=>'required'
        ],
        [
            'email.required' => 'Email bắt buộc nhập',
            'password.required' => 'Mật khẩu bắt buộc nhập'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if(Auth::attempt(['email' => $email ,'password' => $password],
            $request->input('remember')
        )){
            // return to_route('admin.');
            return 123;
        };
    Session::flash('error', 'Email hoặc mật khẩu không đúng');
    return redirect()-> back();
    }
    public function password(){
        $data['title'] = 'Đổi mật khẩu';
        return view('global.auth.password', $data);
    }
    public function post_password(Request $request){
        $request->validate([
            'old_password' => 'required | current_password' ,
            'new_password' => 'required',
            'confirm-new_password' => 'same:new_password'
        ],[
            'old_password.current_password' => 'Mật khẩu cũ không đúng',
            'old_password.required' => 'Mật khẩu cũ buộc phải nhập',
            'new_password.required' => 'Mật khẩu mới buộc phải nhập',
            'confirm-new_password.same' => 'Mật khẩu mới không khớp'
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Mật khẩu của bạn đã thay đổi');
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()-> route('auth.login');
        // return back();
    }
}

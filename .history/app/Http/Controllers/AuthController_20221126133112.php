<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class AuthController extends Controller
{
    public function register(){
        $data['title'] = 'Đăng kí thành viên';
        return view('user.register', $data);
    }
    public function post_register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required | unique:tb_user | email' ,
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
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->save();
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ]);
        return to_route('login')->with('success', 'Đăng ký thành công, hãy đăng nhập');
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
    public function logout() {
        Auth::logout();
        return redirect()-> route('login') ;
    }
}

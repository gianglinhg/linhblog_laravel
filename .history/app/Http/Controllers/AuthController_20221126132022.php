<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view('admin.users.login',[
            'title' => 'Đăng nhập quản trị'
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
            return to_route('admin.');
        };
    Session::flash('error', 'Email hoặc mật khẩu không đúng');
    return redirect()-> back();
    }
    public function logout() {
        Auth::logout();
        return redirect()-> route('login') ;
    }
}

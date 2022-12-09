<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Comment;
use DB;
use Session;
use Str;

class AuthController extends Controller
{

    public function index(){
        return to_route('auth.dashboard');
    }
    public function dashboard(){
        // if(Auth::user()->id_group == 1) $mainTitle ='Quản trị viên';
        $auth = Auth::user()->name;
        $mainTitle = 'Tài khoản';
        $title = $auth;
        $comment = Comment::join('tin','tin.id','id_tin')
        ->select('comment.*','tin.tieuDe')
        ->where('id_user',Auth::id())
        ->get();
        // dd($comment);
        return view('global.auth.dashboard',compact('title','mainTitle','comment'));
    }
    public function register(){
        if(Auth::check() && Auth::user()->id_group==1) return to_route('admin.');
        else if(Auth::check()) return to_route('auth.dashboard');
        $data['title'] = 'Đăng kí';
        return view('global.auth.register', $data);
    }
    public function post_register(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => ['required' , 'unique:users' ,' email'] ,
            'password' => 'required',
            'confirm-password' => 'required | same:password',
            'avatar' =>[
                'required',
                'image',
                'mimes:jpeg,png',
                'mimetypes:image/jpeg,image/png',
                'max:3072',
            ],
        ],[
            'name.required' => 'Tên buộc phải nhập',
            'email.required' => 'Email buộc phải nhập',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Không đúng định dạng email',
            'password.required' => 'Mật khẩu buộc phải nhập',
            'confirm-password.required' => 'Nhập lại mật khẩu buộc phải nhập',
            'confirm-password.same' => 'Nhập lại mật khẩu không khớp',
            'avatar.required' => 'Bạn cần có avatar',
            'avatar.image' => 'Bạn chỉ được tải hình ảnh',
            'avatar.mimes' => 'Hình ảnh dạng jpeg và png',
            'avatar.max' => 'Ảnh tối đa được nặng 3MB',
        ]);
        // if($request->has('avatar')){
            $file = $request->file('avatar');
            $name = $request->name;
            $slug = Str::slug($name);
            $extension = $file->getClientOriginalExtension();
            $nameAvt = $slug . '.' . $extension;
            $avatar = 'upload/images/avatar/' . $nameAvt;
            $path = $file->move(public_path('template/upload/images/avatar/'),$nameAvt);
        // }
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $avatar,
            'password' => Hash::make($request->password)
        ]);
        $user->save();
        // dd($user->remember_token);
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ]);
        return to_route('auth.login')->with('success', 'Đăng ký thành công, hãy đăng nhập');
    }
    public function login(){
        // if(Auth::check() && Auth::user()->id_group==1) return to_route('admin.');
        // else if(Auth::check()) return to_route('auth.dashboard');
        if(Auth::check()) return back()->with('success','Bạn đã đăng nhập')
        return view('global.auth.login',['title' => 'Đăng nhập']);
    }
    public function post_login(Request $request){
        // dd(Auth::attempt(['id_group' => '1']));
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
        if(Auth::attempt(['email'=>$email, 'password'=>$password,'id_group'=>1])){
            return to_route('admin.');
        }else if(Auth::attempt(['email'=>$email, 'password'=>$password,'id_group'=>2])){
            return to_route('auth.dashboard');
        }
        return back()->with('error', 'Email hoặc mật khẩu không đúng');
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
        return to_route('auth.dashboard')->with('success', 'Mật khẩu của bạn đã thay đổi');
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
        // return back();
    }
}

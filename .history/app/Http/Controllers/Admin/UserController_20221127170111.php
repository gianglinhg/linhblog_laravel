<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(){
        $mainTitle = 'Tài khoản';
        $title = 'Danh sách tài khoản';
        $data = DB::table('users')->join('role','id_group','=','role.id')->get();
        return view('admin.users.list',compact('mainTitle','title','data'));
    }
    public function delete($id){
        // dd(!empty($id));
        if(!empty($id)){
            $deleteUsers = DB::table('users')->where('id',$id)->first();
            dd($deleteUsers);
            return to_route('users.')->with('success', 'Xóa thành viên thành công');
        }
        return to_route('users.')->with('error', 'Thành viên không tồn tại');

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserController extends Controller
{
    public function index(){
        $mainTitle = 'Tài khoản';
        $title = 'Danh sách tài khoản';
        $data = DB::table('users')
        // ->join('role','id_group','=','role.id')
        ->where('id_group',2)
        ->get();
        return view('admin.users.list',compact('mainTitle','title','data'));
    }
    public function delete($id){
        $deleteUsers = User::find($id);
        dd($deleteUsers);
        if(!empty($id)){
            // dd($id);
            return to_route('users.')->with('success', 'Xóa thành viên thành công');
        }
        return to_route('users.')->with('error', 'Thành viên không tồn tại');

    }
}
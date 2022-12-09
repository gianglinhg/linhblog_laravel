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
        if(!empty($id)){
            $userDetail = User::find($id);
            if(!empty($userDetail)){
                $userDelete = $userDetail->delete();
                if($userDelete)
                return to_route('users.')->with('success', 'Xóa thành viên thành công');
        }else $errorMsg = 'Thành viên không tồn tại';
    }else $errorMsg = 'Thành viên không tồn tại';
    return to_route('users.')->with('error', $errorMsg);
    }
}

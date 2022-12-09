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
        $data = DB::table('users_detail')->get();
        return view('admin.users.list',compact('mainTitle','title','data'));
    }
}

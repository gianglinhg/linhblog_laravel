<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $mainTitle = 'Tài khoản';
        $title = 'Danh sách tài khoản';
        return view('admin.users.list',compact('$mainTitle','title'));
    }
}

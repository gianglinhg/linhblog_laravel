<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function create(){
        $title = "Thêm danh mục";
        return view('admin.menu.add',compact('title'));
    }
    public function list(){
        $title = "Danh sách danh mục";
        return view('admin.menu.list',compact('title'));
    }

}

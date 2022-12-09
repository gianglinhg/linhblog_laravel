<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\Models\Admin\LoaiTin;

class MenuController extends Controller
{
    public function create(){
        $title = "Thêm danh mục";
        return view('admin.menu.add',compact('title'));
    }
    public function list(){
        $title = "Danh sách danh mục";
        // $query = DB::table('loaitin')->get();
        $query = LoaiTin::all();
        return view('admin.menu.list',compact('title','query'));
    }
    // public function add(){
    //     $title = "Thêm loại tin";

    //     return view('admin.menu.add', compact('title'));
    // }

}

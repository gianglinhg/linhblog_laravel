<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $title = 'Quản trị admin';
        return view('admin.home',compact('title'));
    }
    public function search(){
        $keyword = $_GET['keyword'];
        // dd($keyword);
        $tin
    }
}
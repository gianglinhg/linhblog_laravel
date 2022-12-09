<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $mainTitle = '';
        $title = 'Quản trị admin';
        return view('admin.home',compact('title'));
    }

}

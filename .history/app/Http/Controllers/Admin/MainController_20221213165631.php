<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request){
        $ip = $request->ip();
        $mainTitle = '#';
        $title = 'Quản trị admin';
        return view('admin.home',compact('title','mainTitle','ip'));
        // return to_route('admin.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request){
        $tintuc = DB::table('tin')->count();
        $loaitin = DB::table('loaitin')->count();
        $users = DB::table('users')
            ->where('id_group', 2)
            ->count();
        $ip = $request->ip();
        $mainTitle = '#';
        $title = 'Quản trị admin';
        return view('admin.home',compact('title','mainTitle','ip'));
        // return to_route('admin.');
    }
}

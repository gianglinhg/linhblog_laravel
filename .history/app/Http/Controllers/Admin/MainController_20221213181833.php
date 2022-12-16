<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Visits;

class MainController extends Controller
{
    public function index(Request $request){
        $tintucs = \DB::table('tin')->count();
        $loaitins = \DB::table('loaitin')->count();
        $users = \DB::table('users')
            ->where('id_group', 2)
            ->count();
        $mainTitle = '#';
        $title = 'Quản trị admin';
        $data = ['tintucs'=>$tintucs, 'loaitins'=>$loaitins, 'users'=>$users];
        return view('admin.home',compact('title','mainTitle','ip'),$data);
    }
}

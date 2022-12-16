<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Visits;

class MainController extends Controller
{
    public function index(Request $request){
        $mainTitle = '#';
        $title = 'Quản trị admin';
        $tintucs = \DB::table('tin')->count();
        $loaitins = \DB::table('loaitin')->count();
        $users = \DB::table('users')
            ->where('id_group', 2)
            ->count();

        $ip_address = $request->ip();
        $ip_fake = '127.0.0.3';
        $ip_fake2 = '127.0.0.4';
        $visitors_current = Visits::where('ip_address',$ip_fake)->get();
        $visitors_count =  $visitors_current->count();
        // dd($visitors_count);
        if($visitors_count < 1){
            $visitor = new Visits();
            $visitor->ip_address = $ip_fake;
            $visitor->date_visitors =  date('Y-m-d H:i:s');
            $visitor->save();
        }
        $visitor = Visits::all();
        $visitor_total = $visitor->count();
        // dd($visitor_total);
        $data = ['tintucs'=>$tintucs, 'loaitins'=>$loaitins, 'users'=>$users];
        return view('admin.home',compact('title','mainTitle','visitors_count'),$data);
    }
}
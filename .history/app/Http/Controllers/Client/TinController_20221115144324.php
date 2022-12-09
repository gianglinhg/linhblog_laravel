<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TinController extends Controller
{
    public function index(){
        return view('home');
    }
    public function chitiet($id=0){
        $tin = DB::table('tin') ->where('id', $id)->first();
        $data = ['id' => $id, 'tin' => $tin];
        return view('client/chitiet', $data);
    }
    public function tintrongloai($id){
        $listtin = DB::table('tin')->where('idLT','=', $id)->get();
        $name = DB::table('loaitin')->where('id','=',$id)->value('ten');
        $data = ['id' => $id, 'listtin'=>$listtin, 'name' => $name];
        return view('tintrongloai',$data);
    }
    // Route::get('tintrongloai/{id}',function($id){
    //     $query = DB::table('tin')
    //     ->select('id','tieuDe','tomTat')
    //     ->where('idLT','=',$id)
    //     ->orderBy('ngayDang','desc');
    //     $ten = DB::table('loaitin')->where('id','=',$id)->value('ten');
    //     $data = $query ->get();
    //     return view('tintrongloai', ['data' => $data, 'ten' => $ten]);
    // });
    public function menu(){
        $menu = DB::table('loaitin')
        ->select('id', 'ten')
        ->orderBy('thuTu')
        ->where('anHien', '=', 1)
        ->limit(5);
        $loaitin_arr = $menu ->get();
    }
}

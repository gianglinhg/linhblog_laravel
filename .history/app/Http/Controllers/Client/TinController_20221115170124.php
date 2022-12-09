<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TinController extends Controller
{
    public function index(){
        $noibat = DB::table('tin')
        ->where('noiBat', '=' ,1)
        ->limit(3)->get();
        $moinhat = DB::table('tin')
        ->orderBy('ngayDang', 'desc')
        ->limit(5)->get();
        $xemnhieu = DB::table('tin')
        ->orderBy('xem', 'desc')
        ->limit(5)->get();
        $data = ['noibat' => $noibat,'moinhat' =>  $moinhat,'xemnhieu'=>$xemnhieu];
        return view('client.home', $data);
    }
    public function chitiet($id=0){
        $tin = DB::table('tin')->select('id', 'tieuDe','ngayDang','xem','noiDung') ->where('id', $id)->first();
        $data = ['id' => $id, 'tin' => $tin];
        return view('client.chitiet', $data);
    }
    public function tintrongloai($id){
        $listtin = DB::table('tin')->where('idLT','=', $id)->get();
        $name = DB::table('loaitin')->where('id','=',$id)->value('ten');
        $data = ['id' => $id, 'listtin'=>$listtin, 'name' => $name];
        return view('client.tintrongloai',$data);
    }
    public function tinnoibat(){
        $query = DB::table('tin')
        ->where('noiBat', '=', 1)
        ->limit(3);
        $data = $query ->get();
        return view('client.layout.banner',['data' => $data]);
    }
}

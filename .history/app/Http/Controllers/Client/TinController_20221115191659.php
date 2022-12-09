<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TinController extends Controller
{
    public function index($id=0){
        $noibat = DB::table('tin')
        ->where('noiBat', '=' ,1)
        ->orderBy('ngayDang','desc')
        ->limit(3)->get();
        $moinhat = DB::table('tin')
        ->orderBy('ngayDang', 'desc')
        ->limit(5)->get();
        $xemnhieu = DB::table('tin')
        ->orderBy('xem', 'desc')
        ->limit(5)->get();
        $name = DB::table('loaitin')->select('id','ten')->where('id','=',$id)->value('ten');
        $data = ['noibat' => $noibat,'moinhat' =>  $moinhat,'xemnhieu'=>$xemnhieu,'name'=> $name];
        return view('client.home',['tittle' => 'Giang Văn Linh blog'], $data);
    }
    public function chitiet($id=0){
        $tin = DB::table('tin')->select('id', 'tieuDe','ngayDang','xem','noiDung') ->where('id', $id)->first();
        $name = DB::table('loaitin')->where('id','=',$id)->value('ten');
        $data = ['id' => $id, 'tin' => $tin, 'name' => $name];
        return view('client.chitiet',['tittle' => $tin->tieuDe], $data);
    }
    public function tintrongloai($id){
        $listtin = DB::table('tin')->where('idLT','=', $id)->get();
        $name = DB::table('loaitin')->where('id','=',$id)->value('ten');
        $data = ['id' => $id, 'listtin'=>$listtin, 'name' => $name];
        return view('client.tintrongloai',['tittle' => 'Tin loại ' . $name ], $data);
    }
    public function tinnoibat(){
        $query = DB::table('tin')
        ->where('noiBat', '=', 1)
        ->limit(3);
        $data = $query ->get();
        return view('client.layout.banner',['data' => $data]);
    }
}

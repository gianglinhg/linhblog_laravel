<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TinController extends Controller
{
    public $date;
    public function __construct(){
        $sidebar = DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->orderBy('ngayDang','desc')
        ->where('noiBat',1)
        ->orWhere('xem','>',300)
        ->limit(5)->get();
        $this->sidebar = $sidebar;
    }
    public function index($id=0){
        $DB = DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id');
        // $date =
        $noibat = $DB->where('noiBat', '=' ,1)->limit(3)->get();
        $moinhat = $DB->orderBy('ngayDang', 'desc')->limit(5)->get();
        $xemnhieu = DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->orderBy('xem','desc')->limit(5)->get();
        $sidebar = $this->sidebar;
        $data = ['noibat' => $noibat,'moinhat' =>  $moinhat,'xemnhieu'=>$xemnhieu,'sidebar'=>$sidebar];
        return view('client.home',['title' => 'Giang Văn Linh blog'], $data);
    }
    public function chitiet($id=0){
        // dd($this->sidebar);
        $tin = DB::table('tin')->join('loaitin','tin.idLT','=','loaitin.id')->first();
        $sidebar = $this->sidebar;
        $data = ['id' => $id, 'tin' => $tin,'sidebar'=>$sidebar];
        return view('client.chitiet',['title' => $tin->tieuDe], $data);
    }
    public function tintrongloai($id){
        $listin =  DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->where('idLT',$id)
        ->Paginate(config('tin.paginate'));
        $sidebar = $this->sidebar;
        $name = DB::table('loaitin')->where('id','=',$id)->value('ten');
        $data = ['id' => $id, 'name' => $name,'listin'=>$listin,'sidebar'=>$sidebar];
        $title = 'Tin loại ' . $name ;
        return view('client.tintrongloai',compact('title'), $data);
    }
    public function search(){
        $keyword = $_GET['keyword'];
        $sidebar = $this->sidebar;
        if(!($keyword == "")){
            $title = "Tìm kiếm cho '" . $keyword . "'";
            $searchTin = DB::table('tin')
            ->where('tieuDe','LIKE', '%' . $keyword .'%')
            ->paginate(config('tin.paginate'));
            return view('client.search', compact('searchTin','title','sidebar'));
        }else{
            return back()->with('message','Không thể tìm kiếm, keyword rỗng');
        }
    }

}

<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TinController extends Controller
{
    public $date;
    public function __construct(){
        $DB = DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten');
        $sidebarNews = $DB
        ->orderBy('ngayDang','desc')
        ->where('noiBat',1)
        ->orWhere('xem','>',300)
        ->limit(5)->get();
        $this->DB = $DB;
        $this->sidebarNews = $sidebarNews;
    }
    public function index($id=0){
        $noibat = $this->DB->where('noiBat', '=' ,1)->limit(3)->get();
        $moinhat = $this->DB->orderBy('ngayDang', 'desc')->limit(5)->get();
        // $xemnhieu = $this->DB
        $xemnhieu = DB::table('tin')
        ->select('tin.*','loaitin.id')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->orderBy('xem','desc')->limit(5)->get();
        dd($xemnhieu);
        $sidebarNews = $this->sidebarNews;
        $data = ['noibat' => $noibat,'moinhat' => $moinhat,'xemnhieu' => $xemnhieu, 'sidebarNews'=>$sidebarNews];
        return view('client.home',['title' => 'Giang Văn Linh blog'], $data);
    }
    public function chitiet($id=0){
        // dd($id);
        $tin = DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->where('tin.id',$id)->first();
        $sidebarNews = $this->sidebarNews;
        $data = ['id' => $id, 'tin' => $tin,'sidebarNews'=>$sidebarNews];
        return view('client.chitiet',['title' => $tin->tieuDe], $data);
    }
    public function tintrongloai($id){
        $listin =  $this->DB
        ->where('idLT',$id)
        ->Paginate(config('tin.paginate'));
        // dd($listin);
        $sidebarNews = $this->sidebarNews;
        $name = DB::table('loaitin')->where('id','=',$id)->value('ten');
        $data = ['id' => $id, 'name' => $name,'listin'=>$listin,'sidebarNews'=>$sidebarNews];
        $title = 'Tin loại ' . $name ;
        return view('client.tintrongloai',compact('title'), $data);
    }
    public function search(){
        $keyword = $_GET['keyword'];
        $sidebarNews = $this->sidebarNews;
        if(!($keyword == "")){
            $title = "Tìm kiếm cho '" . $keyword . "'";
            $searchTin = DB::table('tin')
            ->where('tieuDe','LIKE', '%' . $keyword .'%')
            ->paginate(config('tin.paginate'));
            return view('client.search', compact('searchTin','title','sidebarNews'));
        }else{
            return back()->with('message','Không thể tìm kiếm, keyword rỗng');
        }
    }

}

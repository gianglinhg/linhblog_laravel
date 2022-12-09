<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class TinController extends Controller
{
    public $date;
    public function __construct(){
        DB::enableQueryLog();
        $sidebarNews = DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten')
        ->orderBy('ngayDang','desc')
        ->where('noiBat',1)
        // ->orWhere('xem','>',400)
        ->limit(5)->get();
        // dd(DB::getQueryLog());
        $this->sidebarNews = $sidebarNews;
    }
    public function index($id=0){
        $title = 'Giang Văn Linh blog';
        $noibat = DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten')->where('noibat',1)->limit(3)->get();
        $moinhat = DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten')->orderBy('ngayDang','desc')->limit(5)->get();
        $xemnhieu = DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->select('tin.*','loaitin.ten')
        ->orderBy('xem','desc')
        ->limit(5)->get();
        $loaitin = DB::table('loaitin')->where('anHien', '=', 1)
        ->orderBy('thuTu')
        ->limit(8)
        ->get();
        $sidebarNews = $this->sidebarNews;
        $data = ['noibat' => $noibat,'moinhat' => $moinhat,'xemnhieu' => $xemnhieu];
        return view('client.home', compact('title','sidebarNews','test'),$data);
    }
    public function chitiet($id=0,Request $request){
        $tin = DB::table('tin')
        ->join('loaitin','tin.idLT','=','loaitin.id')
        ->where('tin.id',$id)->first();
        $request->session()->put('idTin',$id);
        $title = $tin->tieuDe;
        $comment = DB::table('comment')
        ->join('users','users.id','=','id_user')
        ->select('comment.*','name','id_group','email','avatar')
        ->where('id_tin',$id)
        ->orderBy('comment.created_at','desc')->get();
        $sidebarNews = $this->sidebarNews;
        $data = ['id' => $id, 'tin' => $tin,'sidebarNews'=>$sidebarNews];
        return view('client.chitiet',compact('title','comment'), $data);
    }
    public function tintrongloai($id){
        $listin =  DB::table('tin')
        ->where('idLT',$id)
        ->Paginate(config('tin.paginate'));
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

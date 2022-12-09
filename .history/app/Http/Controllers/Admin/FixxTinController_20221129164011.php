<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Tin;
use Session;
use DB;

class FixxTinController extends Controller
{
    public function index(){
        return to_route('admin.tin.list');
    }
    public function list(){
        $mainTitle = 'Tin tức';
        $title = 'Danh sách tin tức';
        $data = Tin::paginate(config('tin.paginate'));
        return view('admin.tin.list', compact('data','title','mainTitle'));
    }
    public function add(){
        $mainTitle = 'Tin tức';
        $title = 'Thêm tin tức';
        return view('admin.tin.add',compact('title','mainTitle'));
    }
    public function postAdd(Request $request){
        // $request->validate([
        //     'tieuDe' => 'required',
        //     'tomTat' => 'required|max:255',
        // ],[
        //     'tieuDe.required' => 'Buộc nhập tiêu đề',
        //     'tomTat.required' => 'Buộc nhập tóm tắt',
        //     'tomTat.max' => 'Tóm tắt không quá 255 ký tự'
        // ]);
        if($request->has('image')){
            $file = $request->image;
            $size = $file->getSize();
            $name = $file->getClientOriginalName();
            $type = $file->getClientOriginalExtension();
            dd($size);
                if($size <5000000){
                    $path = $file->move(public_path('upload/images/'),$name);
                    $photo->name = $name;
                    $photo->save();
                    if(!empty($path) && !empty($photo)) $msg = 'Đã tải hình ảnh thành công';
                }else $msg = 'Kích thước hình ảnh quá lớn';
            }else $msg = 'Không có hình ảnh nào';
        $t = new Tin();
        $t->tieuDe = $request->tieuDe;
        $t->tomTat = $request->tomTat;
        $t->urlHinh = $request->urlHinh;
        $t->idLT = $request->idLT;
        $t->save();
        // $dataInsert = [
            //     'tieuDe' => $request->tieuDe,
            //     'tomTat' => $request->tomTat,
            //     'urlHinh' => $request->urlHinh;
            //     'idLT' => $request->idLT;
            // ];
            // Tin::create($dataInsert);
        return to_route('admin.tin.list')->with('success','Thêm tin thành công' );
    }
    public function upload(Request $request){
        return $request;
    }
    public function update($id=0,Request $request){
        $mainTitle = 'Tin tức';
        $title = 'Cập nhật tin tức';
        $t = Tin::find($id);
        $nameTin = DB::table('loaitin')->value('ten');
        $request->session()->put('id',$id);
        return view('admin.tin.edit',compact('title', 't','mainTitle','nameTin'));
    }
    public function postUpdate(Request $request){
        $id = session('id');
        $t = Tin::find($id);
        //Fixx lỗi khi update tin ko có
        $request->validate([
            'tieuDe' => 'required',
            'tomTat' => 'required|max:255',
        ],[
            'tieuDe.required' => 'Buộc nhập tiêu đề',
            'tomTat.required' => 'Buộc nhập tóm tắt',
            'tomTat.max' => 'Tóm tắt không quá 255 ký tự'
        ]);
        if(!empty($t)) {
            $t->tieuDe = $request->tieuDe;
            $t->tomTat = $request->tomTat;
            $t->urlHinh = $request->urlHinh;
            $t->idLT = $request->idLT;
            $t->save();
            return back()->with('success','Sửa tin thành công');
        }else return to_route('admin.tin.list')->with('error', 'Tin cần sửa không tồn tại');
    }
    public function search(){
        $keyword = $_GET['keyword'];
        $mainTitle = "Tìm kiếm";
        if(!($keyword == "")){
            $title = "Tìm kiếm cho '" . $keyword . "'";
            $searchTin = Tin::where('tieuDe','LIKE', '%' . $keyword .'%')
            ->paginate(config('tin.paginate'));
            return view('admin.tin.search', compact('searchTin','mainTitle','title','keyword'));
        }else{
            return to_route('admin.tin.list')->with('message','Không thể tìm kiếm, keyword rỗng');
        }
    }
    public function delete($id){
        $t = Tin::find($id);
        if($t == null){
            $msgError = 'Tin cần xóa không tồn tại';
            return redirect()->route('admin.tin.list')->with('error', $msgError);
        }else{
            $t->delete();
            $msgSuccess = 'Xóa tin thành công';
            return redirect()->route('admin.tin.list')->with('success', $msgSuccess);
        }
    }
}

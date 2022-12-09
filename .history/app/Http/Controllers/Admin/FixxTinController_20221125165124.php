<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Tin;
use Session;

class FixxTinController extends Controller
{
    public function index(){
        return to_route('tin.list');
    }
    public function list(){
        $title = 'Danh sách tin tức';
        $data = Tin::paginate(8);
        return view('admin.tin.list', compact('data','title'));
    }
    public function add(){
        $title = 'Thêm tin tức';
        return view('admin.tin.add',compact('title'));
    }
    public function postAdd(Request $request){
        $request->validate([
            'tieuDe' => 'required',
            'tomTat' => 'required|max:255',
        ],[
            'tieuDe.required' => 'Buộc nhập tiêu đề',
            'tomTat.required' => 'Buộc nhập tóm tắt',
            'tomTat.max' => 'Tóm tắt không quá 255 ký tự'
        ]);
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
        $request->session()->flash('message', 'Thêm tin thành công');
        return to_route('tin.list');
    }
    public function update($id=0,Request $request){
        $title = 'Cập nhật tin';
        $t = Tin::find($id);
        $request->session()->put('id',$id);
        if($t == null) return redirect('/tin/thongbao');
        return view('admin.tin.edit',['t'=>$t],compact('title'));
    }
    public function postUpdate(Request $request){
        $id = session('id');
        $t = Tin::find($id);
        // if($t == null) return redirect()->route('tin.list');
        $request->validate([
            'tieuDe' => 'required',
            'tomTat' => 'required|max:255',
        ],[
            'tieuDe.required' => 'Buộc nhập tiêu đề',
            'tomTat.required' => 'Buộc nhập tóm tắt',
            'tomTat.max' => 'Tóm tắt không quá 255 ký tự'
        ]);
        $t->tieuDe = $request->tieuDe;
        $t->tomTat = $request->tomTat;
        $t->urlHinh = $request->urlHinh;
        $t->idLT = $request->idLT;
        $t->save();
        return to_route('tin.list')->with('message','Sửa tin thành công');
    }
    public function search(){
        $keyword = $_GET['keyword'];
        if(!($keyword == "")){
            $title = "Tìm kiếm cho '" . $keyword . "'";
            $searchTin = Tin::where('tieuDe','LIKE', '%' . $keyword .'%')
            ->paginate(config('tin.paginate'));
            return view('admin.tin.search', compact('searchTin','title','keyword'));
        }else{
            return to_route('tin.list')->with('message','Không thể tìm kiếm, keyword rỗng');
        }
    }
    public function delete($id){
        $t = Tin::find($id);
        if($t == null){
            $msgError = 'Tin cần xóa không tồn tại';
            return redirect()->route('tin.list')->with('error', $msgError);
        }else{
            $t->delete();
            $msgSuccess = 'Xóa tin thành công';
        }
        // $request->session()->flash('message', 'Xóa tin thành công');
        // return to_route('tinlist');
        return redirect()->route('tin.list')->with('success', $msgSuccess);
    }
}
<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Tin;
use Session;

class FixxTinController extends Controller
{
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
        return to_route('tin_list');
    }
    public function delete($id){
        $t = Tin::find($id);
        if($t == null) return redirect('/tin/thongbao');
        $t->delete();
        // $request->session()->flash('message', 'Xóa tin thành công');
        Session::flash('message', 'Xóa tin thành công');
        // return to_route('tinlist');
        return redirect()->route('tin_list');
    }
    public function update($id){
        $title = 'Cập nhật tin';
        $t = Tin::find($id);
        if($t == null) return redirect('/tin/thongbao');
        return view('admin.tin.edit',['t'=>$t],compact('title'));
    }
    public function postUpdate($id, Request $request){
        $t = Tin::find($id);
        if($t == null) return redirect('/tin/thongbao');
        $request->validate([
            'tieuDe' => 'required',
            'tomTat' => 'required|max:255',
        ],[
            'tieuDe.required' => 'Buộc nhập tiêu đề',
            'tomTat.required' => 'Buộc nhập tóm tắt',
            'tomTat.max' => 'Tóm tắt không quá 255 ký tự'
        ]);
        // $t = new Tin();
        $t->tieuDe = $request->tieuDe;
        $t->tomTat = $request->tomTat;
        $t->urlHinh = $request->urlHinh;
        $t->idLT = $request->idLT;
        $t->save();
        $request->session()->flash('message', 'Sửa tin thành công');
        return to_route('tin_list');
    }
    public function search(){
        $keyword = $_GET['keyword'];
        $title = "Tìm kiếm cho " . $keyword ;
        dd($title);
        $searchTin = Tin::where('tieuDe','LIKE', '%' . $keyword .'%')->get();
        return view('admin.tin.search', compact('searchTin'));
    }
}

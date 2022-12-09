<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\LoaiTin;
use DB;
use Session;

class LoaiTinController extends Controller
{
    public $data = [];
    private $loaitin;
    public function __construct(){
        $this->loaitin = new Loaitin();
    }
    public function index(){
        return redirect()->route('loaitin.list');
    }
    public function list(){
        $title = 'Danh sách tin tức';
        $tinList = $this->loaitin->getAllLoaiTin();
        return view('admin.loaitin.list', compact('title','tinList'));
    }
    public function add(){
        $title = "Thêm loại tin";
        return view('admin.loaitin.add', compact('title'));
    }
    public function postAdd(Request $request){
        $request->validate([
            'name' => 'required | min:5',
            'thutu' => 'required | unique:loaitin'
        ],[
            'name.required' => 'Buộc phải nhập',
            'name.min' => 'Tối thiộc phải nhập',
            'thutu.required' => 'Buểu 5 kí tự',
            'thutu.unique' => 'Nội dung trùng lặp'
        ]);
        $dataInsert = [
            $request->name,
            $request->thutu
        ];
        $this->loaitin->addTin($dataInsert);
        return back()->with('msg','Thêm thành công');
    }
    public function edit($id=0, Request $request){
        $title = "Cập nhật loại tin";
        if(!empty($id)){
            $tinDetail = $this->tin->getDetail($id);
            if(!empty($tinDetail[0])){
                $request->session()->put('id',$id);
                $tinDetail = $tinDetail[0] ;
            }else{
                return to_route('loaitin.list')->with('msg', 'Tin tức không tồn tại');
            }
        }else{
            return to_route('loaitin.list')->with('msg', 'Liên kết không tồn tại');
        }
        return view('admin.loaitin.edit', compact('title','tinDetail'));
    }

    public function postEdit(Request $request){
        $id = session('id');
        if(empty($id)) return to_route('loatin.list')->with('msg','Liên kết không tồn tại');
        $request->validate([
            'name' => 'required | min:5',
            'thutu' => 'required | unique:loaitin,thuTu,'.$id
        ],[
            'name.required' => 'Buộc phải nhập',
            'name.min' => 'Ít nhất 5 kí tự',
            'thutu.required' => 'Buộc phải nhập',
            'thutu.unique' => 'Nội dung trùng lặp'
        ]);
        $dataUpdate =[
            $request->name,
            $request->thutu,
            date('Y-m-d H:i:s')
        ];
        // $this->tin->updateTin($dataUpdate,$id);
        // return redirect()->route('edit',['id'=>])->with('msg','');
        return back()->with('msg','Cập nhật tin tức thành công');
    }
    public function delete($id){
        if(!empty($id)){
            $tinDetail = $this->tin->getDetail($id);
            if(!empty($tinDetail[0])){
                $deleteStatus = $this->tin->deleteTin($id);
                if($deleteStatus) $msg = 'Xóa tin tức thành công';
                else $msg = 'Bạn không thể xóa';
            }else{
                $msg = 'Tin tức không tồn tại';
            }
        }else{
            $msg = 'Người dùng không tồn tại';
        }
        return to_route('loaitin.list')->with('msg', $msg);
    }
}

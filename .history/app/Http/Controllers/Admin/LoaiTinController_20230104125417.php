<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\LoaiTin;
use App\Http\Requests\AdminTin as RequestLoaiTin;
use DB;
use Session;

class LoaiTinController extends Controller
{
    private $loaitin;
    public function __construct(){
        $this->loaitin = new Loaitin();
    }
    public function index(){
        return redirect()->route('admin.loaitin.list');
    }
    public function list(){
        $mainTitle = 'Loại tin';
        $title = 'Danh sách loại tin';
        $tinList = $this->loaitin->getAllLoaiTin();
        return view('admin.loaitin.list', compact('title','tinList','mainTitle'));
    }
    public function add(){
        $mainTitle = 'Loại tin';
        $title = "Thêm loại tin";
        return view('admin.loaitin.add', compact('title','mainTitle'));
    }
    public function postAdd(Request $request){
        $request->validate([
            'name' => 'required | min:5',
            'thutu' => 'required | unique:loaitin,thuTu,'
        ],[
            'name.required' => 'Tên loại buộc phải nhập',
            'name.min' => 'Tối thiểu 5 kí tự',
            'thutu.required' => 'Thứ tự buộc phải nhập',
            'thutu.unique' => 'Thứ tự không được trùng lặp'
        ]);
        $dataInsert = [
            $request->name,
            $request->thutu,
            $request->active,
            date('Y-m-d H:i:s')
        ];
        $this->loaitin->addTin($dataInsert);
        return to_route('admin.loaitin.list')->with('success','Thêm thành công');
    }
    public function edit($id=0,Request $request){
        $mainTitle = 'Loại tin';
        $title = "Cập nhật loại tin";
        if(!empty($id)){
            $tinDetail = $this->loaitin->getDetail($id);
            if(!empty($tinDetail[0])){
                $request->session()->put('id',$id);
                $tinDetail = $tinDetail[0] ;
            }else{
                return to_route('admin.loaitin.list')->with('error', 'Loại tin không tồn tại');
            }
        }else{
            return to_route('admin.loaitin.list')->with('error', 'Liên kết không tồn tại');
        }
        return view('admin.loaitin.edit', compact('title','tinDetail','mainTitle'));
    }

    public function postEdit(Request $request){
        $request->validate([
            'name' => 'required | min:5',
            'thutu' => 'required | unique:loaitin,thuTu,'.$id
        ],[
            'name.required' => 'Tên loại buộc phải nhập',
            'name.min' => 'Tối thiểu 5 kí tự',
            'thutu.required' => 'Thứ tự buộc phải nhập',
            'thutu.unique' => 'Thứ tự không được trùng lặp'
        ]);
        $id = session('id');
        if(empty($id)) return to_route('admin.loaitin.list')->with('error','Loại tin không tồn tại');
        $dataUpdate =[
            $request->name,
            $request->thutu,
            $request->active,
            date('Y-m-d H:i:s')
        ];
        $this->loaitin->updateTin($dataUpdate,$id);
        return back()->with('success','Cập nhật Loại tin thành công');
    }
    public function delete($id){
        if(!empty($id)){
            $tinDetail = $this->loaitin->getDetail($id);
            if(!empty($tinDetail[0])){
                $deleteStatus = $this->loaitin->deleteTin($id);
                if($deleteStatus)
                return to_route('admin.loaitin.list')->with('success', 'Xóa Loại tin thành công');
                else $error = 'Bạn không thể xóa';
            }else{
                $error = 'Loại tin không tồn tại';
            }
        }else{
            $error = 'Loại tin không tồn tại';
        }
        return to_route('admin.loaitin.list')->with('error', $error);
    }
}

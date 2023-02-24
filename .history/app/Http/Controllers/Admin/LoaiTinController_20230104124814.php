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
    public function postAdd(RequestLoaiTin $request){
        $dataInsert = [
            $request->name,
            $request->thutu,
            $request->active,
            date('Y-m-d H:i:s')
        ];
        $this->loaitin->addTin($dataInsert);
        return to_route('admin.loaitin.list')->with('success','Thêm thành công');
    }
    public function edit($id=0, RequestLoaiTin $request){
        dd(123);
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

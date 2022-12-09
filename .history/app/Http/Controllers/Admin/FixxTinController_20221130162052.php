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
        $request->validate([
            'tieuDe' => 'required | min:20',
            'tomTat' => 'required|max:255',
            'noiDung' => 'required',
            'image' =>[
                'required',
                'image',
                'mimes:jpeg,png',
                'mimetypes:image/jpeg,image/png',
                'max:3072',
            ],
        ],[
            'tieuDe.required' => 'Buộc nhập tiêu đề',
            'tieuDe.min' => 'Tiêu đề tối thiểu 20 ký tự',
            'tomTat.required' => 'Buộc nhập tóm tắt',
            'tomTat.max' => 'Tóm tắt không quá 255 ký tự',
            'noiDung.required' => 'Buộc nhập nội dung',
            'image.required' => 'Buộc có hình ảnh',
            'image.image' => 'Bạn chỉ được tải hình ảnh',
            'image.mimes' => 'Hình ảnh dạng jpeg và png',
            'image.max' => 'Ảnh tối đa được nặng 3MB',
        ]);
            $file = $request->image;
            $size = $file->getSize();
            $name = $file->getClientOriginalName();
            $urlHinh = 'upload/images/' . $name;
            $path = $file->move(public_path('template/upload/images/'),$name);
            $t = new Tin();
            $t->tieuDe = $request->tieuDe;
            $t->tomTat = $request->tomTat;
            $t->noiDung = $request->noiDung;
            $t->urlHinh = $urlHinh;
            $t->idLT = $request->idLT;
            $t->save();
            if(!empty($path) && !empty($t))
            return to_route('admin.tin.list')->with('success','Thêm mới tin tức thành công');
            else return to_route('admin.tin.list')->with('error','Chưa thêm được tin tức');
            // }else $error = 'Tin tức buộc phải có hình ảnh';
        // $dataInsert = [
            //     'tieuDe' => $request->tieuDe,
            //     'tomTat' => $request->tomTat,
            //     'urlHinh' => $request->urlHinh;
            //     'idLT' => $request->idLT;
            // ];
            // Tin::create($dataInsert);
    }
    public function upload(Request $request){
        return $request;
    }
    public function update($id=0,Request $request){
        $mainTitle = 'Tin tức';
        $title = 'Cập nhật tin tức';
        $nameTin = DB::table('loaitin')->value('ten');
        $t = Tin::find($id);
        $request->session()->put('id',$id);
        return view('admin.tin.edit',compact('title', 't','mainTitle','nameTin'));
    }
    // public function postUpdate(Request $request){
    //     //Fixx lỗi khi update tin ko có

    //     $id = session('id');
    //     $t = Tin::find($id);
    //     dd(!empty($t));
    //     // if($t) {
    //     $t->tieuDe = $request->tieuDe;
    //     $t->tomTat = $request->tomTat;
    //     $t->noiDung = $request->noiDung;
    //     $t->urlHinh = $request->urlHinh;
    //     $t->idLT = $request->idLT;
    //     $t->save();
    //     // dd( $update);
    //     return back()->with('success','Sửa tin thành công');
    //     //  return to_route('admin.tin.list')->with('error', 'Tin cần sửa không tồn tại');
    // }
    public function postUpdate(Request $request){
        $id = session('id');
        $t = Tin::find($id);
        // dd($t);
    $request->validate([
        'tieuDe' => ['required' , 'min:20'],
        'tomTat' => ['required' , 'max:255'],
        'noiDung' => 'required',
        // 'image' =>[
        //     'required',
        //     'image',
        //     'mimes:jpeg,png',
        //     'mimetypes:image/jpeg,image/png',
        //     'max:3072',
        // ],
    ],[
        'tieuDe.required' => 'Buộc nhập tiêu đề',
        'tieuDe.min' => 'Tiêu đề tối thiểu 20 ký tự',
        'tomTat.required' => 'Buộc nhập tóm tắt',
        'tomTat.max' => 'Tóm tắt không quá 255 ký tự',
        'noiDung.required' => 'Buộc nhập nội dung',
        // 'image.required' => 'Buộc có hình ảnh',
        // 'image.image' => 'Bạn chỉ được tải hình ảnh',
        // 'image.mimes' => 'Hình ảnh dạng jpeg và png',
        // 'image.max' => 'Ảnh tối đa được nặng 3MB',
    ]);
    $tieuDe = $request->tieuDe;
    dd($tieuDe );
        if($request->has('image')){
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $urlHinh = 'upload/images/' . $name;
            $path = $file->move(public_path('template/upload/images/'),$name);
            $t->urlHinh = $urlHinh;
        }
        $t->tieuDe = $request->tieuDe;
        $t->tomTat = $request->tomTat;
        $t->noiDung = $request->noiDung;
        $t->idLT = $request->idLT;
        $t->save();
        if($t) return back()->with('success','Sửa tin tức thành công');
        else return to_route('admin.tin.list')->with('error','Chưa sửa được tin tức');
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

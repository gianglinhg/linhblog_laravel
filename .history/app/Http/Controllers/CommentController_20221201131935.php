<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use DB;
use Session;
use Auth;


class CommentController extends Controller
{
    public function comment(Request $request){
        //id được lưu vào session ở phần phần controller chi tiết tin
        $id = session()->get('idTin');
        $request->validate([
            'content' => 'required',
        ],[
            'content.required' => 'Không thể bình luận trống không'
        ]);

        $insertCmt = DB::table('comment')->insert([
            'content' => $request->content,
            'id_user' => Auth::id(),
            'id_tin' => $id,
            'created_at' => now()
        ]);
        if($insertCmt) $msg = 'Đăng bình luận thành công';
        else $msg = 'Đăng bình luận thất bại';
        return back()->with('msg',$msg);
    }
    public function deleteCmt($id){
        \session()->put('key', $value);
        $deleteCmt = Comment::where('id',$id)->delete();
        if($deleteCmt) return back()->with('success','Đã xóa bình luận');
        else return back()->with('error','Tin cần xóa không tồn tại');
    }
}

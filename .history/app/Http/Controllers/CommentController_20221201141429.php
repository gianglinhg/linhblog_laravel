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
            'content' => 'required | max:500',
        ],[
            'content.required' => 'Không thể bình luận trống không',
            'content.max' => 'Bình luận quá dài'
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
        $id_userCmt = Comment::where('id',$id)->value('id_user');
        if(Auth::id() == $id_userCmt){
            $deleteCmt = Comment::where('id',$id)->delete();
            if($deleteCmt) return back()->with('success','Đã xóa bình luận');
            else return back()->with('error','Chưa xóa được bình luận');
        }
        else return back()->with('error','Bạn không thể xóa bình luận này');
    }
}

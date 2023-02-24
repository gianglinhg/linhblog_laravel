<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use DB;
use Session;
use Auth;


class CommentController extends Controller
{
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

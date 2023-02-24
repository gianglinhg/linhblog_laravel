<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Auth;
use Carbon\Carbon;

class CommentComponent extends Component
{
    public $content;
    public $idTin;

    public function comment(){
        $this->validate([
            'content' => 'required | max:500',
        ],[
            'content.required' => 'Không thể bình luận trống không',
            'content.max' => 'Bình luận quá dài'
        ]);
        $id = session()->get('idTin');
        Comment::create([
            'content' => $this->content,
            'id_user' => Auth::id(),
            'id_tin' => $id,
            'created_at' => now()
        ]);
        session()->flash('msg','Đăng bình luận thành công');
    }
    public function deleteComment($id){
        $id_userCmt = Comment::where('id',$id)->value('id_user');
        if(Auth::id() == $id_userCmt){
            $deleteCmt = Comment::where('id',$id)->delete();
            session()->flash('msg','Đã xóa bình luận');
        }
        else session()->flash('msg','Không thể xóa bình luận');
    }
    public function render()
    {
        $id = session()->get('idTin');
        $comment = Comment::join('users','users.id','=','id_user')
        ->select('comment.*','comment.id as idCmt','users.*')
        ->where('id_tin',$id)->latest()->get();
        return view('livewire.comment-component',compact('comment'));
    }
}

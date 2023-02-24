<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Auth;
use Carbon\Carbon;

class CommentComponent extends Component
{
    public $contents;
    public $newContent;

    public function comment(){
        $this->validate([
            'newContent' => 'required | max:500',
        ],[
            'newContent.required' => 'Không thể bình luận trống không',
            'newContent.max' => 'Bình luận quá dài'
        ]);
        $idTin = session()->get('idTin');
        $createComment = Comment::create([
            'content' => $this->newContent,
            'id_user' => Auth::id(),
            'id_tin' => $idTin,
            'created_at' => now()
        ]);
        $this->contents->prepend($createComment);
        $this->newContent = "";
        session()->flash('msg','Đăng bình luận thành công');
    }
    public function deleteComment($id){
        $id_userCmt = Comment::where('id',$id)->value('id_user');
        if(Auth::id() == $id_userCmt){
            $deleteCmt = Comment::where('id',$id)->delete();
            $this->contents->destroy($deleteCmt);
            session()->flash('msg','Đã xóa bình luận');
        }
        else session()->flash('msg','Không thể xóa bình luận');
    }
    public function mount(){
        $idTin = session()->get('idTin');
        $this->contents = Comment::join('users','users.id','=','id_user')
        ->select('comment.*','comment.id as idCmt','users.*')
        ->where('id_tin',$idTin)->get();
        // dd($this->contents);
    }
    public function render()
    {
        return view('livewire.comment-component');
    }
}

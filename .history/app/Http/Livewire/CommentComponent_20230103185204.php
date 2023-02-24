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
        dd($id);
    }
    public function render()
    {
        $id = session()->get('idTin');
        $comment = Comment::join('users','users.id','=','id_user')
        ->select('tin.*','tin.id as idTin')
        ->where('id_tin',$id)->get();
        return view('livewire.comment-component',compact('comment'));
    }
}

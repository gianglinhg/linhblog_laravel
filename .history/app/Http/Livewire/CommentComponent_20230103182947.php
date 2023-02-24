<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentComponent extends Component
{
    public $content;

    public function comment(){
        // $this->validate([
        //     'content' => 'required | max:500',
        // ],[
        //     'content.required' => 'Không thể bình luận trống không',
        //     'content.max' => 'Bình luận quá dài'
        // ]);
        $id = session()->get('idTin');
        if($this->cmtContent) dd($this->cmtContent);
    }
    public function render()
    {
        $id = session()->get('idTin');
        $comment = \DB::table('comment')
        ->join('users','users.id','=','id_user')
        ->select('comment.*','name','id_group','email','avatar')
        ->where('id_tin',$id)
        ->orderByDesc('comment.created_at')->get();
        return view('livewire.comment-component',compact('comment'));
    }
}

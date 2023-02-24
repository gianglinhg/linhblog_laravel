<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentComponent extends Component
{
    public function render()
    {
        $comment = ưDB::table('comment')
        ->join('users','users.id','=','id_user')
        ->select('comment.*','name','id_group','email','avatar')
        ->where('id_tin',$id)
        ->orderByDesc('comment.created_at')->get();
        return view('livewire.comment-component');
    }
}

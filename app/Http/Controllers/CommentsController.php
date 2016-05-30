<?php

namespace TeachMe\Http\Controllers;

use Illuminate\Http\Request;
use TeachMe\Entities\TicktComment;
use TeachMe\Entities\Ticket;
use TeachMe\Http\Requests;

class CommentsController extends Controller
{
    public function submit($id, Request $request)
	{	
		$this->validate($request,[
			'comment' 	=> 'required|max:250',
			//'link'		=> 'url'
			]);

		$comment = new TicktComment($request->all());

		$comment->user_id = currentUser()->id;

		$tikect = Ticket::findOrFail($id);

		$tikect->comments()->save($comment);

		session()->flash('success', 'tu comentario fue guardado exitosamente');

		return redirect()->back();
    }
}

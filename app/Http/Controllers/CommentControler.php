<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

  public function store(Request $request, $id)
  {
    Comment::validate($request);
    $data = ["comment" => $request->comment, "id_game" => $id, "id_comment" => ($request->idComment ? $request->idComment : null), "id_user" =>  Auth::id()];

    Comment::create($data);

    return back();
  }

  public function destroy($id)
  {
    $comment = Comment::find($id);
    $comment->deleteSubComments($comment);

    return back();
  }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory;

  // Category Attributtes
  // $this->attributes['id'] - int - contains the product primary key
  // $this->attributes['comment'] - string - contains the comment
  // $this->attributes['id_sneaker'] - id - contains the id of game
  // $this->attributes['id_user'] - id - contains the id of user
  // $this->attributes['id_comment'] - id - if this comment is response of other comment

  protected $fillable = ['id', 'comment', 'id_sneaker', 'id_comment', 'id_user'];

  public function comments()
  {
    return $this->hasMany(Comment::class, 'id_comment', 'id');
  }

  public function subComment($comment, $viewData)
  {
    if (count($comment->comments) <= 0) {
      return $viewData = $comment::with('user');
    }
    foreach ($comment->comments as $comment) {
      $viewData[$comment->getId()] = [];
      return $this->subComment($comment, $viewData[$comment->getId()]);
    }
  }

  public function deleteSubComments($comment){
    if(isset($comment->comments[0])){
      foreach($comment->comments as $subComment){
        $this->deleteSubComments($subComment);
      }
    }
    $comment->delete();
  }

  public function user()
  {
    return $this->hasMany(User::class, 'id', 'id_user');
  }

  public function game()
  {
    return $this->hasMany(Game::class, 'id', 'id_sneaker');
  }

  public static function validate($request)
  {
    $request->validate([
      'comment' => 'required',
    ]);
  }

  public function getId()
  {
    return $this->attributes['id'];
  }

  public function setId($id)
  {
    $this->attributes['id'] = $id;
  }

  public function getComment()
  {
    return $this->attributes['comment'];
  }

  public function setComment($comment)
  {
    $this->attributes['comment'] = $comment;
  }

  public function getIdGame()
  {
    return $this->attributes['id_sneaker'];
  }

  public function setIdGame($idGame)
  {
    $this->attributes['id_sneaker'] = $idGame;
  }

  public function getIdUser()
  {
    return $this->attributes['id_user'];
  }

  public function setIdUser($idUser)
  {
    $this->attributes['id_user'] = $idUser;
  }

  public function getIdComment()
  {
    return $this->attributes['id_comment'];
  }

  public function setIdComment($idComment)
  {
    $this->attributes['id_comment'] = $idComment;
  }

  public function getCreateAt()
  {
    return $this->attributes['created_at'];
  }

  public function getUpdateAt()
  {
    return $this->attributes['updated_at'];
  }
}
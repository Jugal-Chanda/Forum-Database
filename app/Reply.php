<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Reply extends Model
{
  protected $fillable =['user_id','discussion_id','content'];

  public function discussion()
  {
    return $this->belongsTo('App\Discussion');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function likes()
  {
    return $this->hasMany('App\Like');
  }

  public function isLikedByAuthUser()
  {
    $id = Auth::id();
    foreach ($this->likes as $like) {
      if($like->user->id === $id){
        return true;
      }
    }
    return false;
  }
}

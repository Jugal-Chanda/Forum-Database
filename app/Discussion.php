<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Discussion extends Model
{
  protected $fillable =['user_id','channel_id','title','content','slug'];

  public function channel()
  {
    return $this->belongsTo('App\Channel');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function replies()
  {
    return $this->hasMany('App\Reply');
  }
  public function watchers()
  {
    return $this->hasMany('App\Watcher');
  }

  public function isWatchByAuthUser()
  {
    foreach ($this->watchers as $watcher) {
      if($watcher->user->id === Auth::id()){
        return true;
      }
    }
    return false;
  }

  public function hasBestReply()
  {
    $replies = $this->replies;
    foreach ($replies as $reply) {
      if($reply->best_reply == 1){
        return true;
      }
    }
    return false;
  }


}

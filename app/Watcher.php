<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Watcher extends Model
{
  

  protected $fillable = ['user_id','discussion_id'];
  public function discussion()
  {
    return $this->belongsTo('App\Discussion');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

}

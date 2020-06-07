<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Auth;
use App\Watcher;

class WatcherController extends Controller
{
  public function watch($id)
  {
    $watcher = Watcher::create([
      'user_id' => Auth::id(),
      'discussion_id' => $id
    ]);
    return redirect()->back();
  }

  public function unwatch($id)
  {
    $watcher = Watcher::where('user_id',Auth::id())->where('discussion_id',$id)->first();
    $watcher->delete();
    return redirect()->back();
  }
}

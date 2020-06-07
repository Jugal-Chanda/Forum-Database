<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use App\Discussion;
use App\Channel;
use Auth;
class ForumController extends Controller
{
  public function index()
  {

    switch (request('filter')) {
      case 'me':
        $discussions = Discussion::where('user_id',Auth::id())->orderBy('created_at','desc')->paginate(3);
        break;
      case 'solved':
        $discussions = array();
        foreach (Discussion::orderBy('created_at','desc')->get() as $d) {
          if($d->hasBestReply()){
            array_push($discussions,$d);
          }
        }
        $discussions = new Paginator($discussions,3);
        break;
      case 'unsolved':
        $discussions = array();
        foreach (Discussion::orderBy('created_at','desc')->get() as $d) {
          if(!$d->hasBestReply()){
            array_push($discussions,$d);
          }
        }
        $discussions = new Paginator($discussions,3);
        break;
      default:
        $discussions = Discussion::orderBy('created_at','desc')->paginate(3);
        break;
    }
    return view('forum',['discussions'=>$discussions]);
  }
  
  public function channel($slug)
  {
    $channel = Channel::where('slug',$slug)->first();
    return view('channel')->with('discussions',$channel->discussions()->paginate(3));
  }
}

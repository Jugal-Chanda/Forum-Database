<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Like;
use App\Reply;

class ReplyController extends Controller
{

  public function edit($id)
  {
    $reply = Reply::find($id);
    return view('replies.edit')->with('reply',$reply);
  }

  public function update(Request $request,$id)
  {
    $this->validate($request,[
      'reply' => 'required'
    ]);
    $reply = Reply::find($id);
    $reply->content = $request->reply;
    $reply->save();
    Session::flash('success','Reply Updated');
    return redirect()->route('discussion.show',['slug'=>$reply->discussion->slug]);
  }


  public function like($id)
  {
    $like = Like::create([
      'user_id' => Auth::id(),
      'reply_id' => $id
    ]);
    Session::flash('success','Liked a reply');
    return redirect()->back();
  }

  public function unlike($id)
  {
    $like = Like::where('user_id',Auth::id())->where('reply_id',$id)->first();
    $like->delete();
    Session::flash('success','Liked a reply');
    return redirect()->back();
  }

  public function bestAnswer($id)
  {
    $reply = Reply::find($id);
    $reply->best_reply = 1;
    $reply->save();
    Session::flash('success','Reply marked as best reply');
    return redirect()->back();
  }
}

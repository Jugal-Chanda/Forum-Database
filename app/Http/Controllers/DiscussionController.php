<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Discussion;
use App\Reply;
use App\User;
use Session;
use Auth;
use Notification;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request,[
        'title' => 'required',
        'channel' => 'required',
        'question' => 'required'
      ]);

      $discussion = Discussion::create([
        'title' => $request->title,
        'channel_id' => $request->channel,
        'content' => $request->question,
        'user_id' => Auth::id(),
        'slug' => Str::slug($request->title, '-'),
      ]);
      Session::flash('success','Successfully created discussion');

      return redirect()->route('discussion.show',['slug'=>$discussion->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $discussion = Discussion::where('slug',$slug)->first();
      $best_reply = $discussion->replies->where('best_reply',1)->first();
      return view('discussions.show')->with('discussion',$discussion)->with('best_reply',$best_reply);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
      return view('discussions.edit')->with('discussion',Discussion::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
      $this->validate($request,[
        'question' => 'required'
      ]);
      $discussion = Discussion::where('slug',$slug)->first();
      $discussion->content = $request->question;
      $discussion->save();
      Session::flash('success','Successfully update this discussion');
      return redirect()->route('discussion.show',['slug'=>$slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reply(Request $request,$id)
    {
      $this->validate($request,[
        'reply' => 'required'
      ]);


      $reply = Reply::create([
        'content' => $request->reply,
        'user_id' => Auth::id(),
        'discussion_id' => $id
      ]);

      $d = Discussion::find($id);
      $watchers = array();
      foreach ($d->watchers as $w) {
        array_push($watchers,User::find($w->user_id));
      }
      Notification::send($watchers,new \App\Notifications\NewReplyAdded($d));


      Session::flash('success','Successfully replied');
      return redirect()->back();
    }
}

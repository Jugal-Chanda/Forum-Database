<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Session;
use App\Channel;


class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('admin') ;
    }
    public function index()
    {
      return view('channels.index')->with('channels',Channel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('channels.create');
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
        'title' => 'required'
      ]);

      $channel = Channel::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title,'-')
      ]);
      Session::flash('success','Successfully created channel');
      return redirect()->route('channels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('channels.edit',['channel'=>Channel::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'title' => 'required'
      ]);
      $channel = Channel::find($id);
      $channel->title = $request->title;
      $channel->slug = Str::slug($request->title,'-');
      $channel->save();
      Session::flash('success','Successfully update channel');
      return redirect()->route('channels.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Channel::destroy($id);
      Session::flash('success','Successfully deleted channel');
      return redirect()->route('channels.index');
    }
}

@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header row no-gutters">

    <div class="col-md-1">
        <img src="{{ $discussion->user->avatar }}" alt="" style="width: 44px; height: 44px; border-radius: 50%;">
    </div>
    <div class="col-md-6">
      <span>{{ $discussion->user->name }}</span>&nbsp&nbsp<br>
      <span>{{ $discussion->created_at->diffForHumans() }}</span><br>
      <a href="{{ route('channel.discussions.show',['slug'=>$discussion->channel->slug]) }}" class="btn btn-primary btn-sm">{{ $discussion->channel->title }}</a>

    </div>
    <div class="col-md-5">

      @if($discussion->isWatchByAuthUser())
        <a href="{{ route('discussion.unwatch',['id'=>$discussion->id]) }}" class="btn btn-light btn-sm float-right ml-2">Unwatch</a>
      @else
        <a href="{{ route('discussion.watch',['id'=>$discussion->id]) }}" class="btn btn-light btn-sm float-right ml-2">watch</a>
      @endif

      @if($best_reply)
        <span class="btn btn-success btn-sm float-right ml-2">Closed</span>
      @else
        <span class="btn btn-danger btn-sm float-right ml-2">Open</span>
      @endif

      @if(Auth::id() == $discussion->user_id)
        <a href="{{ route('discussion.edit',['slug'=>$discussion->slug]) }}" class="btn btn-info btn-sm float-right">Edit</a>
      @endif
    </div>
  </div>
  <div class="card-body">
    <h5 class="bg-light py-2">{{ $discussion->title }}</h5>

      {!! Markdown::convertToHtml($discussion->content) !!}

    <!-- <p class="mt-2 text-justify"></p> -->
    @if($best_reply)
    <div class="card">
      <div class="card-header">
        <h4 class="text-center text-success">Best Reply</h4>
      </div>
      <div class="card-body">
        {{ $best_reply->content }}
      </div>
      <div class="card-footer">
        <h5>Created By</h5>
         <img src="{{ $best_reply->user->avatar }}" alt="" style="width: 44px; height: 44px; border-radius: 50%;">
         {{ $best_reply->user->name }}

      </div>

    </div>
    @endif
  </div>
  <div class="card-footer">

    <div class="mb-3">
      <span>{{ $discussion->replies->count() }} {{ Str::plural('Reply', $discussion->replies->count()) }}</span>
    </div>
    @if(!$best_reply)
      <div class="card">
        <div class="card-body">
          @if(Auth::check())
            <form class="" action="{{ route('discussion.reply',['id'=>$discussion->id]) }}" method="post" >
              @csrf
              <div class="form-group mb-2">
                <label for="" class="">Write your reply..</label>
                <textarea name="reply" rows="5" cols="80" class="form-control"></textarea>
              </div>

              <button type="submit" class="btn btn-primary mb-2">Reply</button>
            </form>
          @else
          <div class="text-center">
            <h4>For repling login first</h4>
              @guest
                <a class="btn btn-secondary btn-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                <a class="btn btn-secondary btn-sm" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
              @endguest

          </div>
          @endif
        </div>

      </div>
    @endif

    </div>

</div>
@foreach($discussion->replies as $reply)


<div class="card mt-1">
  <div class="card-header row no-gutters">

    <div class="col-md-1">
        <img src="{{ $reply->user->avatar }}" alt="" style="width: 44px; height: 44px; border-radius: 50%;">
    </div>
    <div class="col-md-6">
      <span>{{ $reply->user->name }}</span>&nbsp&nbsp<br>
      <span>{{ $reply->created_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-5">
      @if(!$best_reply && (Auth::id() == $discussion->user_id))
        <a href="{{ route('reply.best_answer',['id'=>$reply->id]) }}" class="btn btn-info float-right ml-2">Best answer</a>
      @endif

      @if(Auth::id() == $reply->user->id)
        @if(!$reply->best_reply)
          <a href="{{ route('reply.edit',['id'=>$reply->id]) }}" class="btn btn-info float-right ">Edit</a>
        @endif
      @endif
    </div>

  </div>
  <div class="card-body">
    <p class="my-2 text-justify">{{ $reply->content }}</p>

  </div>
  <div class="card-footer">
    @if($reply->isLikedByAuthUser())
      <a href="{{ route('reply.unlike',['id'=> $reply->id]) }}" class="btn btn-warning btn-sm">Unlike <span class="badge badge-primary" style="font-size: 12px;">{{ $reply->likes->count() }}</span></a>
    @else
      <a href=" {{ route('reply.like',['id'=> $reply->id]) }}" class="btn btn-success btn-sm">Like <span class="badge badge-primary" style="font-size: 12px;">{{ $reply->likes->count() }}</span></a>
    @endif
  </div>

</div>

@endforeach



@endsection

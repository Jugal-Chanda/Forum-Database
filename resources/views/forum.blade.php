@extends('layouts.app')

@section('content')
@if(count($discussions) > 0)
  @foreach($discussions as $discussion)
  <div class="card mb-2">
    <div class="card-header row no-gutters">

      <div class="col-md-1">
          <img src="{{ $discussion->user->avatar }}" alt="" style="width: 44px; height: 44px; border-radius: 50%;">
      </div>
      <div class="col-md-6">
        <span>{{ $discussion->user->name }}</span>&nbsp&nbsp<br>
        <span>{{ $discussion->created_at->diffForHumans() }}</span>

      </div>
      <div class="col-md-5">
        <a href="{{ route('discussion.show',['slug' => $discussion->slug ]) }}" class="btn btn-info btn-sm float-right ml-1">View</a>
        @if($discussion->hasBestReply())
          <span class="btn btn-success btn-sm float-right">Close</span>
        @else
          <span class="btn btn-danger btn-sm float-right">Open</span>
        @endif

      </div>

    </div>
    <div class="card-body">
      <h5 class="bg-light py-2">{{ $discussion->title }}</h5>
      <p class="mt-2 text-justify">{{ Str::limit(strip_tags($discussion->content),200) }}</p>
    </div>
    <div class="card-footer">
      <span>{{ $discussion->replies->count() }} {{ Str::plural('Reply', $discussion->replies->count()) }}</span>
      <a href="{{ route('channel.discussions.show',['slug'=>$discussion->channel->slug]) }}" class="btn btn-primary float-right btn-sm">{{ $discussion->channel->title }}</a>

    </div>

  </div>
  @endforeach
@else

<div class="text-center p-3 bg-light">

  <h4 class="text-secondary">No Discussion Found</h4>

</div>
@endif

<div class="d-flex justify-content-center">

  {{ $discussions->links() }}

</div>

@endsection

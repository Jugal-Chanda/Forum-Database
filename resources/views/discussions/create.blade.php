@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Create new discussion</div>

    <div class="card-body">
      <form class="" action="{{ route('discussion.store') }}" method="post">
        @csrf
        <div class="form-group">

          <label for="">Discussion Title</label>
          <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
          @error('title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

        </div>

        <div class="form-group">

          <label for="">Select a channel</label>
          <select class="form-control" name="channel">
            @foreach($channels as $channel)
            <option value="{{ $channel->id }}">{{ $channel->title }}</option>
            @endforeach


          </select>

        </div>

        <div class="form-group">

          <label for="">Write your question?</label>
          <textarea name="question" rows="8" cols="80" class="form-control  @error('question') is-invalid @enderror" id="question">{{ old('question') }}</textarea>
          @error('question')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

        </div>

        <div class="text-center">

          <button type="submit" name="button" class="btn btn-success">Create new</button>

        </div>

      </form>

    </div>
</div>

@endsection

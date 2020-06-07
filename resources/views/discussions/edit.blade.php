@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Update Discussion: {{ $discussion->title }}</div>

    <div class="card-body">
      <form class="" action="{{ route('discussion.update',['slug'=>$discussion->slug]) }}" method="post">
        @csrf
        <div class="form-group">
          @error('question')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <label for="">Edit your question?</label>
          <textarea name="question" rows="8" cols="80" class="form-control  @error('question') is-invalid @enderror" id="question">{{ $discussion->content }}</textarea>



        </div>

        <div class="text-center">

          <button type="submit" name="button" class="btn btn-success">Update Discussion</button>

        </div>

      </form>

    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Update Reply</div>

    <div class="card-body">
      <form class="" action="{{ route('reply.update',['id' => $reply->id]) }}" method="post">
        @csrf
        <div class="form-group">

          <label for="">Edit your reply</label>
          <textarea name="reply" rows="8" cols="80" class="form-control  @error('reply') is-invalid @enderror" >{{ $reply->content }}</textarea>
          @error('reply')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror


        </div>

        <div class="text-center">

          <button type="submit" name="button" class="btn btn-success">Update reply</button>

        </div>

      </form>

    </div>
</div>

@endsection

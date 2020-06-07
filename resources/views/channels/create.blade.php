@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Create New Channel</div>
    <div class="card-body">

      <form class="" action="{{ route('channels.store') }}" method="post">
        @csrf

        <div class="form-group">
          <label for=""></label>
          <input type="text" name="title"  class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
          @error('title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-group text-center">

          <button type="submit" name="button" class="btn btn-success">Create Channel</button>

        </div>

      </form>
    </div>
</div>

@endsection

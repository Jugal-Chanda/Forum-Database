@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>

          <tbody>
            @foreach($channels as $channel)
            <tr scope="row">
              <td>{{ $channel->title }}</td>
              <td> <a href="{{ route('channels.edit',['channel'=>$channel->id]) }}" class="btn btn-info btn-sm">Edit</a> </td>
              <td>
                <form class="" action="{{ route('channels.destroy',['channel'=>$channel->id])}}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" name="button"  class="btn btn-danger btn-sm">Dstroy</button>

                </form>
              </td>
            </tr>
            @endforeach
          </tbody>

        </table>
    </div>
</div>
@endsection

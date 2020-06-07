@if (count($errors) >0)
  <ul class="" style="list-style: none; padding: 10px 0px;">
    @foreach ($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
    @endforeach
  </ul>
@endif

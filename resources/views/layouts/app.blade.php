<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/styles/default.min.css">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/styles/atom-one-dark-reasonable.min.css">

    @yield('style')


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          <div class="container">

            <div class="row">

              <div class="col-md-4">




                <div class="card">

                  <ul class="list-group">
                    <li class="list-group-item">
                      <a href="{{ route('forum') }}" style="text-decoration: none;">Home</a>
                    </li>
                    <li class="list-group-item">
                      <a href="{{ route('discussion.create') }}" class="" style="text-decoration: none;">Create new discussin</a>
                    </li>
                    <li class="list-group-item">
                      <a href="{{ route('forum') }}?filter=me" style="text-decoration: none;">My Discussions</a>
                    </li>
                    <li class="list-group-item">
                      <a href="{{ route('forum') }}?filter=solved" style="text-decoration: none;">Solved Discussions</a>
                    </li>
                    <li class="list-group-item">
                      <a href="{{ route('forum') }}?filter=unsolved" style="text-decoration: none;">Unsolved Discussions</a>
                    </li>
                  </ul>
                  @if(Auth::check())
                    @if(Auth::user()->admin)
                      <ul class="list-group mt-3">
                        <li class="list-group-item">
                          <a href="{{ route('channels.create') }}" class="" style="text-decoration: none;">Create new channel</a>
                        </li>
                        <li class="list-group-item">
                          <a href="{{ route('channels.index') }}" class="" style="text-decoration: none;">All channel</a>
                        </li>
                      </ul>
                    @endif

                  @endif

                </div>
                <div class="card card-default mt-3">


                    <ul class="list-group">
                      @foreach($channels as $channel)
                        <li class="list-group-item">
                          <a href=" {{ route('channel.discussions.show',['slug'=>$channel->slug]) }}" class="" style="text-decoration: none;">{{ $channel->title }}</a>

                        </li>
                      @endforeach

                    </ul>



                </div>
              </div>
              <div class="col-md-8">
                @yield('content')
              </div>

            </div>

          </div>

        </main>
    </div>
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/highlight.min.js"></script>
    <script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script type="text/javascript">
      @if(Session::has('success'))

        toastr.success('{{ Session::get("success") }}')
      @endif
      @if(Session::has('info'))
        toastr.info('{{ Session::get("info") }}')
      @endif
    </script>

      @yield('script')

</body>
</html>

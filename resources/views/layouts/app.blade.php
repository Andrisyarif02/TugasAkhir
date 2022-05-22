<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
    document.write(unescape('%3c%6c%69%6e%6b%20%72%65%6c%20%3d%20%22%69%63%6f%6e%22%20%68%72%65%66%20%3d%22%69%6d%67%2f%6c%6f%67%6f%2e%70%6e%67%22%20%74%79%70%65%20%3d%20%22%69%6d%61%67%65%2f%70%6e%67%22%3e'));
    </script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Optik Indonesia </title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">


    @stack('style')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark danger-color">
            <div class="container-fluid">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{Route::is('transaction') ? 'active' : ''}}">
                        @can('karyawan')
                        <a class="nav-link font-weight-bolder" href="{{url('transcation')}}">Transaction</a>
                        @endcan
                    </li>
                    <li class="nav-item {{Route::is('products.index') ? 'active' : ''}} ">
                        @can('admin')
                      <a class="nav-link font-weight-bolder" href="{{route('products.index')}}">Products</a>
                        @endcan
                    </li>
                    <li class="nav-item">
                      <a class="nav-link font-weight-bolder" href="{{url('/transcation/history')}}">History</a>
                    </li>
                    <li class="nav-item {{Route::is('/category') ? 'active' : ''}}">
                        @can('admin')
                        <a class="nav-link font-weight-bolder" href="{{url('/category')}}">Category</a>
                        @endcan
                    </li>
                    <li class="nav-item {{Route::is('/user') ? 'active' : ''}}">
                        @can('admin')
                        <a class="nav-link font-weight-bolder" href="{{url('/user')}}">User</a>
                        @endcan
                    </li>
                    
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                        
                        <li class="dropdown dropdown-notification">
                            <a href="" class="dropdown-link new-indicator" data-toggle="dropdown" >
                                <i class="fa fa-bell cursor-pointer"></i>
                                <span>2</span>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header">Notifications</div>

                                <a href="" class="dropdown-item">
                                  <div class="media">
                                    <div class="media-body mg-l-15">
                                      <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                                      <span>Mar 15 12:32pm</span>
                                    </div><!-- media-body -->
                                  </div><!-- media -->
                                </a>
                                
                                <div class="dropdown-footer"><a href="">View all Notifications</a></div>
                              </div><!-- dropdown-menu -->
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
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
            @yield('content')
        </main>

        
    </div>

    
</body>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js">
</script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>


@stack('script')

</html>

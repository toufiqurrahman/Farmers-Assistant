<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Farmer's Assistant</title>

    <!-- Styles -->
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <link rel="shortcut icon" href="/assets/img/logo_navbar.png">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->

                    @if(Auth::guest())
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="/assets/img/logo_navbar.png">
                        </a>
                    @else
                        <a class="navbar-brand" href="{{url('/home')}}">
                            <img src="/assets/img/logo_navbar.png">
                        </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            @if(Auth::user()->role=='farmer')

                                {{--<a href="{{route('home')}}">

                                </a>--}}

                                <li class="dropdown">
                                    <a href="{{route('home')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Task <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{url('/home/post')}}">
                                                Create Post
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{url('/home/discussion')}}">
                                                Discussion Section
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="{{url('/home/communication')}}">Communication</a>
                                </li>

                                <li>
                                    <a href="{{url('/home/message')}}">Demand Posts</a>
                                </li>


                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">

                                        <li>
                                            <a href="{{url('/home/profile')}}">
                                                Profile
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{url('/home/change-password')}}">
                                                Change Password
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{url('/home/my-post')}}">
                                                My Posts
                                            </a>
                                        </li>


                                        <li role="presentation" class="divider"></li>

                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>

                                    </ul>
                                </li>
                            @endif

                                @if(Auth::user()->role=='trader')
                                    <a href="{{route('home')}}">

                                    </a>
                                    <li class="dropdown">
                                        <a href="{{route('home')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            Task <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{url('/home/post')}}">
                                                    Create Post
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li>
                                        <a href="{{url('/home/message')}}">Sale Posts</a>
                                    </li>


                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">

                                            <li>
                                                <a href="{{url('/home/profile')}}">
                                                    Profile
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{url('/home/change-password')}}">
                                                    Change Password
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{url('/home/my-post')}}">
                                                    My Posts
                                                </a>
                                            </li>


                                            <li role="presentation" class="divider"></li>

                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>

                                        </ul>
                                    </li>
                                @endif

                                @if(Auth::user()->role=='expert')
                                    <a href="{{route('home')}}">

                                    </a>
                                    <li class="dropdown">
                                        <a href="{{route('home')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            Task <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">

                                            <li>
                                                <a href="{{url('/home/discussion')}}">
                                                    Discussion Section
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="{{url('/home/communication')}}">Communication</a>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">

                                            <li>
                                                <a href="{{url('/home/profile')}}">
                                                    Profile
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{url('/home/change-password')}}">
                                                    Change Password
                                                </a>
                                            </li>

                                            <li role="presentation" class="divider"></li>

                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>

                                        </ul>
                                    </li>
                                @endif


                            @if(Auth::user()->role=='admin')
                                <a href="{{route('home')}}">

                                </a>
                                <li class="dropdown">
                                    <a href="{{route('home')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Manage Experts <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{url('/home/add_expert')}}">
                                                Add Expert
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{url('/home/delete_expert')}}">
                                                Delete Expert
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="{{route('home')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Manage Interests <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{url('/home/add_interest')}}">
                                                Add Interest
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{url('/home/delete_interest')}}">
                                                Delete Interest
                                            </a>
                                        </li>
                                    </ul>
                                </li>



                                    <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">

                                        <li>
                                            <a href="{{url('/home/profile')}}">
                                                Profile
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{url('/home/change-password')}}">
                                                Change Password
                                            </a>
                                        </li>


                                        <li role="presentation" class="divider"></li>

                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>

                                    </ul>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    @yield('script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>



    {{-- Custom js --}}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    {{-- MDBootstrap JS --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>

</body>
</html>

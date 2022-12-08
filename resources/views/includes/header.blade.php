<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{route('index')}}" class="logo d-flex align-items-center">
            <h1>{{ __('menu.name') }}</h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{route('index')}}" class="@yield('home')">{{ __('menu.home') }}</a></li>
                <li class="dropdown"><a href="#"><span>{{ __('menu.petition') }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach(App\Http\Controllers\DocumentController::petitionList() as $key => $value)
                        <li><a href="{{route('documents.show',$key)}}">{{ \App\Models\Values::find($key)->value}}</a></li>
                        @endforeach
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>{{ __('menu.contract') }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach(App\Http\Controllers\DocumentController::contractList() as $key => $value)
                        <li><a href="{{route('documents.show',$key)}}">{{ \App\Models\Values::find($key)->value}}</a></li>
                        @endforeach
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
                <li><a href="{{route('contact.create')}}">{{ __('menu.contact') }}</a></li>
                @if (Auth::check())
                <li class="dropdown"><a href="#"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">User Menu</a></li>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <li><button class="get-a-quote" href="{{route('logout')}}">{{ __('Logout') }}</button></li>
                </form>
                @else
                <li><a class="get-a-quote" href="{{route('login')}}">{{ __('menu.login') }}</a></li>
                @endif

            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
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
                        <li><a href="{{route('document.categories',$value[0]->id."-".$value[0]->get_sub_cat->value)}}">{{$value[0]->get_sub_cat->value}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>{{ __('menu.contract') }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach(App\Http\Controllers\DocumentController::contractList() as $key => $value)
                        <li><a href="{{route('document.categories',$value[0]->id."-".$value[0]->get_sub_cat->value)}}">{{$value[0]->get_sub_cat->value}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('iletisim.create')}}">{{ __('menu.contact') }}</a></li>
                @include('includes.menu')
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
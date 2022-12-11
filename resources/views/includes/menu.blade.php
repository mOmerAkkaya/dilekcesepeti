@if (Auth::check())
<li class="dropdown"><a href="#"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
    <ul>
        @if (Auth::user()->is_admin == 1)
        <li><a href="{{route('panel.index')}}">{{ __('user.adminpanel') }}</a></li>
        @else
        <li><a href="{{route('user.index')}}">{{ __('user.userpanel') }}</a></li>
        @endif
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
    <li><button class="get-a-quote" href="{{route('logout')}}">{{ __('Çıkış Yap') }}</button></li>
</form>
@else
<li><a class="get-a-quote" href="{{route('login')}}">{{ __('menu.login') }}</a></li>
@endif
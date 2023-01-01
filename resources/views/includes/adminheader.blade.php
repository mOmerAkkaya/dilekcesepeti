@php
$notifications = \App\Models\Notification::where('is_read',0)->orderBy('id','desc')->get();
@endphp
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="{{route('panel.index')}}" class="logo d-flex align-items-center">
      <span class="d-none d-lg-block">Dilekçe Sepeti</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
  </div><!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-primary badge-number">{{count($notifications)}}</span>
        </a><!-- End Notification Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            Okunmayan <b>{{count($notifications)}}</b> bildirim var!
            <a href="{{route('panel.notifications.index')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">Tümünü Gör</span></a>
          </li>
          @php $i=0; @endphp
          @foreach($notifications as $key => $value)
          @php
          if($i==5){
          break;
          }
          $i=$i+1;
          @endphp
          <li>
            <hr class="dropdown-divider">
          </li>
          <li class="notification-item">
            <i class="bi bi-exclamation-circle text-warning"></i>
            <div>
              <h4>{{$value->title}}</h4>
              <p>{{$value->value}}</p>
              <p>{{$value->created_at}}</p>
            </div>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          @endforeach
        </ul><!-- End Notification Dropdown Items -->

      </li><!-- End Notification Nav -->

      <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-left-text"></i>
          <span class="badge bg-success badge-number">3</span>
        </a><!-- End Messages Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          <li class="dropdown-header">
            You have 3 new messages
            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="message-item">
            <a href="#">
              <img src="{{ asset('assets/img/messages-1.jpg')}}" alt="" class="rounded-circle">
              <div>
                <h4>Maria Hudson</h4>
                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                <p>4 hrs. ago</p>
              </div>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="message-item">
            <a href="#">
              <img src="{{ asset('assets/img/messages-2.jpg')}}" alt="" class="rounded-circle">
              <div>
                <h4>Anna Nelson</h4>
                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                <p>6 hrs. ago</p>
              </div>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="message-item">
            <a href="#">
              <img src="{{ asset('assets/img/messages-3.jpg')}}" alt="" class="rounded-circle">
              <div>
                <h4>David Muldon</h4>
                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                <p>8 hrs. ago</p>
              </div>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="dropdown-footer">
            <a href="#">Show all messages</a>
          </li>

        </ul><!-- End Messages Dropdown Items -->

      </li><!-- End Messages Nav -->

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>Kevin Anderson</h6>
            <span>Web Designer</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
              <i class="bi bi-gear"></i>
              <span>Account Settings</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{route('cache')}}">
              <i class="bi bi-question-circle"></i>
              <span>Önbellik Temizle</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{route('panel.truncate')}}">
              <i class="bi bi-question-circle"></i>
              <span>DB'yi Temizle</span>
            </a>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>{{ __('Çıkış Yap') }}</span>
              </button>
            </form>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link @yield('panel.index','collapsed')" href="{{route('panel.index')}}">
        <i class="bi bi-grid"></i>
        <span>{{ __('panel.dashboard') }}</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link @yield('panel.orders.index','collapsed')" href="{{route('panel.orders.index')}}">
        <i class="ri-shopping-basket-2-fill"></i>
        <span>{{ __('panel.orders') }}</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-heading">{{ __('panel.pages') }}</li>

    <li class="nav-item">
      <a class="nav-link @yield('panel.documents.index','collapsed')" href="{{route('panel.documentpanel.index')}}">
        <i class="bi bi-file-earmark"></i>
        <span>{{ __('panel.documents') }}</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link @yield('panel.improve','collapsed')" href="{{route('panel.improve')}}">
        <i class="bi bi-question-circle"></i>
        <span>{{ __('panel.improve') }}</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->

    <li class="nav-item">
      <a class="nav-link @yield('panel.contact.index','collapsed')" href=" {{route('panel.contacts.index')}}">
        <i class="bi bi-envelope"></i>
        <span>{{ __('panel.contact') }}</span>
      </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
      <a class="nav-link @yield('panel.notifications.index','collapsed')" href="{{route('panel.notifications.index')}}">
        <i class="ri-notification-2-fill"></i>
        <span>{{ __('panel.notification') }}</span>
      </a>
    </li><!-- End Register Page Nav -->

    <li class="nav-item">
      <a class="nav-link @yield('panel.contents.index','collapsed')" href="{{route('panel.contents.index')}}">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>{{ __('panel.contents') }}</span>
      </a>
    </li><!-- End Login Page Nav -->

    <li class="nav-item">
      <a class="nav-link @yield('panel.comments.index','collapsed')" href="{{route('panel.comments.index')}}">
        <i class=" ri-question-answer-line"></i>
        <span>{{ __('panel.comments') }}</span>
      </a>
    </li><!-- End Error 404 Page Nav -->

    <li class="nav-item">
      <a class="nav-link @yield('panel.members.index','collapsed')" href="{{route('panel.members.index')}}">
        <i class=" ri-file-user-fill"></i>
        <span>{{ __('panel.members') }}</span>
      </a>
    </li><!-- End Blank Page Nav -->

  </ul>

</aside><!-- End Sidebar-->
  @extends('layouts.app')
  @section('contact','active')
  @section('content')
  <main id="main">

      <!-- ======= Breadcrumbs ======= -->
      <div class="breadcrumbs">
          <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
              <div class="container position-relative">
                  <div class="row d-flex justify-content-center">
                      <div class="col-lg-6 text-center">
                          <h2>{!! $page->title !!}</h2>
                          <p>{!! $page->description !!}</p>
                      </div>
                  </div>
              </div>
          </div>
          <nav>
              <div class="container">
                  <ol>
                      <li><a href="{{route('index')}}">{{ __('menu.home') }}</a></li>
                      <li>{!! $page->title !!}</li>
                  </ol>
              </div>
          </nav>
      </div><!-- End Breadcrumbs -->

      <section class="sample-page">
          <div class="container" data-aos="fade-up">
              <p>
                  {!! $page->content !!}
              </p>
          </div>
      </section>

  </main><!-- End #main -->
  @endsection
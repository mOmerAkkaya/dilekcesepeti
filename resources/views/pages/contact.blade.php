@extends('layouts.app')
@section('contact','active')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('../img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>{{ __('pages/contact.title') }}</h2>
                        <p>{{ __('pages/contact.titleSub') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{route('index')}}">{{ __('menu.home') }}</a></li>
                    <li>{{ __('menu.contact') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4 mt-4">

                <div class="col-lg-4">

                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>{{ __('pages/contact.adress') }}</h4>
                            <p>Kurtköy Mah. Ankara Cad. Pendik P.K. 34912 İstanbul</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>{{ __('pages/contact.email') }}</h4>
                            <p>bilgi@dilekcesepeti.com.tr</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>{{ __('pages/contact.callnow') }}</h4>
                            <p><a href="tel:+905324972238">+90 532 497 22 38</a></p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="col-lg-8">
                    <form action="{{route('contact.store')}}" method="post" class="php-email-form">
                        @csrf
                        <input type="hidden" name="type" value="PageContactForm" />
                        <input type="hidden" name="secretCaptcha" value="@php $captcha = rand(1,10); $captcha2 = rand(1,10); echo $code = $captcha + $captcha2; @endphp" />
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="Name" placeholder="@Lang('pages/contact.name')">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="@Lang('pages/contact.email')">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="gsm" id="Gsm" placeholder="@Lang('pages/contact.gsm')">
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="@Lang('pages/contact.message')"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" id="Captcha" name="captcha" placeholder="{{$captcha . ' + ' . $captcha2}}">
                        </div>
                        <div class="form-group mt-3">
                            <center><button type="submit">{{ __('pages/contact.submit') }}</button></center>
                        </div>
                        <div class="form-group mt-3">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(session()->has('message'))
                            <div class="alert alert-success" style="width: 500px;position: relative; margin: auto;">
                                {{ session()->get('message') }}
                            </div>
                            @endif
                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection
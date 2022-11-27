@extends('layouts.app')
@section('home','active')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>{{$query}} {{ __('menu.resultfor') }}</h2>
                        <p>{{ __('menu.total') }} {{$data->count()}}</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{route('index')}}">{{ __('menu.home') }}</a></li>
                    <li>{{ __('menu.result') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
        <div class="container" data-aos="fade-up">
            <p>
            <div class="list-group">
                @foreach ($data as $key => $value)
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$value->name}}</h5>
                        <small>Süre 1 dk.</small>
                    </div>
                    <p class="mb-1">{{$value->description}}</p>
                    <small>{{$value->cat}}</small>
                </a>
                @endforeach
            </div>
            </p>
        </div>
    </section>

</main><!-- End #main -->
@endsection
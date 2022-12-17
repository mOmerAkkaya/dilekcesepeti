@extends('layouts.app')
@section('searchresult','active')
@section('title', @$query . ' '. __('menu.resultfor'))
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('{{asset('/img/page-header.jpg')}}');">
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
                @if(count($data))
            <div class="list-group">
                @foreach ($data as $key => $value)
                <a href="{{route('dokuman.show',[$value->slug])}}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{!! $value->name !!}</h5>
                        <small class="text-muted">Süre {{$value->time}} dk.</small>
                    </div>
                    <p class="mb-1">{{strip_tags($value->description) }}</p>
                    <small class="text-muted">{{$value->get_doc_type->value}} - {{$value->get_sub_doc_type->value}} - {{$value->get_cat->value}} - {{$value->get_sub_cat->value}}</small>
                    <small class="text-muted" style="float: right;">Evrak Ücreti {{$value->price}} ₺</small>
                </a>
                <br />
                @endforeach
            </div>
            @else
            <div class="alert alert-dark text-center fs-3 text shadow-lg p-3 mb-5 rounded" role="alert">
                {{ __('menu.notfound') }}
            </div>
            @endif
            </p>
            {{ $data->links() }}


        </div>
    </section>

</main><!-- End #main -->
@endsection
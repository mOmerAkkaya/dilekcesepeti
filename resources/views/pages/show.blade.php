@extends('layouts.app')
@section('title', 'Döküman Oluşturma - '. $data->name)
@section('panel.index', '')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>{!! $data->name !!}</h2>
                        <p>{!! $data->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="{{route('index')}}">{{ __('menu.home') }}</a></li>
                    <li>{{ __('menu.create') }}</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Service Details Section ======= -->
    <section id="service-details" class="service-details">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="services-list">
                        @foreach(json_decode($data->steps) as $key => $value)
                        <a href="#" class="active">{{$value->label}}</a>
                        @endforeach
                    </div>

                    <h4>Döküman Hakkında Bilgi</h4>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Süre {!!$data->time!!} dk.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Yorum {!!$data->time!!} dk.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>İşlem Sayısı {!!$data->time!!} dk.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>{!!$data->law!!}</span></li>
                    </ul>
                    <p></p>
                </div>

                <div class="col-lg-8">
                    <div class="services-list">
                        <p>
                        <form action="{{route('dokuman.update',[$data->slug])}}" method="post">
                            @csrf
                            <input type="hidden" name="slug" value="{{$data->slug}}" />
                            @method('put')
                            @foreach(json_decode($data->steps) as $key => $value)
                            <label for="{{$value->name}}">{{$value->label}}:</label>
                            <input type="text" id="{{$value->name}}" name="{{$value->name}}"><br><br>
                            @endforeach
                            <button type="submit" id="submit" name="submit">submit</button>

                        </form>
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Service Details Section -->

</main><!-- End #main -->

@endsection
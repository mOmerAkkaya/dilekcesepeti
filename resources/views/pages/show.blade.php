@extends('layouts.app')
@section('title', 'Döküman Oluşturma - '. $data->name)
@section('panel.index', '')
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@if (Auth::check())
@else
<script>
    $(document).ready(function() {
        $("#staticBackdrop").modal('show');
    });
</script>
@endif
@endsection
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('../img/page-header.jpg');">
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
@if (Auth::check())
@else
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{!!$data->name!!}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bu dökümanı doldurmak için lütfen giriş yapınız</p>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">E-Posta</label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="email" name="email" placeholder="email@example.com">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Şifre</label>
                        <div class="col-sm-10">
                            <input type="password" autocomplete="off" required class="form-control" id="password" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('register')}}"><button type="button" class="btn btn-secondary">Yeni Üye Kaydı</button></a>
                    <button type="submit" class="btn btn-primary">Giriş Yap</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection

@section('js')

@endsection
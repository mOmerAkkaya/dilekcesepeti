@extends('layouts.app')
@section('title', 'Döküman Oluşturma - '. $data->name)
@section('panel.index', '')
@section('css')
<style>
    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }

    page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
        padding: 5%;
    }

    @media print {

        body,
        page {
            margin: 0;
            box-shadow: 0;
        }
    }

    .watermark {
        /* Used to position the watermark */
        position: relative;
        filter: blur(1px);
    }

    .watermark__inner {
        /* Center the content */
        align-items: center;
        display: flex;
        justify-content: center;

        /* Absolute position */
        left: 0px;
        position: absolute;
        top: 0px;

        /* Take full size */
        height: 100%;
        width: 100%;
    }

    .watermark__body {
        /* Text color */
        color: rgba(0, 0, 0, 0.2);

        /* Text styles */
        font-size: 3rem;
        font-weight: bold;
        text-transform: uppercase;

        /* Rotate the text */
        transform: rotate(-45deg);

        /* Disable the selection */
        user-select: none;
    }
</style>
@endsection
@section('content')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('../img/page-header-finish.jpg');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>{{ __('menu.created') }}</h2>
                    <p>{{ __('menu.createdsub') }}</p>
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

<section class="sample-page">
    <div class="container" data-aos="fade-up">
        <div class="watermark">
            <!-- Watermark container -->
            <div class="watermark__inner">
                <!-- The watermark -->
                <div class="watermark__body">
                    <center>DİLEKÇE SEPETİ<br>dilekcesepeti.com.tr</center>
                </div>
            </div>
            <page size="A4">{!! $data->template !!}</page>
        </div>
    </div>

    </div>
</section>

</main><!-- End #main -->

@endsection
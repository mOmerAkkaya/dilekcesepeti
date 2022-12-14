@extends('layouts.app')
@section('title', 'Döküman Oluşturma - '. $data->name)
@section('panel.index', '')
@section('css')
<style>
    body {
        background: rgb(204, 204, 204);
    }

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
</style>
@endsection
@section('content')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('../img/page-header.jpg');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Sample Inner Page</h2>
                    <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
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
        <page size="A4">{!! $data->template !!}</page>
    </div>
</section>

</main><!-- End #main -->

@endsection
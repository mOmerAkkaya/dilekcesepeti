@extends('layouts.app')
@section('title', 'İşlem Tamamlandı')
@section('panel.index', '')
@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
</style>
@endsection
@section('content')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('../img/page-header-finish.jpg');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>{{ __('menu.success') }}</h2>
                    <p>{!! $order->document_name !!}</p>
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
                    <h4>Döküman Hakkında Bilgi</h4>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Ortalama Süre : <b></b> dk.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Toplam Yorum : <b></b></span></li>
                        <li><i class="bi bi-check-circle"></i> <span>İşlem Sayısı : <b></b></span></li>
                        <li><i class="bi bi-check-circle"></i> <span></span></li>
                    </ul>
                </div>
                <p>
                    <button type="button" class="btn btn-secondary" disabled>Mail Gönder</button>
                    <button type="button" onclick="convertHTMLToPDF()" class="btn btn-warning">PDF İndir</button>
                    <button type="button" class="btn btn-dark" disabled>Yazdır</button>
                </p>
                <p>
                <div class="card">
                    <div class="card-body">
                        {{$order->user_name}}
                    </div>
                </div>
                </p>
            </div>

            <div class="col-lg-8" id="content">
                <div class="services-list">
                    <page size="A4">{!! $decoded !!}</page>
                </div>

            </div>

        </div>

    </div>
</section><!-- End Service Details Section -->
</main><!-- End #main -->
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script>
    function convertHTMLToPDF() {
        const {
            jsPDF
        } = window.jspdf;

        var doc = new jsPDF('p', 'mm', [1200, 1810]);
        var pdfjs = document.querySelector('#content');

        doc.html(pdfjs, {
            callback: function(doc) {
                doc.save("{{$order->document_name}}");
            }
        });
    }
</script>
@endsection
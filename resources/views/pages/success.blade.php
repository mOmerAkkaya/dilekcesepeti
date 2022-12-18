@extends('layouts.app')
@section('title', 'İşlem Tamamlandı')
@section('panel.index', '')
@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
    <div class="page-header d-flex align-items-center" style="background-image: url('{{asset('img/page-header-success.jpg')}}');">
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
                    <button type="button" onclick="mail()"  class="btn btn-secondary">Mail Gönder</button>
                    <button type="button" onclick="convertHTMLToPDF()" class="btn btn-warning">PDF İndir</button>
                    <button type="button" class="btn btn-dark" onclick="printDiv('content')">Yazdır</button>
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
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Dilekçe Sepeti</strong>
            <small>dilekcesepeti.com.tr</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            İşlem Başarılı
        </div>
    </div>
</div>
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
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl)
        })
        toastList.forEach(toast => toast.show())
    }

    function mail() {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl)
        })
        toastList.forEach(toast => toast.show())
    }
</script>
<script>
    function printDiv(elem) {
        var mywindow = window.open();
        var content = document.getElementById(elem).innerHTML;
        var realContent = document.body.innerHTML;
        mywindow.document.write(content);
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/
        mywindow.print();
        document.body.innerHTML = realContent;
        mywindow.close();
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl)
        })
        toastList.forEach(toast => toast.show())
        return true;
    }
</script>
@endsection
@extends('layouts.admin')
@section('title', 'Siparişler')
@section('panel.orders.index', '')
@section('css')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>{{ __('panel.orders') }}</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <p>
                        <table data-order='[[ 0, "desc" ]]' id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>UserID</th>
                                    <th>Adı Soyadı</th>
                                    <th>Döküman Adı</th>
                                    <th>Ücret</th>
                                    <th>Ödeme Durumu</th>
                                    <th>Oluşturulma Tarihi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->user_id}}</td>
                                    <td>{{$value->user_name}}</td>
                                    <td>{{$value->document->name}}</td>
                                    <td>{{$value->price}} ₺</td>
                                    <td>
                                        @if ($value->pay==0)
                                        <button type="button" class="btn btn-warning"><i class="bi bi-exclamation-triangle"></i></button>
                                        @else
                                        <button type="button" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
                                        @endif
                                    </td>
                                    <td>{{$value->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
@section('js')
<script type=" text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $('#table_id').dataTable({});
</script>
@endsection
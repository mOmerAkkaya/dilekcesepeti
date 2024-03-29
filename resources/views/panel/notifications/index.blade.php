@extends('layouts.admin')
@section('title', 'Bildirimler')
@section('panel.notifications.index', '')
@section('css')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>{{ __('panel.notification') }}</h1>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" @isset($_GET['all']) checked @endif disabled id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault"><a href="{{route('panel.notifications.index','all')}}">Tüm Bildirimler</a></label>
        </div>
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
                                    <th>Başlık</th>
                                    <th>İçerik</th>
                                    <th>Okunma Durumu</th>
                                    <th>Oluşturulma Tarihi</th>
                                    <th>Okunma Tarihi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                <tr>
                                    <td>
                                        @if($value->is_read!=0)
                                        {{$value->id}}
                                        @else
                                        <form method="post" action="{{route('panel.notifications.update',[$value->id])}}">@csrf @method('put')<button type="submit" class="btn btn-primary btn-sm">{{$value->id}}</button></form>
                                        @endif
                                    </td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->value}}</td>
                                    <td>
                                        @if ($value->is_read==0)
                                        <button type="button" class="btn btn-warning"><i class="bi bi-exclamation-triangle"></i></button>
                                        @else
                                        <button type="button" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
                                        @endif
                                    </td>
                                    <td>{{$value->created_at}}</td>
                                    <td>@if($value->created_at!=$value->updated_at){{$value->updated_at}}@endif</td>
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
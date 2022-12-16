@extends('layouts.admin')
@section('title', 'İçerikler')
@section('panel.contents.index', '')
@section('css')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>{{ __('panel.contents') }}</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <a href="{{route('panel.contents.create')}}">
                            <h5 class="card-title">Yeni İçerik</h5>
                        </a>
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
                                    <th>Slug</th>
                                    <th>Başlık</th>
                                    <th>Açıklama</th>
                                    <th>Index</th>
                                    <th>Oluşturulma Tarihi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                <tr>
                                    <th><a href="{{route('panel.contents.show',[$value->id])}}">{{$value->id}}</a></th>
                                    <td>{{$value->slug}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->description}}</td>
                                    <td>{{$value->no_index}}</td>
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
@extends('layouts.admin')
@section('title', 'Dökümanlar')
@section('panel.documents.index', '')
@section('css')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dökümanlar</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <a href="{{route('panel.documentpanel.create')}}">
                            <h5 class=" card-title">Yeni Döküman</h5>
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
                                    <th>Doc T.</th>
                                    <th>Type</th>
                                    <th>Cat</th>
                                    <th>Sub Cat</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Sil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                <tr>
                                    <th><a href="{{route('panel.documentpanel.show',[$value->id])}}">{{$value->id}}</a></th>
                                    <td>{{$value->get_doc_type->value}}</td>
                                    <td>{{$value->get_type->value}}</td>
                                    <td>{{$value->get_cat->value}}</td>
                                    <td>{{$value->get_sub_cat->value}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{!!strip_tags($value->description)!!}</td>
                                    <td>{{$value->price}} ₺</td>
                                    <td>
                                        <form method="post" action="{{route('panel.documentpanel.show',[$value->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                                        </form>
                                    </td>
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
    $('#table_id').dataTable({

    });
</script>
@endsection
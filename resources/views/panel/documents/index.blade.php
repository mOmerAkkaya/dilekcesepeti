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
                        <a href="{{route('panel.documents.create')}}">
                            <h5 class=" card-title">Yeni Döküman</h5>
                        </a>
                        <p>
                        <table data-order='[[ 1, "asc" ]]'  id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Doc Type</th>
                                    <th>Sub Doc Type</th>
                                    <th>Type</th>
                                    <th>Cat</th>
                                    <th>Sub Cat</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                <tr>
                                    <th><a href="{{route('panel.documents.show',[$value->id])}}">{{$value->id}}</a></th>
                                    <td>{{$value->get_doc_type->value}}</td>
                                    <td>{{$value->get_sub_doc_type->value}}</td>
                                    <td>{{$value->get_type->value}}</td>
                                    <td>{{$value->get_cat->value}}</td>
                                    <td>{{$value->get_sub_cat->value}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->description}}</td>
                                    <td>{{$value->price}} ₺</td>
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
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
@endsection
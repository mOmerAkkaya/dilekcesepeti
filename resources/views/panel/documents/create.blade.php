@extends('layouts.admin')
@section('title', 'Dökümanlar')
@section('panel.documents.index', '')
@section('css')
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
                        <form action="{{route('panel.documents.store')}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <!-- Default Accordion -->
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Doc Type
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Döküman Türü</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" name="doc_type" aria-label=" Default select example" required>
                                                        <option value="" disabled selected>Lütfen Seçiniz</option>
                                                        @foreach($doc_type as $key => $value)
                                                        <option value="{{$value->id}}">{{$value->value}} {{$value->id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Sub Doc Type
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Alt Döküman Türü</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" name="sub_doc_type" aria-label="Default select example" required>
                                                        <option value="" disabled selected>Lütfen Seçiniz</option>
                                                        @foreach($sub_doc_type as $key => $value)
                                                        <option value="{{$value->id}}">{{$value->value}} {{$value->id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Type
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Sektör</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" name="type" aria-label="Default select example" required>
                                                        <option value="" disabled selected>Lütfen Seçiniz</option>
                                                        @foreach($type as $key => $value)
                                                        <option value="{{$value->id}}">{{$value->value}} {{$value->id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Cat
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Kategori</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" name="cat" aria-label="Default select example" required>
                                                        <option value="" disabled selected>Lütfen Seçiniz</option>
                                                        @foreach($cat as $key => $value)
                                                        <option value="{{$value->id}}">{{$value->value}} {{$value->id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Sub Cat
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Alt Kategori</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" name="sub_cat" aria-label="Default select example">
                                                        <option value="" disabled selected>Lütfen Seçiniz</option>
                                                        @foreach($sub_cat as $key => $value)
                                                        <option value="{{$value->id}}">{{$value->value}} {{$value->id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            Name & Description
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Adı</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Açıklaması</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="description" style="height: 100px" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSeven">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                            Another
                                        </button>
                                    </h2>
                                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Hukuk</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="law" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Süre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="time" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Ücret</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="price" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputNumber" class="col-sm-2 col-form-label">Şablon Dosyası</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="file" name="file" id="formFile">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Default Accordion Example -->
                            <p></p>
                            <p><button type="submit" class="btn btn-primary">Ekle</button></p>
                        </form>
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
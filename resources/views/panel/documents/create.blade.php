@extends('layouts.admin')
@section('title', 'Dökümanlar')
@section('panel.documents.index', '')
@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
                        <p>
                        <form action="{{route('panel.documentpanel.store')}}" method="POST" enctype="multipart/form-data">

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
                                                        <option value="{{$value->id}}">{{$value->value}}</option>
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
                                                        <option value="{{$value->id}}">{{$value->value}}</option>
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
                                                        <option value="{{$value->id}}">{{$value->value}}</option>
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
                                                        <option value="{{$value->id}}">{{$value->value}}</option>
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
                                                        <option value="{{$value->id}}">{{$value->value}}</option>
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
                                                <label for="time" class="col-sm-2 col-form-label">Süre</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">dk.</span>
                                                        <input required type="text" class="form-control" name="time" placeholder="15" aria-label="time" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="price" class="col-sm-2 col-form-label">Ücret</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">₺</span>
                                                        <input required type="text" class="form-control" name="price" placeholder="150" aria-label="price" aria-describedby="basic-addon1">
                                                    </div>
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
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingEight">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                            Steps
                                        </button>
                                    </h2>
                                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col">
                                                    <table id="steps" class="ui celled table" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Type</th>
                                                                <th>Name</th>
                                                                <th>Label</th>
                                                                <th>Description</th>
                                                                <th>Def</th>
                                                                <th>Edit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr id="Steps">
                                                                <td><input placeholder="text, date vs." required type="text" name="StepType[]" value="text" class="form-control"></td>
                                                                <td><input placeholder="değişken adı" required type="text" name="StepName[]" value="{baslik}" class="form-control"></td>
                                                                <td><input placeholder="değişken etiketi" required type="text" name="StepLabel[]" value="{baslik}" class="form-control"></td>
                                                                <td><input placeholder="değişken açıklaması" required type="text" name="StepDescription[]" value="{baslik}" class="form-control"></td>
                                                                <td><input type="checkbox" name="required[]" value="yes"><label for="required[]">(Z)</label></td>
                                                                <td><input type="button" id="newrow" class="btn btn-success btn-sm" value="+"><input type="button" onclick="deleted()" class="btn btn-danger btn-sm" value="x"></td>
                                                            </tr>
                                                </div>
                                            </div>
                                            </tbody>
                                            </table>
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
<script>
    function deleted(area) {
        var el = document.getElementById(area);
        el.parentNode.removeChild(el);
    }
    $("#newrow").click(function() {
        $('#steps').append('<tr><td><input type="text" name="StepType[]" class="form-control"></td><td><input type="text" name="StepName[]" class="form-control"></td><td><input type="text" name="StepLabel[]" class="form-control"></td><td><input type="text" name="StepDescription[]" class="form-control"></td><td><input type="checkbox" name="required[]" value="yes"><label for="required[]">(Z)</label></td><td><input type="button" onclick="deleted(this)" class="btn btn-danger btn-sm" value="x"></td></tr>');
    });
</script>
@endsection
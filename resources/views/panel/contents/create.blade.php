@extends('layouts.admin')
@section('title', 'İçerik')
@section('panel.contents.index', '')
@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>İçerik</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <a href="{{route('panel.contents.create')}}">
                            <h5 class=" card-title">Yeni Döküman</h5>
                        </a>
                        <p>
                        <form action="{{route('panel.contents.store')}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <!-- Default Accordion -->
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Title
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Adı</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="title" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Description
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Açıklama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="description" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Content
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Adı</label>
                                                <div class="col-sm-10">
                                                    <textarea name="content"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Index
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-2 col-form-label">Adı</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="no_index" class="form-control" required>
                                                </div>
                                            </div>
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
        $('#steps').append('<tr><td><input type="text" name="StepType[]" class="form-control"></td><td><input type="text" name="StepName[]" class="form-control"></td><td><input type="text" name="StepLabel[]" class="form-control"></td><td><input type="text" name="StepDescription[]" class="form-control"></td><td><input type="button" onclick="deleted(this)" class="btn btn-danger btn-sm" value="x"></td></tr>');
    });
</script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss code',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | code',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ]
    });
</script>
@endsection
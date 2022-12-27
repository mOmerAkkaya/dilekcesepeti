@extends('layouts.app')
@section('title', $data->name)
@section('panel.index', '')
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@if (Auth::check())
@else
<script>
    $(document).ready(function() {
        $("#staticBackdrop").modal('show');
    });
</script>
@endif
<link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
@endsection
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('{{asset('/img/page-header.jpg')}}');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>{!! $data->name !!}</h2>
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


            <div class="col">
                <div class="services-list">
                    <form action="{{route('dokuman.update',[$data->slug])}}" method="post">
                        @csrf
                        <input type="hidden" name="slug" value="{{$data->slug}}" />
                        @method('put')
                        <!-- SmartWizard html -->
                        <div id="smartwizard">
                            <ul class="nav">
                                @foreach(json_decode($data->steps) as $key => $value)
                                <li class="nav-item">
                                    <a class="nav-link" href="#step-{{$key+1}}">
                                        <div class="num">{{$key+1}}</div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>

                            <div class="tab-content">
                                @foreach(json_decode($data->steps) as $key => $value)
                                <div id="step-{{$key+1}}" class="tab-pane" role="tabpanel" aria-labelledby="step-{{$key+1}}">
                                    {{$value->description}}
                                    <hr>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text" id="inputGroup-sizing-lg">{{$value->label}}</span>
                                        @if($value->type=="textarea")
                                        <textarea @if(@$value->required=="yes") required @endif name="{{$value->name}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"></textarea>
                                        @else
                                        <input @if(@$value->required=="yes") required @endif type="{{$value->type}}" name="{{$value->name}}" class=" form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- Include optional progressbar HTML -->
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <h5 class="card-header">Döküman Özellikleri</h5>
                    <div class="card-body">
                        <h5 class="card-title">{!! $data->name !!}</h5>
                        <p class="card-text">{!! $data->description !!}</p>
                    </div>
                </div>
            </div>


        </div>
    </section><!-- End Service Details Section -->

</main><!-- End #main -->
@if (Auth::check())
@else
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{!!$data->name!!}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bu dökümanı doldurmak için lütfen giriş yapınız</p>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">E-Posta</label>
                        <div class="col-sm-10">
                            <input type="text" required class="form-control" id="email" name="email" placeholder="email@example.com">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Şifre</label>
                        <div class="col-sm-10">
                            <input type="password" autocomplete="off" required class="form-control" id="password" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('register')}}"><button type="button" class="btn btn-secondary">Yeni Üye Kaydı</button></a>
                    <button type="submit" class="btn btn-primary">Giriş Yap</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection

@section('js')
<script>
    $('#smartwizard').smartWizard({
        selected: 0, // Initial selected step, 0 = first step
        theme: 'default', // theme for the wizard, related css need to include for other than default theme
        justified: true, // Nav menu justification. true/false
        autoAdjustHeight: true, // Automatically adjust content height
        backButtonSupport: true, // Enable the back button support
        enableUrlHash: true, // Enable selection of the step based on url hash
        transition: {
            animation: 'none', // Animation effect on navigation, none|fade|slideHorizontal|slideVertical|slideSwing|css(Animation CSS class also need to specify)
            speed: '400', // Animation speed. Not used if animation is 'css'
            easing: '', // Animation easing. Not supported without a jQuery easing plugin. Not used if animation is 'css'
            prefixCss: '', // Only used if animation is 'css'. Animation CSS prefix
            fwdShowCss: '', // Only used if animation is 'css'. Step show Animation CSS on forward direction
            fwdHideCss: '', // Only used if animation is 'css'. Step hide Animation CSS on forward direction
            bckShowCss: '', // Only used if animation is 'css'. Step show Animation CSS on backward direction
            bckHideCss: '', // Only used if animation is 'css'. Step hide Animation CSS on backward direction
        },
        toolbar: {
            position: 'bottom', // none|top|bottom|both
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            extraHtml: '@if (Auth::check())<button type="submit" class="btn btn-success" onclick="onFinish()">Bitir</button>@else Lütfen Giriş Yapınız @endif'
        },
        anchor: {
            enableNavigation: true, // Enable/Disable anchor navigation 
            enableNavigationAlways: false, // Activates all anchors clickable always
            enableDoneState: true, // Add done state on visited steps
            markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
            unDoneOnBackNavigation: false, // While navigate back, done state will be cleared
            enableDoneStateNavigation: true // Enable/Disable the done state navigation
        },
        keyboard: {
            keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
            keyLeft: [37], // Left key code
            keyRight: [39] // Right key code
        },
        lang: { // Language variables for button
            next: 'İleri',
            previous: 'Geri'
        },
        disabledSteps: [], // Array Steps disabled
        errorSteps: [], // Array Steps error
        warningSteps: [], // Array Steps warning
        hiddenSteps: [], // Hidden steps
        getContent: null // Callback function for content loading
    });
</script>
@endsection
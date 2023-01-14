<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Üye Kaydı Dilekçe Sepeti | dilekcesepeti.com.tr">
    <meta name="author" content="Dilekçe Sepeti | dilekcesepeti.com.tr">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link href="{{asset('img/favicon.ico')}}" rel="icon">
    <link rel="canonical" href="{{url()->full()}}" />

    <title>Kaydol - Dilekçe Sepeti</title>

    <link href="{{asset('admin/css/app.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <center><a href="{{ route('home') }}"><img style=" width: 30%;" src="http://dilekcesepeti.com.tr/img/dilekce.jpg" /></a></center>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <input class="form-control form-control-lg" type="text" name="name" placeholder="Adınız ve Soyadınız" />
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-lg" type="email" name="email" placeholder="E-Posta Adresiniz" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-lg" type="tel" name="gsm" placeholder="Telefon Numaranız" />
                                            @error('gsm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Şifreniz" />
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Tekrar Şifreniz" />
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Kaydol</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{asset('admin/js/app.js')}}"></script>

</body>

</html>
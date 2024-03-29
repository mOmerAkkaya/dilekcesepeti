<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Giriş | Dilekçe Sepeti | dilekcesepeti.com.tr">
    <meta name="author" content="Pendik Yazılım">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{asset('admin/img/icons/icon-48x48.png')}}" />

    <link rel="canonical" href="{{url()->full()}}" />

    <title>Giriş | Dilekçe Sepeti | dilekcesepeti.com.tr</title>

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
                                    <div class="text-center">
                                        <img src="{{asset('img/dilekce.jpg')}}" alt="Dilekçe Sepeti" class="img-fluid" width="132" height="132" />
                                    </div>
                                    <form action="{{route('login')}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">E-Posta</label>
                                            <input class="form-control form-control-lg" type="email" name="email" placeholder="E-Posta Adresiniz" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Şifreniz</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Şifrenizi Giriniz" />
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small>
                                                <a href="{{ route('register') }}">Şifremi unuttum</a>
                                            </small>
                                        </div>
                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                                                <span class="form-check-label">Beni hatırla</span>
                                            </label>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Giriş Yap</button>
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
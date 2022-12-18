<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>@yield('title', $page->title) - Dilekçe Sepeti</title>
<meta name="description" content="@yield('title', $page->description) - Dilekçe Sepeti">

@if ($page->no_index=="yes")
<meta name="robots" content="noindex">
@endif

<link href="{{asset('img/favicon.ico')}}" rel="icon">
<link rel="canonical" href="{{url()->full()}}" />
@yield("css")
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
<link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
<link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
<link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
<link href="{{asset('css/main.css')}}" rel="stylesheet">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-15XQPY9N93"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-15XQPY9N93');
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3846399680404454" crossorigin="anonymous"></script>
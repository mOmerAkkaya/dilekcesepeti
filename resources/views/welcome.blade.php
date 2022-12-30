@extends('layouts.app')
@section('home','active')
@section('title','Dilekçe Sepeti, Türkiye'nin lider dilekçe ve evrak çözümleri sağlayıcısıdır. Kendi dilinizde dilerseniz dilekçe örneklerini indirebilir, dilerseniz dilekçe örneklerine ulaşabileceğiniz bir web sitesidir. Ayrıca, çeşitli dilekçe tasarımları sunarak, dilekçe hazırlama sürecini kolaylaştırır. Tüm dilekçe ve evrak işlemleriniz için doğru adres')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row gy-4 d-flex justify-content-between">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h2 data-aos="fade-up">{{ __('layouts/index.title') }}</h2>
                <p data-aos="fade-up" data-aos-delay="100">{{ __('layouts/index.subtitle') }}</p>

                <form method="get" action="{{route('dokuman.index')}}" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
                    <input type="text" minlength="3" name="query" class="form-control" placeholder="{{ __('layouts/index.placeholder') }}" required>
                    <button type="submit" class="btn btn-primary">{{ __('layouts/index.search') }}</button>
                </form>

                <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{App\Http\Controllers\CountController::petition()}}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>{{ __('menu.petition') }}</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{App\Http\Controllers\CountController::contract()}}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>{{ __('menu.contract') }}</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{App\Http\Controllers\CountController::judicial()}}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>{{ __('menu.judicial') }}</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{App\Http\Controllers\CountController::process()}}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>{{ __('menu.process') }}</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>
            </div>

            <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="{{asset('img/dilekce-sepeti.png')}}" class="img-fluid mb-3 mb-lg-0" alt="">
            </div>

        </div>
    </div>
</section><!-- End Hero Section -->

<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-pencil"></i></div>
                    <div>
                        <h4 class="title">{{ __('pages/index.first') }}</h4>
                        <p class="description">{{ __('pages/index.firstSub') }}</p>
                        <a href="{{route('icerik.show',['dilekce-nasil-yazilir'])}}" class="readmore stretched-link"><span>{{ __('pages/index.more') }}</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-signature"></i></div>
                    <div>
                        <h4 class="title">{{ __('pages/index.second') }}</h4>
                        <p class="description">{{ __('pages/index.secondSub') }}</p>
                        <a href="{{route('icerik.show',['online-dilekce-yazma'])}}" class="readmore stretched-link"><span>{{ __('pages/index.more') }}</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-scale-balanced"></i></div>
                    <div>
                        <h4 class="title">{{ __('pages/index.third') }}</h4>
                        <p class="description">{{ __('pages/index.thirdSub') }}</p>
                        <a href="{{route('icerik.show',['sozlesme-nasil-yapilir'])}}" class="readmore stretched-link"><span>{{ __('pages/index.more') }}</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about pt-0">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
                    <img src="{{asset('img/about.jpg')}}" class="img-fluid" alt="">
                    <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                </div>
                <div class="col-lg-6 content order-last  order-lg-first">
                    <h3>{{ __('footer.about') }}</h3>
                    <p>
                        {{ __('pages/index.about.title') }}
                    </p>
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bi bi-diagram-3"></i>
                            <div>
                                <h5>{{ __('pages/index.about.menu1') }}</h5>
                                <p>{{ __('pages/index.about.menu1Sub') }}</p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-fullscreen-exit"></i>
                            <div>
                                <h5>{{ __('pages/index.about.menu2') }}</h5>
                                <p>{{ __('pages/index.about.menu2Sub') }}</p>
                            </div>
                        </li>
                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-broadcast"></i>
                            <div>
                                <h5>{{ __('pages/index.about.menu3') }}</h5>
                                <p>{{ __('pages/index.about.menu3Sub') }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <span>{{ __('pages/index.services.title') }}</span>
                <h2>{{ __('pages/index.services.title') }}</h2>

            </div>

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{asset('img/first-service.jpg')}}" alt="" class="img-fluid">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">{{ __('pages/index.services.first') }}</a></h3>
                        <p style="text-align: justify;">{{ __('pages/index.services.firstSub') }}</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{asset('img/second-service.jpg')}}" alt="" class="img-fluid">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">{{ __('pages/index.services.second') }}</a></h3>
                        <p style="text-align: justify;">{{ __('pages/index.services.secondSub') }}</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{asset('img/third-service.jpg')}}" alt="" class="img-fluid">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">{{ __('pages/index.services.third') }}</a></h3>
                        <p style="text-align: justify;">{{ __('pages/index.services.thirdSub') }}</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{asset('img/fourth-service.jpg')}}" alt="" class="img-fluid">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">{{ __('pages/index.services.fourth') }}</a></h3>
                        <p style="text-align: justify;">{{ __('pages/index.services.fourthSub') }}</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{asset('img/fifth-service.jpg')}}" alt="" class="img-fluid">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">{{ __('pages/index.services.fifth') }}</a></h3>
                        <p style="text-align: justify;">{{ __('pages/index.services.fifthSub') }}</p>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{asset('img/sixth-service.jpg')}}" alt="" class="img-fluid">
                        </div>
                        <h3><a href="service-details.html" class="stretched-link">{{ __('pages/index.services.sixth') }}</a></h3>
                        <p style="text-align: justify;">{{ __('pages/index.services.sixthSub') }}</p>
                    </div>
                </div><!-- End Card Item -->

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
        <div class="container" data-aos="zoom-out">

            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h3>{{ __('pages/index.callToAction.title') }}</h3>
                    <p> {{ __('pages/index.callToAction.titleSub') }}</p>
                    <a class="cta-btn" href="https://wa.me/+905324972238">{{ __('pages/index.callToAction.button') }}</a>
                </div>
            </div>

        </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="row gy-4 align-items-center features-item" data-aos="fade-up">

                <div class="col-md-5">
                    <img src="{{asset('img/features-1.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7">
                    <h3>{{ __('pages/index.whiteField.first.title') }}</h3>
                    <p class="fst-italic">
                        Belgelerinizi düzenlemede size yardımcı oluyoruz.
                    </p>
                    <ul>
                        <li><i class="bi bi-check"></i> Mevcut {{App\Http\Controllers\CountController::petition()}} dilekçeden istediğiniz herhangi birini seçin.</li>
                        <li><i class="bi bi-check"></i> Mevcut {{App\Http\Controllers\CountController::contract()}} sözleşmeden istediğiniz herhangi birini seçin.</li>
                        <li><i class="bi bi-check"></i> Şimdiden {{App\Http\Controllers\CountController::process()}} kullanıcı bize güvendi. Dökümanları, avukat ve hukukçulardan oluşan bir ekip hazırlıyor. Türkiye'de {{App\Http\Controllers\CountController::petition()+App\Http\Controllers\CountController::contract()}} yazışma ve sözleşme örneği mevcut</li>
                    </ul>
                </div>
            </div><!-- Features Item -->

            <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
                <div class="col-md-5 order-1 order-md-2">
                    <img src="{{asset('img/features-2.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 order-2 order-md-1">
                    <h3>{{ __('pages/index.whiteField.second.title') }}</h3>
                    <p class="fst-italic">
                        Öncelikle, dökümanınızın amacını belirleyin. Bu, düzenleme sürecinin ne kadar yoğun olacağını ve hangi konulara odaklanacağınızı belirler.
                    </p>
                    <p>
                        Örneğin, akademik bir dilekçe yazıyorsanız, dil ve yapı kurallarına daha fazla önem vermelisiniz. Dökümanınızı tekrar tekrar okuyun ve dil hatalarını düzeltin. Bu, kelime yanlışları, cümle yapısı hataları ve noktalama işaretleri gibi hataları bulmanızı sağlar. </p>
                </div>
            </div><!-- Features Item -->

            <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
                <div class="col-md-5">
                    <img src="{{asset('img/features-3.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7">
                    <h3>{{ __('pages/index.whiteField.third.title') }}</h3>
                    <p>Dökümanınızı istediğiniz şekilde düzenleyip kaydedin ve daha sonra kullanın</p>
                    <ul>
                        <li><i class="bi bi-check"></i> İşlem yaptığınız dökümanlardaki kişisel veriniz sistemimizde şifreli olarak kaydedilmektedir.</li>
                        <li><i class="bi bi-check"></i> Yazışma kuralları konusunda özellikle dikkat etmeniz gereken nokta, dil kullanımıdır.</li>
                        <li><i class="bi bi-check"></i> Dilekçenizin gelişme bölümünde, dilekçenizin detaylarını anlatmalısınız. Örneğin, hizmeti ne zaman istediğinizi, neden istediğinizi ve nasıl yararlanacağınızı anlatmalısınız.</li>
                    </ul>
                </div>
            </div><!-- Features Item -->

            <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
                <div class="col-md-5 order-1 order-md-2">
                    <img src="{{asset('img/features-4.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 order-2 order-md-1">
                    <h3>{{ __('pages/index.whiteField.fourth.title') }}</h3>
                    <p class="fst-italic">
                        Dil hatalarını düzeltmek ve okunabilirliğini artırmak için dilekçenizde değişiklikler yapabilirsiniz. Döküman düzenleme için bazı öneriler ve ipuçları vermeye çalışacağım:
                    </p>
                    <p>
                        Dökümanınızı bir dil denetleyici programı (örneğin, Grammarly gibi) kullanarak da kontrol edebilirsiniz.

                        Dökümanınızın okunabilirliğini artırmak için, cümleleri kısaltın ve paragrafları kısa tutun. Ayrıca, anahtar kelimeleri vurgulamak için italik, bold ya da altı çizili yazı tipi kullanın.

                        Dökümanınızın yapısını düzenleyin. Özet, giriş, gelişme ve sonuç bölümlerinden oluşan bir yapı kullanın. Bu, dökümanınızı daha anlaşılır ve düzenli hale getirir.

                        Dökümanınızı başkaları ile paylaşarak, yazım ve dil hatalarını bulmalarına yardımcı olun. Bu, dökümanınızın daha iyi bir şekilde düzenlenmiş olmasını sağlar.

                        Son olarak, dökümanınızı revize etmeyi unutmayın.
                    </p>
                </div>
            </div><!-- Features Item -->

        </div>
    </section><!-- End Features Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container">

            <div class="slides-1 swiper" data-aos="fade-up">
                <div class="swiper-wrapper">
                    @foreach($latestComments as $key => $value)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="{{asset('img/dilekce.jpg')}}" class="testimonial-img" alt="">
                            <h3>{{$value->uname}}</h3>
                            <h4>{{$value->dname}}</h4>
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++) @if ($value->rank >= $i) <i class="bi bi-star-fill"></i>
                                    @else
                                    <i class="bi bi-star"></i>
                                    @endif
                                    @endfor
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                {{$value->comment}}
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <span>{{ __('pages/faq.title') }}</span>
                <h2>{{ __('pages/faq.title') }}</h2>

            </div>

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-10">

                    <div class="accordion accordion-flush" id="faqlist">

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                    <i class="bi bi-question-circle question-icon"></i>
                                    {{ __('pages/faq.first.question') }}
                                </button>
                            </h3>
                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    {{ __('pages/faq.first.answer') }}
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                    <i class="bi bi-question-circle question-icon"></i>
                                    {{ __('pages/faq.second.question') }}
                                </button>
                            </h3>
                            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    {{ __('pages/faq.second.answer') }}
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                                    <i class="bi bi-question-circle question-icon"></i>
                                    {{ __('pages/faq.third.question') }}
                                </button>
                            </h3>
                            <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    {{ __('pages/faq.third.answer') }}
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                                    <i class="bi bi-question-circle question-icon"></i>
                                    {{ __('pages/faq.fourth.question') }}
                                </button>
                            </h3>
                            <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    <i class="bi bi-question-circle question-icon"></i>
                                    {{ __('pages/faq.fourth.answer') }}
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                                    <i class="bi bi-question-circle question-icon"></i>
                                    {{ __('pages/faq.fifth.question') }}
                                </button>
                            </h3>
                            <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    {{ __('pages/faq.fifth.answer') }}
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                    </div>

                </div>
            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->

</main><!-- End #main -->

@endsection

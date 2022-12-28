<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
                <a href="{{route('home')}}" class="logo d-flex align-items-center">
                    <span>{{ __('menu.name') }}</span>
                </a>
                <p>{{ __('footer.subtitle') }}</p>
                <div class="social-links d-flex mt-4">
                    <a href="https://twitter.com/dilekce_sepeti" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>{{ __('footer.links') }}</h4>
                <ul>
                    <li><a href="{{route('home')}}">{{ __('menu.home') }}</a></li>
                    <li><a href="#">{{ __('footer.about') }}</a></li>
                    <li><a href="{{route('icerik.show',['gizlilik-bildirimi'])}}">Gizlilik Politikası</a></a></li>
                    <li><a href="{{route('icerik.show',['kullanim-sartlari'])}}">Kullanım Şartları</a></li>
                    <li><a href="{{route('icerik.show',['cerez-politikasi'])}}">Çerez Politikası</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>{{ __('footer.lastdocuments') }}</h4>
                <ul>
                    @foreach(\App\Models\Document::orderBy('id','desc')->take(5)->get() as $key => $value)
                    <li><a href="{{route('dokuman.show', [$value->slug])}}">{{$value->name}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>{{ __('menu.contact') }}</h4>
                <p>
                    Kurtköy Mah. Ankara Cad.<br>
                    Pendik P.K. 34912<br>
                    İstanbul <br><br>
                    <strong>Telefon:</strong> +90 532 497 22 38<br>
                    <strong>Email:</strong> bilgi@dilekcesepeti.com.tr<br>
                </p>

            </div>

        </div>
    </div>

    <div class="container mt-4">
        <div class="copyright">
            &copy; <strong><span>{{ __('footer.copyright') }}</span></strong>
        </div>
        <div class="credits">
            {{ __('footer.designed') }} <a target="_blank" href="https://pendikyazilim.com/">Pendik Yazılım</a>
        </div>
    </div>

</footer>
<!-- End Footer -->
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('vendor/aos/aos.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('js/main.js')}}"></script>
@yield("js")
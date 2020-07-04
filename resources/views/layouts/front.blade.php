<html lang="en">
  <head>
    <title>CABEMERAH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset ('front/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset ('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset ('front/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset ('front/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset ('front/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/css/jquery.timepicker.css') }}">

    
    <link rel="stylesheet" href="{{ asset ('front/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset ('front/css/style.css') }}">
  </head>
  <body class="goto-here">
        <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text">+62812345678</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <span class="text">cs@cabemerah.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">BELI CABE MURAH MERIAH</span>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">CABEMERAH</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">Tentang</a></li>
              <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Hubungi Kami</a></li>

              <!-- <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="{{ url('/komoditas') }}">Shop</a>
              </div>
              </li> -->
              @if (Route::has('login'))
              <li class="nav-item active"><a href="{{ url('/komoditas') }}" class="nav-link">Pesan</a></li>
              @auth
              <li class="nav-item cta cta-colored">
                <?php
                $pesanan_utama = \App\Pesenan::where('user_id',Auth::user()->id)->where('status',0)->first();
                if(!empty($pesanan_utama))
                {
                $notif = \App\PesananDetail::where('pesanan_id',$pesanan_utama->id)->count();
                }
                ?>
                <a href="{{url('checkout')}}" class="nav-link"><span class="icon-shopping_cart"></span class="">
                  @if(!empty($notif))
                  <p class="badge badge-danger">{{$notif}}</p>
                  @else
                  <p class="badge badge-danger">0</p>
                  @endif
                </a></li>
              <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hai, {{ Auth::user()->name }}</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                <a class="dropdown-item" href="{{ route('history') }}">Riwayat Pemesanan</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              </div>
            </li>
            @else
            <li class="nav-item active"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
            @if (Route::has('register'))
            <li class="nav-item active"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
            @endif
            @endauth
            @endif

            </ul>
          </div>
        </div>
      </nav>
    <!-- END nav -->

    @yield('content')
    <footer class="ftco-footer ftco-section">
      <div class="container">
        <!-- <div class="row">
            <div class="mouse">
                        <a href="#" class="mouse-icon">
                            <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                        </a>
                    </div>
        </div> -->
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">CABEMERAH</h2>
              <p>BELI CABE MURAH MERIAH HANYA DI CABEMERAH</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="{{ url('/') }}" class="py-2 d-block">Home</a></li>
                <li><a href="{{ url('/about') }}" class="py-2 d-block">Tentang</a></li>
                <li><a href="{{ url('/contact') }}" class="py-2 d-block">Hubungi kami</a></li>
                <li><a href="{{ url('/komoditas') }}" class="py-2 d-block">Pesan</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
                  <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                    <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                    <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                    <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                    <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                  </ul>
                  <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">FAQs</a></li>
                    <li><a href="#" class="py-2 d-block">Contact</a></li>
                  </ul>
                </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Punya Pertanyaan?</h2>
                <div class="block-23 mb-3">
                  <ul>
                    <li><a href="#"><span class="icon icon-map-marker"></span><span class="text">Headquarter Bandung</span></a></li>
                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62812345678</span></a></li>
                    <li><a href="#"><span class="icon icon-envelope"></span><span class="text">cs@cabemerah.com</span></a></li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
  <script src="{{ asset ('front/js/jquery.min.js') }}"></script>
  <script src="{{ asset ('front/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset ('front/js/popper.min.js') }}"></script>
  <script src="{{ asset ('front/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset ('front/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset ('front/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset ('front/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset ('front/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset ('front/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset ('front/js/aos.js') }}"></script>
  <script src="{{ asset ('front/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset ('front/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset ('front/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset ('front/js/google-map.js') }}"></script>
  <script src="{{ asset ('front/js/main.js') }}"></script>
    
  </body>
</html>
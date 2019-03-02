
  <!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js')}}" lang="en">
<!--<![endif]-->

<head>
    <!--====== USEFULL META ======-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Transportation & Agency Template is a simple Smooth transportation and Agency Based Template" />
    <meta name="keywords" content="Portfolio, Agency, Onepage, Html, Business, Blog, Parallax" />
    <meta name="csrf-token" content="{{csrf_token()}}" />

    <!--====== TITLE TAG ======-->
    <title>Carries HTML5 Business Template</title>

    <!--====== FAVICON ICON =======-->
    <link rel="shortcut icon" type="image/ico" href="{{URL::asset('front_theme/img/favicon.png')}}" />

    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="{{URL::asset('front_theme/css/normalize.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front_theme/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front_theme/css/stellarnav.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front_theme/css/owl.carousel.css')}}">
    <link href="{{URL::asset('front_theme/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('front_theme/css/font-awesome.min.css')}}" rel="stylesheet">

    <!--====== MAIN STYLESHEETS ======-->
    <link href="{{URL::asset('front_theme/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('front_theme/css/responsive.css')}}" rel="stylesheet">

    <script src="{{URL::asset('front_theme/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    {{-- <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
        <![endif]-->
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> --}}
</head>

<body class="home-three" >
    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>
    <div id="app">
        <!--SCROLL TO TOP-->
        <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

        <!--START TOP AREA-->
        <header class="top-area" id="home">
            <div class="top-area-bg" data-stellar-background-ratio="0.6"></div>
            <div class="header-top-area">
                <!--MAINMENU AREA-->
                <div class="mainmenu-area" id="mainmenu-area">
                    <div class="mainmenu-area-bg"></div>
                    <nav class="navbar" >
                            <div class="container-fluid">
                              {{-- <!-- Brand and toggle get grouped for better mobile display -->
                              <div >
                                    <a href="{{ url('/') }}" class="navbar-brand">
                                        <img src="{{URL::asset('front_theme/img/logo.png')}}" alt="logo" style="width:80%">
                                    </a>
                              </div>
                              <!-- Collect the nav links, forms, and other content for toggling --> --}}

                              <div id="main-nav" class="stellarnav" >
                                <ul class="nav navbar-nav" style="margin: 11px;">
                                    <li class="active">
                                        <router-link to="/pub" class="nav-link"> Home
                                        <span class="sr-only">(current)</span>
                                        </router-link>
                                    </li>
                                    <li ><a href="#">About</a></li>
                                    <li ><a href="#">Service</a></li>
                                    <li ><a href="#"> Features</a></li>
                                </ul>

                                <ul class="nav navbar-nav navbar-right" style="margin: 11px;">
                                 @if (Route::has('login'))
                                    @guest
                                        <li style="padding-right: 10px;"><a href="{{ route('login') }}" class="btn btn-success">Login</a></li>
                                    @endguest
                                            {{-- <li style="padding-right: 10px;"><a href="#" class="btn btn-warning">Register</a></li> --}}
                                    {{-- @if (Route::has('register'))
                                            <li style="padding-right: 10px;"><a href="#" class="btn btn-default">Link</a></li>
                                     @endif --}}
                                 @endif

                                </ul>
                              </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                </div>
                <!--END MAINMENU AREA END-->
            </div>
            <!--HOME SLIDER AREA-->
            <div class="welcome-slider-area">
                <div class="welcome-single-slide slider-bg-one">
                    <div class="container">
                        <div class="row flex-v-center">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="welcome-text text-center">
                                    <h1>WE MAKE STRONGEST SERVICE ABOVE THE WORLD</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <div class="home-button">
                                        <a href="#">Our Service</a>
                                        <a href="#">Get A Quate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="welcome-single-slide slider-bg-two">
                    <div class="container">
                        <div class="row flex-v-center">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="welcome-text text-center">
                                    <h1>WE MAKE STRONGEST SERVICE ABOVE THE WORLD</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <div class="home-button">
                                        <a href="#">Our Service</a>
                                        <a href="#">Get A Quate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HOME SLIDER AREA-->
        </header>
        <!--END TOP AREA-->

        <admin-main></admin-main>



        <!--SERVICE AREA-->
        <section class="service-area-three section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                        <div class="area-title text-center wow fadeIn">
                            <h2>Our Service</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="single-service-three wow fadeInUp" data-wow-delay=".2s">
                            <div class="service-icon-three"><i class="fa fa-truck"></i></div>
                            <h4>road freight</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry, lorem Ipsu.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="single-service-three wow fadeInUp" data-wow-delay="0.3s">
                            <div class="service-icon-three"><i class="fa fa-plane"></i></div>
                            <h4>air freight</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry, lorem Ipsu.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="single-service-three wow fadeInUp" data-wow-delay="0.4s">
                            <div class="service-icon-three"><i class="fa fa-ship"></i></div>
                            <h4>sea freight</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry, lorem Ipsu.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="single-service-three wow fadeInUp" data-wow-delay="0.2s">
                            <div class="service-icon-three"><i class="fa fa-dropbox"></i></div>
                            <h4>ware house</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry, lorem Ipsu.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="single-service-three wow fadeInUp" data-wow-delay="0.3s">
                            <div class="service-icon-three"><i class="fa fa-cog"></i></div>
                            <h4>consulting</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry, lorem Ipsu.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="single-service-three wow fadeInUp" data-wow-delay="0.4s">
                            <div class="service-icon-three"><i class="fa fa-bicycle"></i></div>
                            <h4>fast delevary</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry, lorem Ipsu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--SERVICE AREA END-->

        <!--PROMO AREA-->
        <section class="promo-area">
            <div class="promo-bottom-area section-padding">
                <div class="promo-botton-area-bg" data-stellar-background-ratio="0.6"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12 text-center">
                            <div class="promo-bottom-content wow fadeIn">
                                <h2>we provide international freight &amp; logistics service worldwidw</h2>
                                <a href="#" class="read-more">Get a quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--PROMO AREA END-->


        <!--FOOER AREA-->
        <div class="footer-area dark-bg">
            <div class="footer-area-bg"></div>
            <div class="footer-top-area wow fadeIn">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="subscribe-content">
                                <h2>Weekly Newsletter</h2>
                                <p>There are many vaiations of passages of lorem ipsum available.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="subscriber-form-area">
                                <form action="#" class="subsriber-form">
                                    <label for="subscriber-mail"><i class="fa fa-envelope-o"></i></label>
                                    <input type="email" name="subscriber-mail" id="subscriber-mail" placeholder="Enter Your Mail">
                                    <button type="submit">subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="footer-border"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-area wow fadeIn">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="single-footer-widget footer-about">
                                <h3>About Us</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <ul>
                                    <li><i class="fa fa-phone"></i> <a href="callto:+8801911854378">+8801911854378</a></li>
                                    <li><i class="fa fa-map-marker"></i> <a href="mailto:backpiper.com@gmail.com">backpiper.com@gmail.com</a></li>
                                    <li><i class="fa fa-phone"></i> Gazipur, 1704, Bangladesh.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="single-footer-widget twitter-widget">
                                <h3>Latest Tweets</h3>
                                <ul>
                                    <li>
                                        <div class="twitter-icon"><i class="fa fa-phone"></i></div>
                                        <div class="tweet-detail">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem .</p>
                                            <a href="#" class="tweet-meta">5 Miniutes Ago</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="twitter-icon"><i class="fa fa-phone"></i></div>
                                        <div class="tweet-detail">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem .</p>
                                            <a href="#" class="tweet-meta">5 Miniutes Ago</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="single-footer-widget list-widget">
                                <h3>Customer Service</h3>
                                <ul>
                                    <li><a href="#">Support Forums</a></li>
                                    <li><a href="#">Communication</a></li>
                                    <li><a href="#">FAQS</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Rules & Condition</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="single-footer-widget instafeed-widget">
                                <h3>Customer Service</h3>
                                <ul>
                                    <li><a href="#"><img src="{{URL::asset('front_theme/img/instafeed/1.jpg')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{URL::asset('front_theme/img/instafeed/2.jpg')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{URL::asset('front_theme/img/instafeed/3.jpg')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{URL::asset('front_theme/img/instafeed/4.jpg')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{URL::asset('front_theme/img/instafeed/5.jpg')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{URL::asset('front_theme/img/instafeed/6.jpg')}}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="footer-border"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="footer-copyright wow fadeIn">

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="footer-social-bookmark text-right wow fadeIn">
                                <ul class="social-bookmark">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<!--FOOER AREA END-->

    <script src="{{asset("js/app.js")}}"></script>
    <!--====== SCRIPTS JS ======-->
    <script src="{{URL::asset('front_theme/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{URL::asset('front_theme/js/vendor/bootstrap.min.js')}}"></script>

    <!--====== PLUGINS JS ======-->
    <script src="{{URL::asset('front_theme/js/vendor/jquery.easing.1.3.js')}}"></script>
    <script src="{{URL::asset('front_theme/js/vendor/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{URL::asset('front_theme/js/vendor/jquery.appear.js')}}"></script>
    <script src="{{URL::asset('front_theme/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('front_theme/js/stellar.js')}}"></script>
    <script src="{{URL::asset('front_theme/js/wow.min.js')}}"></script>
    <script src="{{URL::asset('front_theme/js/stellarnav.min.js')}}"></script>
    <script src="{{URL::asset('front_theme/js/contact-form.js')}}"></script>
    <script src="{{URL::asset('front_theme/js/jquery.sticky.js')}}"></script>

    <!--===== ACTIVE JS=====-->
    <script src="{{URL::asset('front_theme/js/main.js')}}"></script>

</html>

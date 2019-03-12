<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>Home | E-Househelp Search</title>
    <link href="{{asset('front_theme2/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front_theme2/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('front_theme2/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('front_theme2/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('front_theme2/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('front_theme2/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('front_theme2/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('front_theme2/js/html5shiv.js')}}"></script>
    <script src="{{asset('front_theme2/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('front_theme2/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('front_theme2/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('front_theme2/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('front_theme2/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('front_theme2/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
  <div id="app">
    <!--header-->
        <header-main></header-main>
    <!--/header-->

    <!--slider-->
        <slider-header></slider-header>
    <!--slider-->



	<section class="content">
        {{-- <!--filter-->
            <filter-header></filter-header>
        <!--filter--> --}}
        <househelp-content></househelp-content>
        {{--  any content viewed with routes  --}}
        <pub-main></pub-main>
        {{--  any content viewed with routes  --}}
    </section>

	<footer id="footer"><!--Footer-->
		<footer-content></footer-content>
    </footer><!--/Footer-->
  </div>

</body>
    <script src="{{asset("js/app.js")}}"></script>

    <script src="{{asset('front_theme2/js/jquery.js')}}"></script>
    <script src="{{asset('front_theme2/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front_theme2/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('front_theme2/js/price-range.js')}}"></script>
    <script src="{{asset('front_theme2/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('front_theme2/js/main.js')}}"></script>
</html>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title Of Site -->
	<title>IDStack - @yield('title', 'Belajar Berbagai Pemrograman | WeeeWork Class Programming')</title>
	<meta name="description" content="Tutorial Coding Bahasa Indonesia, Kursus Online Belajar Pemrograman, IDStack" />
	<meta name="keywords" content="course, tutor, tutorial, html, css, javascript, php, laravel, codeigniter, nodejs, vue, angular, backend, frontend" />
	<meta name="author" content="IDStack">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Fav and Touch Icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('/') }}/assets/front/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('/') }}/assets/front/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('/') }}/assets/front/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="{{ url('/') }}/assets/front/images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="{{ url('/') }}/assets/front/images/ico/favicon.png">

    <!-- CSS Plugins -->
	<link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/front/bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="{{ url('/') }}/assets/front/css/animate.css" rel="stylesheet">
	<link href="{{ url('/') }}/assets/front/css/main.css" rel="stylesheet">
	<link href="{{ url('/') }}/assets/front/css/plugin.css" rel="stylesheet">

	<!-- CSS Custom -->
	<link href="{{ url('/') }}/assets/front/css/style.css" rel="stylesheet">
	
	<!-- For your own style -->
	<link href="{{ url('/') }}/assets/front/css/your-style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110989361-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-110989361-1');
	</script>

	<!-- Google Analytics -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-110989361-1', 'auto');
		ga('send', 'pageview');
	</script>
	<!-- End Google Analytics -->

	@yield('styles')
	
</head>

<body>
	
	<div id="introLoader" class="introLoading"></div>
	
	<!-- start Container Wrapper -->
	<div class="container-wrapper">

		<!-- start Header -->
		<header id="header">
	  
			<!-- start Navbar (Header) -->
			<nav class="navbar navbar-primary navbar-fixed-top navbar-sticky-function">
			
				<div id="top-header">
			
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-6">
								
								<div class="top-header-widget">
									<ul class="top-header-dropdown">
										<li class="dropdown dropdown_hover">
											<a id="language-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
												<i class="ion-android-globe"></i> English
												<span class="caret"></span>
											</a>
											<ul class="dropdown-menu" aria-labelledby="language-dropdown">
												<li><a href="#">English</a></li>
												<li><a href="#">France</a></li>
												<li><a href="#">Japanese</a></li>
											</ul>
										</li>
									</ul>
								</div>
								
								{{--  <div class="top-header-widget hidden-xs">
									<i class="ion-android-call"></i> <span class="number">1-800-900-9985</span>
								</div>  --}}
							
							</div>
							
							<div class="col-sm-6">
								@guest
									<div class="top-header-widget pull-right">
										<a href="{{ route('login') }}" >
											<i class="ion-log-in mr-3"></i> Sign-in
										</a>
									</div>
									<div class="top-header-widget pull-right">
										<a href="{{ route('register') }}">
											<i class="ion-person-add mr-3"></i> Sign-up
										</a>
									</div>
                       			@else
									<div class="top-header-widget pull-right">
										<a 
											href="{{ route('logout') }}"
											onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
										>
											{{ Auth::user()->name }}
											<i class="ion-log-out mr-3"></i> Sign-out
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
									</div>
								@endguest
							
							</div>
							
						</div>
					
					</div>
					
				</div>

				<div class="container">
					
					<div class="navbar-header">
						<a class="navbar-brand" href="{{ url('/') }}"><i class="education-icon-book7"></i>
							<strong class="uppercase">ID</strong>Stack
						</a>
					</div>
					
					<div id="navbar" class="collapse navbar-collapse navbar-arrow">
					
						<ul class="nav navbar-nav navbar-right" id="responsive-menu">
						
							<li>
								<a href="{{ url('/') }}">Beranda</a>
							</li>
							
							<li>
								<a href="{{ route('series') }}">Seri</a>
							</li>
							<li><a href="{{ route('idstack.about') }}">Tentang</a></li>
						</ul>
					
					</div>
					
				</div>

				<div id="slicknav-mobile"></div>
				
			</nav>
			<!-- end Navbar (Header) -->

		</header>
		<!-- end Header -->

		<!-- start Main Wrapper -->
		@yield('content')
		<!-- end Main Wrapper -->
		
		<!-- start Footer Wrapper -->
		<div class="footer-wrapper scrollspy-footer">
		
			<footer class="main-footer">
				
				<div class="container">
				
					<div class="row">
					
						<div class="col-sm-12 col-md-3 mb-30">
						
							<div class="footer-logo">
								<a href="#home"><i class="education-icon-book7"></i> <strong class="uppercase">ID</strong>Stack</a>
							</div>
							
							<p class="about-us-footer">Media belajar bersama berbagai bidang yang bisa kamu temukan disini. Bersama para ahli dan peserta lainnya melalui komunikasi secara visual.</p>
						
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-6 mb-30">
						
							<div class="newsletter-footer">
							
								<form action="#" method="post" class="row">
									
									<div class="col-xs-12 col-sm-12 col-md-8">
									
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Enter your email address">
											<input type="submit" class="btn btn-submit" value="Langganan">
										</div>
										
									</div>
									
								</form>
								
							</div>
							
							<ul class="menu-footer">
								<li><a href="{{ route('idstack.about') }}">Tentang</a></li>
								<li><a href="https://facebook.com/weeework">People</a></li>
								<li><a href="https://facebook.com/weeework">Community</a></li>
								<li><a href="https://youtube.com/weeework">Channel</a></li>
							</ul>
						
						</div>
						
						<div class="col-xs-12 col-sm-12 col-md-3 mb-30">
						
							<div class="social-footer clearfix">
								<a href="https://facebook.com/idstack"><i class="fa fa-facebook-official"></i></a>
								<a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus "></i></a>
								<a href="https://github.com/weeework"><i class="fa fa-github"></i></a>
								<a href="#"><i class="fa fa-stack-overflow"></i></a>
							</div>
							
							
							<p class="footer-address">
                                Cirebon, Jawa Barat, Indonesia, 45181
                                <br />
                                <span class="block text-white font20 font700 line20 mt-5 mb-5">+62 899 6568 953</span>
                                idstackdeveloper@gmail.com
                            </p>
						
						</div>
						
					</div>
					
				</div>
				
			</footer>
			
			<footer class="secondary-footer">
			
				<div class="container">
				
					<div class="row">
					
						<div class="col-xs-12 col-sm-6">
							<p class="copy-right">&#169; Copyright 2017 IDStack - WeeeWork Class IT.</p>
						</div>
						
						<div class="col-xs-12 col-sm-6">
							<ul class="secondary-footer-menu clearfix">
								@guest
									<li><a href="{{ route('login') }}">Sign-in</a></li>
									<li><a href="{{ route('register') }}">Sign-up</a></li>
								@else
									<li></li>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								@endguest
							</ul>
						</div>
						
					</div>
				
				</div>
				
			</footer>

		</div>
		<!-- end Footer Wrapper -->
		
	</div>
	<!-- end Container Wrapper -->
 
 
	<!-- start Back To Top -->
	<div id="back-to-top">
	<a href="#"><i class="ion-ios-arrow-up"></i></a>
	</div>
	<!-- end Back To Top -->

	<!-- JS -->
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/jquery-migrate-1.4.1.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/jquery.waypoints.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/spin.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/jquery.introLoader.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/typed.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/placeholderTypewriter.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/jquery.slicknav.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/jquery.placeholder.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/select2.full.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/ion.rangeSlider.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/readmore.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/slick.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/bootstrap-rating.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/jquery.nicescroll.min.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/creditly.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/bootstrap-modalmanager.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="{{ url('/') }}/assets/front/js/customs.js"></script>

	@yield('scripts')

	<script>
	!function ($) {

	$(function(){

		var $window = $(window)
		var $body   = $(document.body)

		var navHeight = $('.navbar').outerHeight(true) + 50

		$body.scrollspy({
		target: '.scrollspy-sidebar',
		offset: navHeight
		})

		$window.on('load', function () {
		$body.scrollspy('refresh')
		})

		$('.scrollspy-container [href=#]').click(function (e) {
		e.preventDefault()
		})

		// back to top
		setTimeout(function () {
		var $sideBar = $('.scrollspy-sidebar')

		$sideBar.affix({
			offset: {
			top: function () {
				var offsetTop      = $sideBar.offset().top
				var sideBarMargin  = parseInt($sideBar.children(0).css('margin-top'), 10)
				var navOuterHeight = $('.scrollspy-nav').height()

				return (this.top = offsetTop - navOuterHeight - sideBarMargin)
			}
			, bottom: function () {
				return (this.bottom = $('.scrollspy-footer').outerHeight(true))
			}
			}
		})
		}, 100)
			
	})

	}(window.jQuery)

	</script>
</body>
</html>
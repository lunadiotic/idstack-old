<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="Tutorial Coding Bahasa Indonesia, Kursus Online Pemrograman, IDStack" />
	    <meta name="keywords" content="study, learn, course, tutor, tutorial, teach, college, school, institute, teacher, instructor, php, laravel, web, mysql, html, css" />
        <meta name="author" content="IDStack">

		<link rel="shortcut icon" href="{{ asset('assets/back/images/favicon_1.ico') }}">

        <title>IDStack - @yield('title', 'Sign In')</title>

        <link href="{{ asset('assets/back/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/back/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/back/css/style.css') }}" rel="stylesheet" type="text/css" />

        <script src="{{ asset('assets/back/js/modernizr.min.js') }}"></script>

	</head>
	<body>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
        <div class="wrapper-page">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class=" card-box">
                <div class="panel-heading">
                    <h4 class="text-center"> Sign In to <strong>IDStack</strong></h4>
                </div>

                <div class="p-20">
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group-custom">
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                            <label class="control-label" for="user-email">Name</label><i class="bar"></i>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group-custom">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                            <label class="control-label" for="user-email">E-Mail Address</label><i class="bar"></i>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group-custom">
                            <input id="password" type="password" name="password" required>
                            <label class="control-label" for="user-password">Password</label><i class="bar"></i>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group-custom">
                            <input id="password-confirm" type="password" name="password_confirmation" required>
                            <label class="control-label" for="user-password">Confirm Password</label><i class="bar"></i>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox" checked="checked" required>
                                    <label for="checkbox-signup">I accept <a href="#">Terms and Conditions</a></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">
                                    Register
                                </button>
                            </div>
                        </div>

                        <div class="form-group m-t-40 m-b-0">
                            <div class="col-12 text-center">
                                <h5 class="font-18"><b>Sign Up with</b></h5>
                            </div>
                        </div>

                        <div class="form-group m-b-0 text-center">
                            <div class="col-12">
                                <button type="button" class="btn btn-sm btn-facebook waves-effect waves-light m-t-20">
                                    <i class="fa fa-facebook m-r-5"></i> Facebook
                                </button>

                                <button type="button" class="btn btn-sm btn-twitter waves-effect waves-light m-t-20">
                                    <i class="fa fa-twitter m-r-5"></i> Twitter
                                </button>

                                <button type="button" class="btn btn-sm btn-googleplus waves-effect waves-light m-t-20">
                                    <i class="fa fa-google-plus m-r-5"></i> Google+
                                </button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <p class="text-white">
                        Already have account?<a href="{{ route('login') }}" class="text-white m-l-5"><b>Sign In</b></a>
                    </p>
                </div>
            </div>

        </div>

		<script>
			var resizefunc = [];
		</script>

		<!-- jQuery  -->
		<script src="{{ asset('assets/back/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/back/js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
        <script src="{{ asset('assets/back/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/back/js/detect.js') }}"></script>
        <script src="{{ asset('assets/back/js/fastclick.js') }}"></script>
        <script src="{{ asset('assets/back/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/back/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/back/js/waves.js') }}"></script>
        <script src="{{ asset('assets/back/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/back/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('assets/back/js/jquery.scrollTo.min.js') }}"></script>

        <script src="{{ asset('assets/back/js/jquery.core.js') }}"></script>
        <script src="{{ asset('assets/back/js/jquery.app.js') }}"></script>

	</body>
</html>
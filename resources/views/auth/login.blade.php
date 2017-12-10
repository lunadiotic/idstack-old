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
        <div class="card-box">
            <div class="panel-heading">
                <h4 class="text-center"> Sign In to <strong>IDStack</strong></h4>
            </div>


            <div class="p-20">

            <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group-custom{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        <label class="control-label" for="user-name">E-Mail Address</label><i class="bar"></i>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group-custom{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="password" type="password" name="password" required>
                        <label class="control-label" for="user-password">Password</label><i class="bar"></i>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group ">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light"
                                    type="submit">Log In
                            </button>
                        </div>
                    </div>

                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-8">
                            <a href="{{ route('password.request') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot
                                your password?</a>
                        </div>

                        <div class="col-8">
                            <a href="{{ route('auth.activate.resend') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i> Resend Email Activation</a>
                        </div>

                    </div>
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="text-white">Don't have an account? <a href="{{ route('register') }}" class="text-white m-l-5"><b>Sign Up</b></a>
                </p>

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
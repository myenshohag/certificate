<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>RNC || Dashboard</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="{{asset('/backend')}}/assets/css/pages/login/classic/login-6.css" rel="stylesheet" type="text/css" />

    <link href="{{asset('/backend')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/backend')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('/backend')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <link href="{{asset('/backend')}}/assets/css/themes/layout/header/base/light.css" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('/backend')}}/assets/css/themes/layout/header/menu/light.css" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('/backend')}}/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/backend')}}/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="{{asset('/backend')}}/assets/media/logos/favicon-32x32.png" />
</head>

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <div class="d-flex flex-column flex-root">

        <div class="login login-6 login-signin-on login-signin-on d-flex flex-column-fluid" id="kt_login">
            <div class="d-flex flex-column flex-lg-row flex-row-fluid text-center"
                style="background-image: url({{asset('/backend')}}/assets/media/bg/bg-11.jpg);">

               

                <div class="login-divider">

                </div>

                <div class="d-flex w-100 flex-center p-15 position-relative overflow-hidden">
                    <div class="login-wrapper">

                        <div class="login-signin">
                            <div class="text-center mb-10 mb-lg-20">
                                <h2 class="font-weight-bold text-light">Login</h2>
                                <p class="font-weight-bold text-light">Enter your email and password</p>
                            </div>

                            @if(Session::has('message'))
                            <div class="alert alert-success">{{Session::get('message')}}</div>
                            @else

                            <form method="POST" action="{{ route('login') }}" class="form text-left"
                                id="kt_login_signin_form">
                                @csrf
                                <div class="form-group py-2 m-0">
                                    <input required id="email"
                                        class="form-control h-auto border-0  placeholder-dark-75 @error('email') is-invalid @enderror"
                                        type="text" value="{{ old('email') }}" placeholder="email" name="email"
                                        autocomplete="off" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group py-2 border-top m-0">
                                    <input id="password" name="password" required
                                        class="form-control h-auto border-0 placeholder-dark-75 @error('password') is-invalid @enderror"
                                        type="Password" placeholder="Password" name="password" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
                                    <div class="checkbox-inline">
                                        <label class="checkbox m-0 text-muted font-weight-bold">
                                            <input type="checkbox" name="remember" />
                                            <span></span>Remember me</label>
                                    </div>
                                    <a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary font-weight-bold">Forget Password ?</a>
                                </div> -->
                                <div class="text-center mt-15">
                                    <button type="submit" onclick="submitLogin()"
                                        class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Log
                                        In</button>
                                    <button type="button" id="kt_login_signup"
                                        class="btn btn-outline-primary btn-pill py-4 px-9 font-weight-bold">Register</button>
                                </div>
                            </form>
                            @endif
                        </div>

                        <div class="login-signup">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="text-light ">Register</h3>
                                <p class=" text-light font-weight-bold">Enter your details to create your account</p>
                            </div>
                            <form action="{{ route('register') }}" method="POST" class="form text-left"
                                id="kt_login_signup_form">
                                @csrf
                                <div class="form-group py-2 m-0">
                                    <input id="name" name="name" value="{{ old('name') }}" required
                                        class="form-control h-auto border-0  placeholder-dark-75 @error('name') is-invalid @enderror"
                                        type="text" placeholder="Fullname" />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group py-2 m-0 border-top">
                                    <input id="email" required
                                        class="form-control h-auto border-0  placeholder-dark-75 @error('email') is-invalid @enderror"
                                        type="text" placeholder="Email" name="email" autocomplete="off" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group py-2 m-0 border-top">
                                    <input id="password" required
                                        class="form-control h-auto border-0  placeholder-dark-75 @error('password') is-invalid @enderror"
                                        type="password" placeholder="Password" name="password" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group py-2 m-0 border-top">
                                    <input required id="password-confirm"
                                        class="form-control h-auto border-0  placeholder-dark-75" type="password"
                                        placeholder="Confirm Password" name="password_confirmation" />
                                </div>
                                <!-- <div class="form-group mt-5">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-outline font-weight-bold">
                                            <input type="checkbox" name="agree" />
                                            <span></span>I Agree the
                                            <a href="#" class="ml-1">terms and conditions</a>.</label>
                                    </div>
                                </div> -->
                                <div class="form-group d-flex flex-wrap flex-center">
                                    <button id="" type="submit"
                                        class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                                    <button id="kt_login_signup_cancel"
                                        class="btn btn-outline-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                                </div>
                            </form>
                        </div>

                        <div class="login-forgot">
                            <div class="text-center mb-10 mb-lg-20">
                                <h3 class="">Forgotten Password ?</h3>
                                <p class="text-muted font-weight-bold">Enter your email to reset your password</p>
                            </div>
                            <form class="form text-left" id="kt_login_forgot_form">
                                <div class="form-group py-2 m-0 border-bottom">
                                    <input class="form-control h-auto border-0  placeholder-dark-75" type="text"
                                        placeholder="Email" name="email" autocomplete="off" />
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center mt-10">
                                    <button id="kt_login_forgot_submit"
                                        class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
                                    <button id="kt_login_forgot_cancel"
                                        class="btn btn-outline-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/backend')}}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{asset('/backend')}}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="{{asset('/backend')}}/assets/js/scripts.bundle.js"></script>
    <script src="{{asset('/backend')}}/assets/js/pages/custom/login/login-general.js"></script>

    <script>
        function submitLogin() {
            $("#kt_login_signin_form").submit();
        }
    </script>
</body>

</html>



<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
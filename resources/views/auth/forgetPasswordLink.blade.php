<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="{{url('img/favicon.png')}}">

    <title>HRM SET PASSWORD</title>

    <!-- Bootstrap CSS -->
    <link href="{{url('css/bootstrap-theme.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{url('css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{url('css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{url('css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <link href="{{url('css/style-responsive.css')}}" rel="stylesheet" />
</head>

<body class="login-img3-body">
    <div class="container">
        <form class="login-form" action="{{ route('reset.password.post') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="login-wrap">
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
                @endif
                {{-- @if (Session::has('message'))
                <div class="alert alert-success" style="background-color: #50db66; border-color: #5ec95e; color: #7a6969;" role="alert">
                    {{ Session::get('message') }}
            </div>
            @endif --}}
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" id="email_address" placeholder="email address" class="form-control" name="email" required autofocus>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" id="password" placeholder="password" class="form-control" name="password" required autofocus>
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" placeholder="confirm password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Reset Password</button>
    </div>
    </form>
    </div>
</body>
</html>

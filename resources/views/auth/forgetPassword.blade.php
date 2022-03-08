<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>HRM LOGIN</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body class="login-img3-body">
    <div class="container">
        <form class="login-form" action="{{ route('forget.password.post') }}" method="POST">
            @csrf
            <div class="login-wrap">
                @if (Session::has('message'))
                <div class="alert alert-success" style="background-color: #50db66; border-color: #5ec95e; color: #7a6969;" role="alert">
                    {{ Session::get('message') }}
                </div>
                @endif
                <p class="login-img"><i class="icon_lock_alt"></i></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" placeholder="Enter Your email" id="email_address" class="form-control" name="email" required autofocus>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Send Reset Link</button>
            </div>
        </form>
    </div>
</body>
</html>

@extends('layouts.frontend.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="form text-left" id="kt_login_signin_form">
                        @csrf
                        <div class="form-group py-2 m-0">
                            <input required id="email" class="form-control h-auto border-0  placeholder-dark-75 @error('email') is-invalid @enderror" type="text" value="{{ old('email') }}" placeholder="email" name="email" autocomplete="off" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group py-2 border-top m-0">
                            <input id="password" name="password" required class="form-control h-auto border-0 placeholder-dark-75 @error('password') is-invalid @enderror" type="Password" placeholder="Password" name="password" />
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
                            <button type="submit" onclick="submitLogin()" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Log
                                In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
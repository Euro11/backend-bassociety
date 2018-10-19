@extends('auth.inc.template')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="background-image: {{asset('img/bg-login.png')}}; min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <div class="row login-box">
                    <div class="col-5 login-bg login-box-content">
                    </div>
                    <div class="col-7 login-box-content d-flex justify-content-center align-items-center">
                        <form method="POST" action="{{ route('admin.login.submit') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <h3>เข้าสู่ระบบ</h3><br>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required> 

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn login-btn">
                                    {{ __('เข้าสู่ระบบ') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

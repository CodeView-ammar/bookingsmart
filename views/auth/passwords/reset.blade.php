@extends('layouts.app')

@section('content')
    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="login-box clearfix animated flipInY">
            <div class="page-icon animated bounceInDown">
                <img src="{{ url('/favicon.ico') }}" alt="Questionmark icon" />
            </div>
            <div class="login-logo">
                <a href="https://afaq-groups.com/" style="color: darkgreen;"><b>
                    Smart Booking 2025</b>
                </a>
            </div>
            <hr />
            <div class="login-form">
                <!-- BEGIN ERROR BOX -->
                <div class="alert alert-danger hide">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>خطأ!</h4>
                    رسالة الخطأ
                </div>
                <!-- END ERROR BOX -->
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <p>البريد الالكتروني.</p>
                    <input id="email" type="email" class="input-field @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <p>كلمة المرور</p>
                    <input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <p>تاكيد كلمة المرور</p>
                    <input id="password-confirm" type="password" class="input-field" name="password_confirmation" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <button type="submit" class="btn btn-login btn-reset">تحديث كلمة المرور</button>
                </form>
                  
            </div>
        </div>
    </div>

@endsection

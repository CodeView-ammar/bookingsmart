@extends('layouts.app')

@section('content')
    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="login-box clearfix animated flipInY" style="background-color: white; border: 2px solid darkgreen; border-radius: 15px;">
            <div class="page-icon animated bounceInDown">
                <img src="{{ url('/logo.png') }}" alt="Questionmark icon" width="100%" height="100%" style="clip-path: circle(50%);"/>
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
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <p>برجاء ادخال الايميل المسجل لاسم المستخدم المسجل لدينا.</p>
                    <input id="email" type="email" placeholder="البريد الالكتروني الخاص بك "  class="input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <button type="submit" class="btn btn-login btn-reset" style="background-color: darkgreen;padding:10px 60px;font-size: 16px;border-radius: 12px;">اعادة كلمة السر</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection

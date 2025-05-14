@extends('layouts.app')

@section('content')
<center>
    <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-4">
        <div class="login-box clearfix animated flipInY" style="background-color: white; border: 2px solid darkgreen; border-radius:30px;">
            <div class="page-icon animated bounceInDown" width="100%" height="100%">
                <img src="{{ url('/logo.png') }}" alt="Key icon" width="100%" height="100%" style="clip-path: circle(50%);shape-outside: circle(5%);">
            </div>
            <div class="login-logo">
                <b style="color:black">
                   ادخل اسم المستخدم</b>
                 
            </div>
            <hr>
            <div class="login-form">
                <!-- BEGIN ERROR BOX -->
                <div class="alert alert-danger hide">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4>!خطأ</h4>
                    رسالة الخطأ
                </div> 
                <!-- END ERROR BOX -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                     <input id="username" type="text" placeholder="username" class="input-field form-control user @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required  autofocus style="border-radius: 10px;border: 2px solid darkgreen;"/>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                    <strong style="color: red">{{ $message }}</strong>
                    </span>
                    @enderror

            
                

                   
                  
                    <br>
					<hr>
                    <button type="submit" style="background-color: darkgreen;padding:10px 60px;font-size: 16px;border-radius: 12px;"><b>تحقق</button>
				 
				 
                </form>
            </div>
        </div>
    </div>
 
@endsection

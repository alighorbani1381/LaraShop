<!DOCTYPE html>
<html lang="en">

<head>
    <title>فرم ورود</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('images/Login-images/icons/favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/LoginPage.css') }}">
    <link rel="stylesheet" href="{{asset('PubAdmin/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('PubAdmin/Login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}"> --}}
    <style>
    *{
        direction: rtl;
        font-family: IRANSANSWEB !important; 
    }
    .wrap-login100{
        direction: ltr !important;
    }
    #submit{
        font-size: large;
    }
    .login100-form-title{
        font-size: 25px;
    }
    .google-login , .google-login a , .google-login a i{
        font-family:FontAwesome !important;
    }
    .label-input100{
        right:10px !important;
    }

    .input100  {
        width: 100% !important;
        height: 100% !important;
        border-radius: 10px !important;
        padding-top: 25px !important;
    }
    .txt2{
        cursor: pointer !important;
        font-weight: bold;
    }
    .txt2:hover{
        text-decoration: none;
        color:#970000;
    }
    .error-login i{
        font-family: FontAwesome !important;
    }

    </style>
</head>

<body style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                        @csrf
                    <span class="login100-form-title p-b-43">
                        خوش اومدی از این قسمت وارد شو 😉
                    </span>


                    <div class="wrap-input100 validate-input" data-validate="شما باید یک ایمیل معتبر وارد کنید ">
                        <input id="email" type="text" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="focus-input100"></span>
                        <span class="label-input100">ایمیل</span>
                    </div>
                    @error('email')
                        <div class="alert alert-danger error-login" role="alert">
                            <i class="fa fa-warning" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror


                    <div class="wrap-input100 validate-input" data-validate="وارد کردن این فیلد الزامی است">
                        <input id="password" class="input100  @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">رمز عبور</span>
                    </div>



                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="input-checkbox100">
                            <label class="label-checkbox100" for="remember">
                                مرا به خاطر بسپار
                            </label>
                        </div>

                        
                        @if (Route::has('password.request'))
                            <div>
                                <a class="txt1" href="{{ route('password.request') }}">
                                    {{ __('رمز عبور خود را فراموش کرده اید؟') }}
                                </a>
                            </div>
                        @endif   
                        
                    </div>
                

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" id="submit">
                            ورود
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <a  href="{{ route('login.google') }}" class="txt2">
                        برای ورود با اکانت گوگل کلیک کنید ...👇🏻
                        </label>
                    </div>

                    <div class="login100-form-social google-login flex-c-m">
                    <a id="google-login-icon" href="{{ route('login.google') }}" class="login100-form-social-item flex-c-m p-3 mb-2 bg-danger m-r-5" style="background: #970000;">
                            <i class="fa fa-google" aria-hidden="true"></i>
                        </a>
                    </div>

                  
                    
                </form>

            <div class="login100-more" style="background-image: url('{{ asset('images/Login-images/bg-01.jpg') }}');">
                </div>
            </div>
        </div>
    </div>

            <script src="{{ asset('js/LoginPage.js') }}"></script>

</body>      
</html>




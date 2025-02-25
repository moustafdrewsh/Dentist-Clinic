<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" 
    data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark">

@include('layouts.mainhead')

<style>
    body {
        background: url("https://www.gph.ae/images/department/1000/dental-department-1624775519.jpg.jpg") ;
        background-size: 100%;
    }
    .register-container {
        background: rgba(255, 255, 255, 0.7);
        /* تقليل الشفافية */
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
        /* إضافة تأثير التمويه */
    }
    .login-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .form-label {
        display: block;
        text-align: left;
    }

    .social-buttons {
        display: flex;
        gap: 10px;
    }

    .social-buttons a {
        flex: 1;
        height: 45px;
        color: white;
        border-radius: 5px;
        text-align: center;
        line-height: 45px;
        font-weight: bold;
        text-decoration: none;
    }

    .social-google {
        background-color: #ec2c4c;
    }

    .social-facebook {
        background-color: #2c96ec;
    }

    .social-whatsapp {
        background-color: #3cec2c;
    }
</style>

<body class="app sidebar-mini">
    @include('layouts.switcher')
    @include('layouts.loader')

    <div class="page">
        <div class="page-main d-flex align-items-center justify-content-center min-vh-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center mb-4">
                            <a href="index">
                                <span class="logo-txt">Dentist Clinic</span>
                            </a>
                        </div>
                        <div class="card login-container">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">{{ __('Welcome Back !') }}</h5>
                                    <p class="text-muted">{{ __('Sign in to continue to Dentist Clinic.') }}</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="email">{{ __('Email') }}</label>
                                            <input type="email" class="form-control" id="email" name="email" 
                                                value="{{ old('email') }}" required autofocus>
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="float-end">
                                                @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="text-muted">{{ __('Forgot password?') }}</a>
                                                @endif
                                            </div>
                                            <label class="form-label" for="password">{{ __('Password') }}</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="auth-remember-check" name="remember">
                                            <label class="form-check-label" for="auth-remember-check">{{ __('Remember me') }}</label>
                                        </div>
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-100" type="submit">{{ __('Log In') }}</button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <p class="mb-0">{{ __('Don\'t have an account?') }} 
                                                <a href="{{ route('register') }}" class="fw-medium text-primary"> {{ __('Signup now') }} </a>
                                            </p>
                                        </div>
                                        <div class="social-buttons mt-4">
                                            <a href="{{ route('auth.google') }}" class="social-google">{{ __('Google') }}</a>
                                            <a href="{{ route('auth.facebook') }}" class="social-facebook">{{ __('Facebook') }}</a>
                                            <a href="{{ route('auth.whatsapp') }}" class="social-whatsapp">{{ __('WhatsApp') }}</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="responsive-overlay"></div>
    @include('layouts.commonjs')
</body>

</html>

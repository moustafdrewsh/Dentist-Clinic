<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" data-nav-layout="vertical"
    data-theme-mode="light" data-header-styles="light" data-menu-styles="dark">

@include('layouts.mainhead')

<style>
    body {
        background: url("https://www.gph.ae/images/department/1000/dental-department-1624775519.jpg.jpg");
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
                        <div class="card register-container">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">{{ __('Create a New Account') }}</h5>
                                    <p class="text-muted">{{ __('Fill in the details to create your account') }}</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="name">{{ __('Full Name') }}</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name') }}" required autofocus>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email') }}" required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password">{{ __('Password') }}</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="password_confirmation">{{ __('Confirm Password') }}</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" required>
                                            @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-100"
                                                type="submit">{{ __('Register') }}</button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <p class="mb-0">{{ __('Already have an account?') }}
                                                <a href="{{ route('login') }}" class="fw-medium text-primary">
                                                    {{ __('Sign In') }} </a>
                                            </p>
                                        </div>
                                        <div class="social-buttons mt-4">
                                            <a href="{{ route('auth.google') }}"
                                                class="social-google">{{ __('Google') }}</a>
                                            <a href="{{ route('auth.facebook') }}"
                                                class="social-facebook">{{ __('Facebook') }}</a>
                                            <a href="{{ route('auth.whatsapp') }}"
                                                class="social-whatsapp">{{ __('WhatsApp') }}</a>
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

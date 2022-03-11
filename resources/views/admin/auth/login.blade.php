<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('asset/admin/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/pages/authentication.css') }}">
</head>

<body
    class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page"
    data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- login page start -->
                <section id="auth-login" class="row flexbox-container">
                    <div class="col-xl-8 col-11">
                        <div class="card bg-authentication mb-0">
                            <div class="row m-0">
                                <!-- left section-login -->
                                <div class="col-md-6 col-12 px-0">
                                    <div
                                        class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="text-center mb-2 text-uppercase">
                                                    {{ __('login.welcome_back') }}</h4>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                {{-- <div class="d-flex flex-md-row flex-column justify-content-around">
                                                    <a href="#"
                                                        class="btn btn-social btn-google btn-block font-small-3 mr-md-1 mb-md-0 mb-1">
                                                        <i class="bx bxl-google font-medium-3"></i><span
                                                            class="pl-50 d-block text-center">Google</span></a>
                                                    <a href="#"
                                                        class="btn btn-social btn-block mt-0 btn-facebook font-small-3">
                                                        <i class="bx bxl-facebook-square font-medium-3"></i><span
                                                            class="pl-50 d-block text-center">Facebook</span></a>
                                                </div> --}}
                                                <div class="divider">
                                                    <div class="divider-text text-uppercase text-muted">
                                                        <small>{{ __('login.login_with_email') }}</small>
                                                    </div>
                                                </div>
                                                <form action="{{ route('login') }}" method="POST" id="login_form">
                                                    @csrf

                                                    <span style="color: red">{{ session('error') }}</span>

                                                    <div class="form-group mb-50">
                                                        <label class="text-bold-600"
                                                            for="exampleInputEmail1">{{ __('login.email_address') }}</label>
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="{{ __('login.email_address') }}"
                                                            value="{{ old('email') }}">
                                                        @error('email')
                                                            <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-bold-600"
                                                            for="exampleInputPassword1">{{ __('login.password') }}</label>
                                                        <input type="password" class="form-control"
                                                            id="exampleInputPassword1"
                                                            placeholder="{{ __('login.password') }}" name="password">
                                                        @error('password')
                                                            <span style="color: red">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div
                                                        class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <div class="checkbox checkbox-sm">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="exampleCheck1">
                                                                <label class="checkboxsmall" for="exampleCheck1"><small
                                                                        class="text-capitalize">
                                                                        {{ __('login.keep_me_logged_in') }}
                                                                    </small></label>
                                                            </div>
                                                        </div>
                                                        <div class="text-right"><a href="auth-forgot-password.html"
                                                                class="card-link"><small class="text-capitalize">
                                                                    {{ __('login.forgot_password?') }}
                                                                </small></a></div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary glow w-100 position-relative">{{ __('login.login') }}<i
                                                            id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                                </form>
                                                <hr>
                                                {{-- <div class="text-center"><small class="mr-25">Don't have an
                                                            account?</small><a href="{{ route('register') }}"><small>Sign
                                                                up</small></a></div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- right section image -->
                                <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                                    <div class="card-content">
                                        <ul class="nav navbar-nav float-right">
                                            <li class="dropdown dropdown-language nav-item">
                                                <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flag-icon flag-icon-us"></i>
                                                    @if (Config::get('app.locale') == 'en')
                                                        <span class="selected-language">
                                                            English
                                                        </span>
                                                    @else
                                                        <span class="selected-language">
                                                            Chinese
                                                        </span>
                                                    @endif
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                                    <a class="dropdown-item "
                                                        href="{{ route('guest.change.lang', 'en') }}"
                                                        data-language="en">
                                                        <i class="flag-icon flag-icon-us mr-50"></i>
                                                        English</a>
                                                    <a class="dropdown-item "
                                                        href="{{ route('guest.change.lang', 'ch') }}"
                                                        data-language="fr">
                                                        <i class="flag-icon flag-icon-ch mr-50"></i>
                                                        Chinese
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div>
                                            <img class="img-fluid"
                                                src="{{ asset('asset/admin/image/pages/login.png') }}"
                                                alt="branding logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- login page ends -->

            </div>
        </div>
    </div>
    <script src="{{ asset('asset/admin/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('asset/admin/js/jquery.min.js') }}"></script>
    <script>
        $('#login_form :input').click(function() {
            $('#login_form span').html('')
        });
    </script>
</body>

</html>

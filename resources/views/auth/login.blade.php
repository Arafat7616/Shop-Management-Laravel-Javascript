<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Theta is a premium responsive admin dashboard template with great features.">
    <meta name="keywords" content="responsive, admin template, dashboard template, bootstrap 4, laravel, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BD Hike Plus - Login</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Start CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- End CSS -->
    <!-- End Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- End Sweet Alert End -->
</head>
<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card" style="border: 10px solid rgba(15,231,231,0.68); border-radius: 35px;">

                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <h4 class="text-primary mb-4"><b>Login to BD Hike Plus!</b></h4>
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password">
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"  name="remember" id="rememberme" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label font-14" for="rememberme">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->

    <!-- Start Session Message -->
    <!--Check session message--->
        @if(session()->has('message'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{ session('type') }}',
                    title: '{{ session('message') }}',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>
            @php
                 session()->flash('message', null);
                 session()->flash('type', null);
            @endphp
        @endif
    <!-- End Session Message -->
</body>
</html>















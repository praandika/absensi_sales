<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/icon-logo.png') }}" type="image/png">
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                <div class="card login-card center">
                    <div class="card-body">
                        <img src="{{ asset('img/logo.png') }}" class="logo">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="group-input">
                                        <img src="{{ asset('img/user.png') }}" alt="">
                                        <input id="username" type="username"
                                            class="form-control @error('username') is-invalid @enderror custom-input center-input"
                                            name="username" value="{{ old('username') }}" required autocomplete="username"
                                            placeholder="Username" autocomplete="off" autofocus>
                                    </div>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                <div class="group-input">
                                    <img src="{{ asset('img/lock.png') }}" alt="">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror custom-input center-input" name="password"
                                            required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 d-grid gap-2">
                                    <button type="submit" class="btn btn-block custom-btn">
                                        <img src="{{ asset('img/sign-out.png') }}">&nbsp;&nbsp;{{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

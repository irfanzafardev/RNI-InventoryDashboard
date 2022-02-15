<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
		<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/extended-style.css') }}" rel="stylesheet" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md d-none navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          <div class="container">
            <div class="row login-box justify-content-center">
              <div class="col-xl-12 col-lg-12 col-md-9">
                <div class="inner-login-box card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-0">
                    <div class="row">
                      <div class="col-lg-6 d-none bg-white d-lg-flex align-items-center justify-content-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <img src="./img/ic/login-logo.png" alt="" width="360px" />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="p-5">
                          <div class="text-dark">
                            <h1 class="h4 mb-4">Log in</h1>
                          </div>
                          @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show">
                              {{ session('loginError') }}
                              {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                            </div>
                          @endif
                  
                          <form method="POST" action="{{ route('login') }}" class="user">
                            @csrf
                            <div class="form-group">
                              <label for="username">Username</label>
                              <input id="email" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('email') }}" required autocomplete="email" autofocus>
                              @error('username')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            <button type="submit" class="btn btn-dark bg-darkblue btn-login btn-block">
                              {{ __('Login') }}
                            </button>
                          </form>
                  
                          <div class="text-center mt-3">
                            <p class="small">
                              Silahkan hubungi Divisi IT RNI untuk informasi lebih
                              lanjut
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
    </div>
</body>
</html>


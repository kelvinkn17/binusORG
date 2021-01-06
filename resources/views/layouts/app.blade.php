<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BinusORG</title>

    @include('app.script')
    @include('app.style')
</head>

<body>
    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="app">
        <header class="header">
            <div class="navbar-area">
                <div class="container">
                    <nav class="navbar navbar-expand-lg ">
                        @guest
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="/images/binusorg.png" alt="">
                        </a>
                        @else
                        <?php $role = Auth::user()->is_admin; ?>
                        @if($role == 1)
                        <a class="navbar-brand" href="{{ route('admin.home') }}">
                            <img src="/images/binusorg.png" alt=""> <strong>for Admin</strong>
                        </a>
                        @elseif($role == 0)
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="/images/binusorg.png" alt="">
                        </a>
                        @endif
                        @endguest

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
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

                                @if($role == 1)
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.membership') }}">Keanggotaan</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.organization') }}">Organisasi</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @elseif($role==0)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('organization') }}">Organisasi</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endif
                                @endguest
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </header>

        <main class="" style="padding-top: 120px">
            @yield('content')
        </main>
    </div>

</body>

</html>

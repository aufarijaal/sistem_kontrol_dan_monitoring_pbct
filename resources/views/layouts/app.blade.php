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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> --}}

</head>
<body style="background-color: #F7F8FA">
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
            <div class="modal-body">
                <div class="list-group">
                    <a href="{{ route('pengaturan') }}" class="list-group-item list-group-item-action {{ Route::currentRouteNamed('pengaturan') ? 'active' : '' }}">Pengaturan</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"
                        class="list-group-item list-group-item-action">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal" id="timePickModal" tabindex="-1" aria-labelledby="timePickModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
            <div class="modal-body">
                <form action="" method="post" class="d-flex flex-column justify-content-center align-items-center gap-3">
                    @csrf
                    <div class="d-flex flex-row gap-3">
                        <div class="d-flex flex-column gap-1" style="width: 50px">
                            <button type="button" class="btn btn-info shadow-none" id="stepUpJam" ><i class="bi bi-caret-up-fill"></i></button>
                            <span class="align-self-center" id="textJam">0</span>
                            <input type="number" name="timerJam" id="timerJam" class="d-none" min="0" max="99">
                            <button type="button" class="btn btn-info shadow-none" id="stepDownJam" ><i class="bi bi-caret-down-fill"></i></button>
                        </div>
                        <div class="d-flex flex-column gap-1" style="width: 50px">
                            <button type="button" class="btn btn-info shadow-none" id="stepUpMenit" ><i class="bi bi-caret-up-fill"></i></button>
                            <span class="align-self-center" id="textMenit">0</span>
                            <input type="number" name="timerMenit" id="timerMenit" class="d-none" min="0" max="99">
                            <button type="button" class="btn btn-info shadow-none" id="stepDownMenit" ><i class="bi bi-caret-down-fill"></i></button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success shadow-none">OK</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    <div id="app">
        <div class="container-fluid">
        @auth
            <!-- Bottom Navbar -->
            <nav class="navbar navbar-light navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom bottomNav">
                <ul class="navbar-nav nav-justified w-100">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="bottom-nav-icon bi bi-house-door{{ Route::currentRouteNamed('home') ? '-fill' : '' }}" style="font-size: 2rem"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('stat') }}" class="nav-link">
                            <i class="bottom-nav-icon bi bi-bar-chart{{ Route::currentRouteNamed('stat') ? '-fill' : '' }}" style="font-size: 2rem"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" id="btnTriggerModal" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bottom-nav-icon bi bi-person{{ Route::currentRouteNamed('pengaturan') ? '-fill' : '' }} iconPerson" style="font-size: 2rem"></i>
                        </a>
                </ul>
            </nav>
            <!-- Side Navbar -->
            <div class="row flex-nowrap">
                <div class="col-auto sidenav d-none d-md-block d-lg-block d-xl-block d-xxl-block">
                    <div class="d-flex px-1 text-white min-vh-100">
                        <ul class="nav d-flex flex-column justify-content-around align-items-center" id="menu">
                            <li>
                                <img src="{{ asset('images/iconsvg.svg') }}" style="width: 3rem">
                            </li>
                            <li>
                                <a href="{{ route('home') }}" class="nav-link px-0 align-middle" title="Home">
                                    <i class="sidenav-icons bi bi-house-door{{ Route::currentRouteNamed('home') ? '-fill' : '' }}" style="font-size: 2rem; color: white"></i>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('stat') }}" class="nav-link px-0 align-middle" title="Statistik">
                                    <i class="sidenav-icons bi bi-bar-chart{{ Route::currentRouteNamed('stat') ? '-fill' : '' }}" style="font-size: 2rem; color: white"></i>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('pengaturan') }}" class="nav-link px-0 align-middle" title="Pengaturan">
                                    <i class="sidenav-icons bi bi-gear{{ Route::currentRouteNamed('pengaturan') ? '-fill' : '' }}" style="font-size: 2rem; color: white"></i>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}"
                                class="nav-link px-0 align-middle"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                title="Logout">
                                    <i class="sidenav-icons bi bi-box-arrow-right" style="font-size: 2rem; color: white"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col py-3">
                    @yield('content')
                </div>
            </div>
        @endauth
        </div>
        @guest
            <main>
                @yield('content')
            </main>
        @endguest
    </div>
    <script>
        const btnOnOffBlender = document.querySelector('.onOffBlender')
        const btnStepUpJam = document.getElementById('stepUpJam')
        const btnStepUpMenit = document.getElementById('stepUpMenit')
        const btnStepDownJam = document.getElementById('stepDownJam')
        const btnStepDownMenit = document.getElementById('stepDownMenit')
        const textJam = document.getElementById('textJam')
        const textMenit = document.getElementById('textMenit')
        const inputJam = document.getElementById('timerJam')
        const inputMenit = document.getElementById('timerMenit')

        btnOnOffBlender.addEventListener('click', () => {
            btnOnOffBlender.classList.toggle('onOffBlender-on')

            if(btnOnOffBlender.classList.contains('onOffBlender-on')) {
                btnOnOffBlender.style.backgroundImage = 'url(http://127.0.0.1:8000/images/fan-on.svg) center center no-repeat';

            }else {
                btnOnOffBlender.style.backgroundImage = 'url(http://127.0.0.1:8000/images/fan.svg) center center no-repeat';
            }
        })

        function stepUpJam() {
            inputJam.stepUp()
            textJam.innerText = inputJam.value
        }
        function stepDownJam() {

        }
        function stepUpMenit() {

        }
        function stepDownMenit() {

        }
    </script>
</body>
</html>

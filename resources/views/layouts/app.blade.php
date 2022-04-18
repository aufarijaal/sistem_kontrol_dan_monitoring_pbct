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
    {{-- App Manifest --}}
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#F1F5F9">
    <style>
        html, body {
            height: 100%;
        }
        #stepUpJam, #stepDownJam, #stepUpMenit, #stepDownMenit {
            background-color: #5893FA;
        }
        #btnSubmitTimer {
            background-color: #54E8B2;
        }
        .shadow-custom {
            box-shadow: 0px 15px 40px 6px rgba(0, 0, 0, 0.06);
            border-radius: 30px;
        }
        .rounded-custom {
            border-radius: 1rem;
        }
        /* * {
            border: 1px solid red;
        } */
        .bg-custom-blue {
            background-color: #5893FA;
        }
        .text-green {
            color: #54E8B2;
        }
        .text-slate {
            color: #1A1D27;
        }
        .text-blue{
            color: #5893FA;
        }
        .border-blue {
            border-color: #5893FA;
        }
        .text-orange {
            color: #FE804D;
        }
        .bg-orange {
            background-color: #FE804D;
        }
        .text-yellow {
            color: #F5C642;
        }
        .bg-custom-gray {
            background-color: #F1F5F9;
        }
        .bg-custom-indigo {
            background-color: #9584F5;
        }
        .mb-10 {
            margin-bottom: 8rem;
        }
        .jb {
            justify-content: space-between;
        }
        // X-Small devices (portrait phones, less than 576px)
        // No media query for `xs` since this is the default in Bootstrap

        // Small devices (landscape phones, 576px and up)
        @media (min-width: 576px) {
            .infoStat {
                margin-bottom: 300px;
            }
         }

        // Medium devices (tablets, 768px and up)
        @media (min-width: 768px) {
            .infoStat {
                margin-bottom: 0px;
            }
         }

        // Large devices (desktops, 992px and up)
        @media (min-width: 992px) {
            .infoStat {
                margin-bottom: 0px;
            }
         }
    </style>
    <script src="{{ asset('js/chartjs/dist/chart.js') }}"></script>
</head>
<body style="background-color: #F1F5F9">
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
            <div class="modal-header">
                <h5 class="modal-title">Timer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" class="d-flex flex-column justify-content-center align-items-center gap-3">
                    @csrf
                    <div class="d-flex flex-row gap-3">
                        <div class="d-flex flex-column gap-1 text-center" style="width: 50px">
                            Jam
                            <button type="button" class="btn shadow-none" id="stepUpJam" ><i class="bi bi-caret-up-fill"></i></button>
                            <span class="align-self-center" id="textJam">0</span>
                            <input type="number" name="timerJam" id="timerJam" class="d-none" min="0" max="99">
                            <button type="button" class="btn shadow-none" id="stepDownJam" ><i class="bi bi-caret-down-fill"></i></button>
                        </div>
                        <div class="d-flex flex-column gap-1 text-center" style="width: 50px">
                            Menit
                            <button type="button" class="btn shadow-none" id="stepUpMenit" ><i class="bi bi-caret-up-fill"></i></button>
                            <span class="align-self-center" id="textMenit">0</span>
                            <input type="number" name="timerMenit" id="timerMenit" class="d-none" min="0" max="99">
                            <button type="button" class="btn shadow-none" id="stepDownMenit" ><i class="bi bi-caret-down-fill"></i></button>
                        </div>
                    </div>
                    <button type="submit" class="btn shadow-none" id="btnSubmitTimer">OK</button>
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
            <div class="row flex-nowrap side-navbar">
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
<script src="{{ asset('js/chart-setup.js') }}"></script>
<script src="{{ asset('js/helpers.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>

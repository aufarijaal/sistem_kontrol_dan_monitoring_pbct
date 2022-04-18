<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=NotoSans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            .btn-login {
                background-color: rgba(84, 232, 178, 1);
                color: white;
                border: 2px solid transparent;
            }

            .btn-login:hover {
                background-color: rgba(84, 232, 178, 0);
                color: rgba(84, 232, 178, 1);
                border: 2px solid rgba(84, 232, 178, 1);
            }

            .btn-register {
                background-color: rgba(254, 128, 77);
                color: white;
                border: 2px solid transparent;
            }

            .btn-register:hover {
                background-color: rgba(254, 128, 77, 0);
                color: rgba(254, 128, 77, 1);
                border: 2px solid rgba(254, 128, 77, 1);
            }
            /* waves */
            .ocean {
            height: 80px; /* change the height of the waves here */
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            overflow-x: hidden;
            }

            .wave {
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 88.7'%3E%3Cpath d='M800 56.9c-155.5 0-204.9-50-405.5-49.9-200 0-250 49.9-394.5 49.9v31.8h800v-.2-31.6z' fill='%23fe804d'/%3E%3C/svg%3E");
            position: absolute;
            width: 200%;
            height: 100%;
            animation: wave 10s -3s linear infinite;
            transform: translate3d(0, 0, 0);
            opacity: 0.8;
            }

            .wave:nth-of-type(2) {
            bottom: 0;
            animation: wave 18s linear reverse infinite;
            opacity: 0.5;
            }

            .wave:nth-of-type(3) {
            bottom: 0;
            animation: wave 20s -1s linear infinite;
            opacity: 0.5;
            }

            @keyframes wave {
                0% {transform: translateX(0);}
                50% {transform: translateX(-25%);}
                100% {transform: translateX(-50%);}
            }
        </style>
        <title>{{ env('APP_NAME') }}</title>
    </head>
    <body style="background-color: #f1f5f9">
        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
        <div class="container d-flex justify-content-center p-5">
            <img src="{{ asset('images/iconsvg.svg') }}" alt="">
        </div>
        <div class="container">
            <h1 style="font-weight: 700;" class="text-center">Sistem Kontrol dan Monitoring Prototipe Alat Pembuat Bubuk Cangkang Telur</h1>
            <h6 class="text-muted text-center py-3">Sistem untuk kontrol dan monitoring untuk Alat Pembuat Bubuk Cangkang Telur.</h6>
        </div>
        <div class="container d-flex justify-content-center">
            <!-- Authentication Links -->
            <div>
                @guest
                    @if (Route::has('login'))
                        <button class="btn btn-login px-3 py-2 shadow-none">
                            <a class="text-reset text-decoration-none link-login" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </button>
                    @endif

                    @if (Route::has('register'))
                        <button class="btn btn-register px-3 py-2 shadow-none">
                            <a class="text-reset text-decoration-none link-register" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </button>
                    @endif
                @endguest
            </div>
        </div>
        {{-- <div class="container d-flex justify-content-center mt-3 offset-1">
            <img src="{{ asset('images/illustration.png') }}" width="400">
        </div> --}}
    </body>
</html>

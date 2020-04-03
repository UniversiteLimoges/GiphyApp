<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GiPy</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

             .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .gipy-img {
                height: 10vh;
            }

            .git {
                display: flex;
                justify-content: center;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-left links"> <img class="gipy-img" src="{{ asset('img/GiPy_logo.png') }}"></div>
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    GiPy
                </div>
                <p>
                    Gify is an test project where we will test <strong>SPA</strong> architecture based on <strong>Laravel</strong> server side and <strong>Vue</strong> client side.
                </p>
                <p style="margin-bottom: 10px">
                    Through Gify, users can to meet each others according to some attributes : Geolocalisation and Tourism tastes
                </p>

                <div class="links git">
                    <a href="https://github.com/UniversiteLimoges/GiphyApp"><img src="{{ asset('img/GitHub_Logo.png') }}" width="50px"></a>
                </div>
            </div>
        </div>
        <!--
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" /for/="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
                </div>
                <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" /for/="password">
                    Password
                </label>
                <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                <p class="text-red-500 text-xs italic">Please choose a password.</p>
                </div>
                <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Sign In
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                    Forgot Password?
                </a>
                </div>
            </form>
            <p class="text-center text-gray-500 text-xs">
                ©2019 iTech Empires. All rights reserved.
            </p>
            </div>


            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
              <p class="font-bold">Be Warned</p>
              <p>Something not ideal might be happening.</p>
            </div>
        -->
    </body>
</html>

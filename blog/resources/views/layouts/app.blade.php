<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- CSS -->
        <link href="{{ asset('css/lity.min.css') }}" rel="stylesheet">



<!------ Include the above in your HEAD tag ---------->




        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">สมัครสมาชิก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">เกี่ยวกับ</a>
                            </li>
                            @else
                            <div class="dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin') }}">ตั้งค่าผู้ใช้</a>
                                    </li>
                                    <li class="nav-item">

                                        <a class="nav-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            {{ __('ออกจากระบบ') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                    </li>


                                </ul>
                            </div>










                            <li class="nav-item dropdown">



                            </li>
                            <div class="dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    จัดการข้อมูล <span class="caret"></span>
                                </a>
                                <!--                                <button class="btn btn-default dropdown-toggle"  data-toggle="dropdown">จัดการข้อมูล
                                                                    <span class="caret"></span></button>-->
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">หมวดหมู่สินค้า</li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('typeproduct') }}">ประเภทสินค้า</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('product') }}">สินค้า</a>
                                    </li>

                                    <li class="divider"></li>
                                    <li class="dropdown-header">หมวดหมู่หนังสือ</li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('typebooks') }}">ประเภทหนังสือ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('books') }}">หนังสือ</a>
                                    </li>
                                </ul>
                            </div>





                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">เกี่ยวกับ</a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/lity.min.js') }}" defer></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        @yield('footer')

    </body>
</html>

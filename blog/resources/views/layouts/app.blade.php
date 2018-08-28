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
    
        <!--font-->
       <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

        <!------ Include the above in your HEAD tag ---------->




        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

         <!-- CSS  Boostrap 4.0-->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        
        
        
    </head>
    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }}</a>

            @guest
            <nav class="my-2 my-md-0 mr-md-3">
                <a class=" p-2 text-white" href="{{ route('login') }}">เข้าสู่ระบบ</a>

                <a class="p-2 text-white" href="{{ route('register') }}">สมัครสมาชิก</a>
                <a class="p-2 text-white" href="{{ route('about') }}">เกี่ยวกับ</a>

            </nav>
        </nav>
        @else
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">



            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">หน้าแรก <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"  href="{{ route('admin') }}">ตั้งค่าผู้ใช้</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                {{ __('ออกจากระบบ') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <!--          <div class="dropdown-divider"></div>-->
                                <a class="dropdown-item" href="#"></a>
                        </div>  
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            จัดการข้อมูล
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">หมวดหมู่สินค้า</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('typeproduct') }}">ประเภทสินค้า</a>
                            <a class="dropdown-item" href="{{ route('product') }}">สินค้า</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="">หมวดหมู่สินค้า</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('typebooks') }}">ประเภทหนังสือ</a>
                            <a class="dropdown-item" href="{{ route('books') }}">หนังสือ</a>

                        </div>  
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('about') }}">เกี่ยวกับ <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>


    </nav>

    <div class="row">


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-1 px-6">



            @endguest


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

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'INVESTMANIA') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" defer integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" defer integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Scripts -->

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('/image/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('/image/favicon.ico')}}" type="image/x-icon">
    <!-- Favicon -->

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/footer.css')}}">
    <!-- Styles -->

    <!-- Fonts Awesome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Fonts Awesome CDN -->


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Fonts -->
    @yield('assets')


</head>

<body>
    <div id="app">
        <header class="shadow-sm">

            <nav class="navbar navbar-expand-md navbar-dark navbar-fixed-top">
                <div class="container">
                    <a class="navbar-brand font-weight-normal" href="{{ url('/') }}">
                        <img src="/image/logo.png" alt="INESTECGO" id="logo">

                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto pl-lg-5 pl-0">



                            <li class="dropdown">
                                <a href="#" class="nav-item nav-link text-light dropdown-toggle" data-toggle="dropdown">For Traders</a>
                                <div class="dropdown-menu">
                                    <a href="/cs" class="dropdown-item">Mobile App</a>
                                    <a href="/cs" class="dropdown-item">Our Fees</a>
                                    <a href="/cs" class="dropdown-item">Payment Cards</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-item nav-link text-light dropdown-toggle" data-toggle="dropdown">For Lenders</a>
                                <div class="dropdown-menu">
                                    <a href="/stacking" class="dropdown-item">Stacking</a>
                                    <a href="/lendingpro" class="dropdown-item">Lending Pro</a>
                                    <a href="/cs" class="dropdown-item">Borrow</a>
                                    <a href="/lendingproducts" class="dropdown-item">Lending Products</a>

                                </div>
                            </li>

                            <li class="dropdown">
						        <a href="/aboutus" class="nav-item nav-link text-light dropdown-toggle" data-toggle="dropdown">About Us</a>

                                <div class="dropdown-menu">
                                    <a href="/aboutus" class="dropdown-item">About INVESTMANIA</a>
                                    <!--
                                    <a href="/blog" class="dropdown-item">Blog</a>
                                    <a href="/cs" class="dropdown-item">Press</a>
                                    -->
                                </div>
					        </li>

                            <li>
                                <a href="/contractus" class="nav-item nav-link text-light">Contact Us</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a href="/user" class="dropdown-item text-light">User Panel</a>
                                            <a class="dropdown-item text-light" href="{{ route('logout') }}"
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
        </header>



        <main class="py-4">
            @yield('content')
        </main>



        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="border-top: 1px solid white; border-bottom: 1px solid white; ">

                        <div class="footer-inner">

                            <div class="footer-left">
                                <h3>Follow us</h3>
                                <h6>For more updates, follow us on Social Media</h6>

                            </div>

                            <div class="footer-right">

                                <!-- Section: Social media -->

                                    <!-- Facebook -->
                                    <a class="btn btn-outline-light btn-floating " href="https://www.facebook.com/INVESTMANIA" role="button"><i class="fab fa-facebook-f"></i></a>

                                    <!-- Twitter -->
                                    <a class="btn btn-outline-light btn-floating " href="#" role="button"><i class="fab fa-twitter"></i></a>

                                    <!-- Discord -->
                                    <a class="btn btn-outline-light btn-floating " href="https://discord.gg/KDSnwKWy" role="button"><i class="fab fa-discord"></i></a>

                                    <!-- Instagram -->
                                    <a class="btn btn-outline-light btn-floating " href="#" role="button"><i class="fab fa-instagram"></i></a>


                                  <!-- Section: Social media -->

                            </div>


                        </div>




                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="footer-links">
                            <a class="navbar-brand font-weight-normal" href="{{ url('/') }}">
                                <img src="/image/logo.png" alt="INESTECGO" id="logo">
                            </a>
                        </div>


                    </div>
                    <div class="col-md-10">

                        <div class="footer-links">

                            <a>Copyright © 2021. All rights reserved.</a> <br>

                            <a href="/termsandconditions">Terms and Condition</a> <span>|</span>
                            <a href="/contractus">Contact Us</a> <span>|</span>
                            <a href="/privacypolicy">Privacy Policy</a>  <span>|</span>
                            <a href="/aboutus">About Us</a>

                        </div>

                    </div>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta property="og:site_name" content="Laravel Secrets">
    <meta property="og:title" content="{{ $fundRaiserPost->title }}">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en">
    <meta property="og:url" content="https://laravelsecrets.com/">
    <meta property="og:image" content="{{ asset('storage/fundraiser_post/' . $fundRaiserPost->image) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt"
        content="Build your knowledge with the hidden Laravel Secrets you find in this book. Learn about the why and not the what.">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@stefanbauerme">
    <meta name="twitter:creator" content="@stefanbauerme">
    <meta name="twitter:title" content="{{ $fundRaiserPost->title }}">
    <meta name="twitter:image" content="{{ asset('storage/fundraiser_post/' . $fundRaiserPost->image) }}"> --}}

    <title>@yield('title') - {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @yield('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.min.css') }}">
    <link type="text/css" href="{{ asset('frontend/css/sweetalert2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

</head>

<body>

    <!-- header part start  -->
    <header id="top_header">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-6">
                    <div class="header_left">
                        <p><i class="fa-sharp fa-solid fa-paper-plane"></i> admin@ifundeducation.com</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="header_right">
                        <ul>
                            @guest()
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Sign Up</a></li>
                            @else
                                <li>
                                    <a href="#">
                                        @if (auth()->user()->photo)
                                            <img src="{{ asset('storage/profile_photo/' . auth()->user()->photo) }}"
                                                alt="{{ auth()->user()->first_name }}" width="35"
                                                class="rounded-circle">
                                        @elseif(auth()->user()->avatar)
                                            <img src="{{ auth()->user()->avatar }}" class="rounded-circle"
                                                alt="{{ auth()->user()->first_name }}" width="35">
                                        @else
                                            <img src="{{ Avatar::create(auth()->user()->first_name)->setDimension(35)->setFontSize(14)->toBase64() }}"
                                                alt="{{ auth()->user()->first_name }}">
                                        @endif
                                        <i class="fa-solid fa-angle-down"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.dashboard.index') }}">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.profile.edit') }}">Profile</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                  this.closest('form').submit();">Sign
                                                    Out</a>

                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header part end -->

    <!-- main menu part start -->
    <nav class="navbar navbar-expand-md" id="main_navigation">
        <div class="container">
            <a class="logo" href="{{ route('front.index') }}">
                <img src=" {{ asset('frontend/images/logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#iNav">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="iNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('front.index') ? 'active' : '' }}"
                            href="{{ route('front.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">about</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fundraiser.html">Fundraiser</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">start a fundraiser</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- main menu part end -->

    @yield('content')

    <!-- footer part start -->
    <footer id="footer" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="footer_about">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="">
                        <strong>FUND AN EDUCATION,FUND A FUTURE</strong>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisci elit. Proin non felis tellus. Maurisu
                            blandit eu enim
                            sollicitudin.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="footer_contact px-lg-3">
                        <h3>Links</h3>
                        <div class="d-flex">
                            <ul class="w-50">
                                <li><a href="#"><i class="far fa-arrow-alt-circle-right"></i>About</a></li>
                                <li><a href="#"><i class="far fa-arrow-alt-circle-right"></i>Services</a></li>
                                <li><a href="#"><i class="far fa-arrow-alt-circle-right"></i>Contact</a></li>
                            </ul>
                            <ul class="w-50">
                                <li><a href="faq.html"><i class="far fa-arrow-alt-circle-right"></i>Faq</a></li>
                                <li><a href="terms.html"><i class="far fa-arrow-alt-circle-right"></i>Terms &
                                        Condition</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer_contact">
                        <h3>Contact</h3>
                        <ul>
                            <li><i class="fas fa-envelope"></i> info@iFundEducation.com</li>
                            <li><i class="fas fa-globe"></i> www.iFundEducation.com</li>
                            <li><i class="fas fa-phone"></i> 0123546987</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row bottom_footer align-items-center">
                <div class="col-md-6">
                    <div class="footer_copy">
                        <p>Copyright &copy; All rights reserved by iFundEducation</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="footer_social">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end -->


    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <script src="{{ asset('frontend/js/sweetalert2.min.js') }}"></script>

    @include('flashmessage')
    @yield('script')
</body>

</html>

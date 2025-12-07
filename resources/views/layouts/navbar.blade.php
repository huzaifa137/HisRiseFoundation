<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HisRise - Foundation</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar d-none d-lg-block">
            <div class="topbar-inner">
                <div class="row gx-0">
                    <div class="col-lg-7 text-start">
                        <div class="h-100 d-inline-flex align-items-center me-4">
                            <span class="fa fa-phone-alt me-2 text-dark"></span>
                            <a href="#" class="text-secondary"><span>+012 345 6789</span></a>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center">
                            <span class="far fa-envelope me-2 text-dark"></span>
                            <a href="#" class="text-secondary"><span>info@HisRiseFoundation.org</span></a>
                        </div>
                    </div>
                    <div class="col-lg-5 text-end">
                        <div class="h-100 d-inline-flex align-items-center">
                            <span class="text-body">Follow Us:</span>
                            <a class="text-dark px-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="text-dark px-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="text-dark px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="text-dark px-2" href=""><i class="fab fa-instagram"></i></a>
                            @if(session()->has('LoggedAdmin'))
                                <a class="text-body ps-4" href="{{ route('admin.dashboard') }}">
                                    <i class="fa fa-tachometer-alt text-dark me-1"></i> Dashboard
                                </a>
                            @else
                                <a class="text-body ps-4" href="{{ url('login') }}">
                                    <i class="fa fa-lock text-dark me-1"></i> Login
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-3">
                <a href="{{ url('index') }}" class="navbar-brand">
                    <img src="img/logo.png" alt="HisRise Foundation Logo" class="img-fluid"
                        style="width: 100px; height: auto;" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav ms-lg-auto mx-xl-auto">
                        <a href="{{ url('index') }}"
                            class="nav-item nav-link {{ request()->is('index') ? 'active' : '' }}">Home</a>
                        <a href="{{ url('about') }}"
                            class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
                        <a href="{{ url('activity') }}"
                            class="nav-item nav-link {{ request()->is('activity') ? 'active' : '' }}">Activities</a>
                        <div class="nav-item dropdown 
    {{ request()->is('event') || request()->is('Volunteer') || request()->is('Partner') ? 'active' : '' }}">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                Get Involved
                            </a>
                            <div class="dropdown-menu m-0 rounded-0">
                                <a href="{{ url('event') }}"
                                    class="dropdown-item {{ request()->is('event') ? 'active' : '' }}">Events</a>

                                <a href="{{ url('volunteers') }}"
                                    class="dropdown-item {{ request()->is('volunteers') ? 'active' : '' }}">Volunteers</a>

                                <a href="{{ url('Partners') }}"
                                    class="dropdown-item {{ request()->is('Partners') ? 'active' : '' }}">Partners</a>
                            </div>
                        </div>
                        <a href="{{ url('sermon') }}"
                            class="nav-item nav-link {{ request()->is('sermon') ? 'active' : '' }}">Our Programs</a>
                        <a href="{{ url('blog') }}"
                            class="nav-item nav-link {{ request()->is('blog') ? 'active' : '' }}">Our Blogs</a>
                        <a href="{{ url('contact') }}"
                            class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                    </div>
                    <a href="" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">Donate</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Topbar End -->
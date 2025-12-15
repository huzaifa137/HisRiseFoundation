@include('layouts.navbar')

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Volunteers</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">About</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<style>
    .text-justify {
        text-align: justify;
    }
</style>

<div class="container-fluid testimonial cocoa-blush-bg position-relative">

    <!-- DOT DECORATION -->
    <span style="
        position: absolute;
        width: 220px;
        height: 220px;
        top: 80px;
        right: 60px;
        background-image: radial-gradient(
            rgba(141, 110, 99, 0.35) 1.5px,
            transparent 1.5px
        );
        background-size: 14px 14px;
        z-index: 0;
    "></span>

    <div class="container">
        <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="text-uppercase text-center text-primary display-6">Our Volunteers</p>
            <p class="pb-0 text-center">
                Meet the passionate individuals dedicated to uplifting lives and advancing the mission of HisRise
                Foundation.
            </p>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item text-center">
                    <div class="team-img-container">
                        <img class="img-fluid rounded-circle" src="/img/team-1.JPG" alt="JJengo Peter">
                    </div>
                    <div class="team-text">
                        <h4 class="mb-0">JJengo Peter</h4>
                        <p class="text-primary">VOLUNTEER</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item text-center">
                    <div class="team-img-container">
                        <img class="img-fluid rounded-circle" src="/img/team-1.JPG" alt="Najjemba Rehemah">
                    </div>
                    <div class="team-text">
                        <h4 class="mb-0">Najjemba Rehemah</h4>
                        <p class="text-primary">VOLUNTEER</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item text-center">
                    <div class="team-img-container">
                        <img class="img-fluid rounded-circle" src="/img/team-1.JPG" alt="Nankya Racheal">
                    </div>
                    <div class="team-text">
                        <h4 class="mb-0">Nankya Racheal</h4>
                        <p class="text-primary">VOLUNTEER</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item text-center">
                    <div class="team-img-container">
                        <img class="img-fluid rounded-circle" src="/img/team-1.JPG" alt="Kayemba Regan">
                    </div>
                    <div class="team-text">
                        <h4 class="mb-0">Kayemba Regan</h4>
                        <p class="text-primary">VOLUNTEER</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@include('layouts.footer')
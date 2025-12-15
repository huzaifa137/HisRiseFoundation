@include('layouts.navbar')

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Our Team</h1>
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


<!-- Team Start -->
<div class="container-fluid team">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">

            <h1 class="display-3">Meet Our Leadership</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-xl-5">
                <div class="team-img wow zoomIn" data-wow-delay="0.1s">
                    <img src="img/president.jpg" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-xl-7">
                <div class="team-item wow fadeIn" data-wow-delay="0.1s">
                    <h1>Isiko Isaac</h1>
                    <h5 class="fw-normal fst-italic text-primary mb-4">President (CEO)</h5>
                    <p class="mb-4" style="text-align: justify;">
                        Isiko Isaac is a Public Health Data Scientist, nonprofit leader, and visionary founder of
                        HisRise
                        Foundation. Based in Vancouver, Canada, and studying at the University of British Columbia,
                        Isaac combines expertise in data analysis, project coordination, and strategic partnerships
                        with
                        a passion for youth empowerment and educational equity. He has led initiatives across Uganda
                        and India, and served as a project coordinator in Canada, from founding the HisRise
                        Foundation (formerly Ishak Community Foundation) to coordinating mentorship programs for
                        marginalised students in British Columbia, Canada, and Uganda.
                    </p>

                    <p class="mb-4" style="text-align: justify;">His work spans education,reproductive health, mental
                        health counselling, and
                        climate action, all aligned with the United
                        Nations Sustainable Development Goals (SDGs). Isaac is also a published researcher with
                        contributions in malaria, HIV, cervical cancer, and adolescent health, with articles in
                        journals
                        such as Malaria Journal, BMC Paediatrics, and Health Science Reports. His academic journey
                        includes degrees in Public Health and Computer Engineering, and he is currently a graduate
                        student in Population & Public Health at UBC. Recognised with multiple scholarships and
                        awards, Isaac embodies resilience and vision. His mission is clear: to transform
                        vulnerability
                        into strength and raise a generation of boys who rise as leaders, innovators, and
                        changemakers
                        for a more just and sustainable world</p>
                    <div class="team-icon d-flex pb-4 mb-4 border-bottom border-primary">
                        <a class="btn btn-primary btn-lg-square me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-lg-square me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-primary btn-lg-square me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-primary btn-lg-square"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid testimonial bronze-olive-bg">
    <div class="container">
        <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="text-uppercase text-center text-primary display-6 mt-5">Our Team</p>
            <p class="pb-0 text-center">
                Meet the passionate individuals dedicated to uplifting lives and advancing the mission of </br> HisRise
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
<!-- Team End -->

@include('layouts.footer')
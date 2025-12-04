@include('layouts.navbar') 

        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="display-1 text-dark">Events</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-dark" aria-current="page">Events</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->

<!-- Events Start -->
<div class="container-fluid event py-5">
    <div class="container py-5">
        <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">
            Upcoming <span class="text-primary">Events</span>
        </h1>

        <!-- Event 1 -->
        <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
            <div class="col-3 col-lg-2 pe-0">
                <div class="text-center border-bottom border-dark py-3 px-2">
                    <h6>12 Feb 2025</h6>
                    <p class="mb-0">Wed 10:00</p>
                </div>
            </div>
            <div class="col-9 col-lg-6 border-start border-dark pb-5">
                <div class="ms-3">
                    <h4 class="mb-3">Community Health Outreach</h4>
                    <p class="mb-4">
    A free community medical outreach providing essential health services such as basic checkups, health 
    education, wellness counseling, and preventive care. This initiative is dedicated to supporting 
    underserved families, increasing health awareness, and promoting long-term wellbeing within our community.
</p>

                    
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="overflow-hidden mb-5">
                    <img src="img/events-1.jpg" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>

        <!-- Event 2 -->
        <div class="row g-4 event-item wow FadeIn" data-wow-delay="0.3s">
            <div class="col-3 col-lg-2 pe-0">
                <div class="text-center border-bottom border-dark py-3 px-2">
                    <h6>25 Mar 2025</h6>
                    <p class="mb-0">Tue 09:30</p>
                </div>
            </div>
            <div class="col-9 col-lg-6 border-start border-dark pb-5">
                <div class="ms-3">
                    <h4 class="mb-3">Youth Skills Training Workshop</h4>
                    <p class="mb-4">
    A one-day capacity-building workshop designed to equip young people with essential digital, leadership,
    and entrepreneurial skills. This program empowers participants to discover their potential, build
    confidence, and gain practical knowledge that prepares them for future career and economic opportunities.
</p>

                    
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="overflow-hidden mb-5">
                    <img src="img/events-2.jpg" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>

        <!-- Event 3 -->
        <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.5s">
            <div class="col-3 col-lg-2 pe-0">
                <div class="text-center border-bottom border-dark py-3 px-2">
                    <h6>10 Apr 2025</h6>
                    <p class="mb-0">Thu 14:00</p>
                </div>
            </div>
            <div class="col-9 col-lg-6 border-start border-dark pb-5">
                <div class="ms-3">
                    <h4 class="mb-3">Women Empowerment Seminar</h4>
                    <p class="mb-4">
    A transformative empowerment seminar dedicated to enhancing financial literacy, personal development, and 
    rights awareness for women in underserved communities. This seminar aims to inspire confidence, provide 
    valuable skills, and foster a sense of empowerment, enabling women to take charge of their financial futures, 
    advocate for their rights, and lead meaningful change in their communities.
</p>

                    
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="overflow-hidden mb-5">
                    <img src="img/events-3.jpg" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Events End -->


   @include('layouts.footer')

@include('layouts.navbar')

<style>
    .counter {
        display: inline-block;
    }
</style>


<style>
    .partner-slider {
        width: 100%;
        overflow: hidden;
        position: relative;
        padding: 20px 0;
    }

    .partner-track {
        display: flex;
        width: calc(250px * 14);
        /* 14 logos: 7 originals + 7 duplicates */
        animation: scroll 25s linear infinite;
    }

    .partner-track img {
        width: 150px;
        height: 100px;
        object-fit: contain;
        margin-right: 40px;
        border-radius: 8px;
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }
</style>

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-header-inner animated zoomIn">
                    <p class="fs-4 text-dark">WELCOME TO HISRISE FOUNDATION</p>
                    <h6 class="display-1 mb-5 text-dark">Empowering Boys to Rise as
                        Leaders, Innovators, and Changemakers</h6>
                    <a href="" class="btn btn-primary py-3 px-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- About Satrt -->
<div class="container-fluid about">
    <div class="container">
        <div class="row pb-5">
            <div class="col-xl-6 ">
                <div class="row g-4">
                    <div class="col-12">
                        <img src="img/about-4.jpg" class="img-fluid h-100 wow zoomIn" data-wow-delay="0.1s" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="fs-5 text-uppercase text-primary">About THE HisRise</p>
                <h1 class="display-5 pb-4 m-0">HisRise Foundation</h1>
                <p class="pb-2" style="text-align: justify;">
                    Formally known as the Ishak Community Foundation, HisRise Foundation was registered in
                    2021 as a community-based organisation in Jinja District, Uganda. Founded by Isiko Isaac,
                    HisRise exists to restore dignity and opportunity to boys and young men who are often
                    overlooked in development efforts.
                </p>

                <p class="pb-2" style="text-align: justify;">Our mission is to empower boys through education, skills
                    development, mentorship, and
                    leadership training. We believe that when boys are guided to make responsible choices,
                    strengthen their resilience, and embrace positive masculinity, they rise not only for themselves
                    but also for their families and communities.</p>

                <a href="" class="btn btn-primary">Learn More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Our Impact Start -->
<h1 class="display-3 text-primary pb-4" style="text-align: center;">Our Impacts</h1>

<div class="container-fluid bg-light py-5">
    <div class="container text-center">
        <div class="row g-4">

            <div class="col-md-3">
                <h2 class="display-3 text-primary counter" data-target="500">0</h2>
                <p class="fs-5">Men & Boys Impacted</p>
            </div>

            <div class="col-md-3">
                <h2 class="display-3 text-primary counter" data-target="3">0</h2>
                <p class="fs-5">Years of Advocacy</p>
            </div>

            <div class="col-md-3">
                <h2 class="display-3 text-primary counter" data-target="10">0</h2>
                <p class="fs-5">Outreach Programs</p>
            </div>

            <div class="col-md-3">
                <h2 class="display-3 text-primary counter" data-target="1500">0</h2>
                <p class="fs-5">Volunteers Engaged</p>
            </div>

        </div>
    </div>
</div>

<!-- Our Impact End -->

<div class="col-xl-12 wow fadeIn text-center" data-wow-delay="0.5s">
    <h1 class="display-3 text-dark pt-5" style="text-align: center;">Join Our Community</h1>
    <div class="container">
        <p>
            At HisRise Foundation, we believe that every boy deserves the chance to rise with dignity, purpose, and
            opportunity. By joining us, you become part of a movement that empowers boys through education, mentorship,
            mental health support, skills development, and positive masculinity. Together, we are restoring hope,
            rebuilding confidence, and opening doors for boys who are too often overlooked in development efforts.
            Your support—whether through time, resources, or expertise—directly fuels programs that transform lives,
            strengthen families, and build resilient, thriving communities. When we invest in boys, we uplift entire
            generations.
        </p>
    </div>

    <div class="container pt-3">
       <a href="{{ url('Partners') }}" accesskey=""
            class="btn btn-outline-primary text-dark rounded-pill px-4 py-2 fs-5">Partner with us</a>
        <a href="{{ url('volunteers') }}" class="btn btn-outline-primary text-dark rounded-pill px-4 py-2 fs-5">Volunteers</a>
        <a href="javascript:void();" class="btn btn-outline-primary text-dark rounded-pill px-4 py-2 fs-5">Donate</a>
        <a href="javascript:void();" class="btn btn-outline-primary text-dark rounded-pill px-4 py-2 fs-5">sponsors</a>
    </div>
</div>

<!-- Sermon Start -->
<div class="container-fluid sermon">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h1 class="display-3 text-primary">Our Programs</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($programs as $program)
                <div class="col-lg-6 col-xl-4">
                    <div class="sermon-item wow fadeIn" data-wow-delay="0.1s">

                        <div class="overflow-hidden p-4 pb-0" style="height: 250px; overflow: hidden; border-radius: 6px;">
                            <img src="{{ asset('programs/' . $program->image) }}" alt="{{ $program->title }}"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">
                        </div>

                        <div class="p-4">

                            <!-- Clickable Title (POST) -->
                            <form action="{{ route('program.details') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="program_id" value="{{ $program->id }}">
                                <button type="submit" class="d-inline-block h4 lh-sm mb-3 btn btn-link p-0 text-start">
                                    {{ $program->title }}
                                </button>
                            </form>

                            <p class="mb-3">{{ $program->brief }}</p>

                            <!-- More Details button (POST) -->
                            <form action="{{ route('program.details') }}" method="POST">
                                @csrf
                                <input type="hidden" name="program_id" value="{{ $program->id }}">
                                <button type="submit" class="btn btn-primary px-3">
                                    More Details
                                </button>
                            </form>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container pt-3 text-center">
    <a href="{{ url('/sermon') }}" class="btn btn-outline-primary text-dark rounded-pill px-4 py-2 fs-5">See More</a>
</div>
<!-- Sermon End -->

<h1 class="display-3 text-dark pt-5 text-center">Our Partners</h1>

<div class="partner-slider">
    <div class="partner-track">
        @php
            // $logos = ['1.JPG', '2.JPG', '3.JPG', '4.JPG', '5.JPG', '6.JPG', '7.JPG'];
            $logos = ['1.JPG','1.JPG','1.JPG','1.JPG','1.JPG','1.JPG','1.JPG','1.JPG',];
        @endphp

        @foreach(array_merge($logos, $logos, $logos, $logos) as $logo)
            <img src="{{ asset('/img/' . $logo) }}" alt="Partner Logo">
        @endforeach
    </div>
</div>

<!-- Blog Start -->
<div class="container-fluid">
    <div class="container">
        <h1 class="display-3 mb-5 mt-3 wow fadeIn" data-wow-delay="0.1s" style="text-align: center;">
            <span class="text-primary">Our Gallery</span>
        </h1>

        <div class="row g-4 justify-content-center">

            <!-- Gallery Item 1 -->
            <div class="col-lg-6 col-xl-4">
                <div class="blog-item wow fadeIn" data-wow-delay="0.1s">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="img/blog-1.jpg" class="img-fluid w-100" alt="">
                    </div>
                </div>
            </div>

            <!-- Gallery Item 2 -->
            <div class="col-lg-6 col-xl-4">
                <div class="blog-item wow fadeIn" data-wow-delay="0.3s">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="img/blog-2.jpg" class="img-fluid w-100" alt="">
                    </div>
                </div>
            </div>

            <!-- Gallery Item 3 -->
            <div class="col-lg-6 col-xl-4">
                <div class="blog-item wow fadeIn" data-wow-delay="0.5s">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="img/blog-3.jpg" class="img-fluid w-100" alt="">
                    </div>
                </div>
            </div>

        </div>

        <div class="row g-4 justify-content-center mt-3">
            <!-- Gallery Item 1 -->
            <div class="col-lg-6 col-xl-4">
                <div class="blog-item wow fadeIn" data-wow-delay="0.1s">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="img/blog-4.jpg" class="img-fluid w-100" alt="">
                    </div>
                </div>
            </div>

            <!-- Gallery Item 2 -->
            <div class="col-lg-6 col-xl-4">
                <div class="blog-item wow fadeIn" data-wow-delay="0.3s">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="img/blog-5.jpg" class="img-fluid w-100" alt="">
                    </div>
                </div>
            </div>

            <!-- Gallery Item 3 -->
            <div class="col-lg-6 col-xl-4">
                <div class="blog-item wow fadeIn" data-wow-delay="0.5s">
                    <div class="blog-img position-relative overflow-hidden">
                        <img src="img/blog-6.jpg" class="img-fluid w-100" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Blog End -->

<script>
    // Function to animate counters
    function animateCounter(counter) {
        const target = +counter.getAttribute('data-target');
        const duration = 1500; // animation duration in ms
        const startTime = performance.now();

        function update(now) {
            const progress = Math.min((now - startTime) / duration, 1);
            const value = Math.floor(progress * target);

            counter.innerText = value;

            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                counter.innerText = target + "+";
            }
        }

        requestAnimationFrame(update);
    }

    // Observe when counters scroll into view
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target); // run only once
            }
        });
    }, {
        threshold: 0.5
    });

    // Attach observer to all counters
    document.querySelectorAll('.counter').forEach(counter => observer.observe(counter));
</script>

@include('layouts.footer')
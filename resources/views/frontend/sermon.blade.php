@include('layouts.navbar')

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Our Programs</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Our Programs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Sermon Start -->
<div class="container-fluid sermon">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h1 class="display-3 text-primary">Our Programs</h1>
        </div>
        <div class="row g-4 justify-content-center">

            {{-- <!-- Community Outreach -->
            <div class="col-lg-6 col-xl-4">
                <div class="sermon-item wow fadeIn" data-wow-delay="0.1s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="img/sermon-1.jpg" class="img-fluid w-100" alt="Community Outreach">
                    </div>
                    <div class="p-4">
                        <a href="" class="d-inline-block h4 lh-sm mb-3">Community Outreach</a>
                        <p class="mb-3">Engaging communities and supporting vulnerable groups.</p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div>

            <!-- Health & Wellness -->
            <div class="col-lg-6 col-xl-4">
                <div class="sermon-item wow fadeIn" data-wow-delay="0.2s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="img/sermon-2.jpg" class="img-fluid w-100" alt="Health & Wellness">
                    </div>
                    <div class="p-4">
                        <a href="" class="d-inline-block h4 lh-sm mb-3">Health & Wellness</a>
                        <p class="mb-3">Medical camps and wellness workshops for all ages.</p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div>

            <!-- Youth Empowerment -->
            <div class="col-lg-6 col-xl-4">
                <div class="sermon-item wow fadeIn" data-wow-delay="0.3s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="img/sermon-3.jpg" class="img-fluid w-100" alt="Youth Empowerment">
                    </div>
                    <div class="p-4">
                        <a href="" class="d-inline-block h4 lh-sm mb-3">Youth Empowerment</a>
                        <p class="mb-3">Mentorship and skill-building to empower young people.</p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div>

            <!-- Education Support -->
            <div class="col-lg-6 col-xl-4">
                <div class="sermon-item wow fadeIn" data-wow-delay="0.4s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="img/sermon-4.jpg" class="img-fluid w-100" alt="Education Support">
                    </div>
                    <div class="p-4">
                        <a href="" class="d-inline-block h4 lh-sm mb-3">Education Support</a>
                        <p class="mb-3">Scholarships, school materials, and learning programs.</p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div>

            <!-- Gender Equality & Advocacy -->
            <div class="col-lg-6 col-xl-4">
                <div class="sermon-item wow fadeIn" data-wow-delay="0.5s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="img/sermon-5.jpg" class="img-fluid w-100" alt="Gender Equality">
                    </div>
                    <div class="p-4">
                        <a href="" class="d-inline-block h4 lh-sm mb-3">Gender Equality & Advocacy</a>
                        <p class="mb-3">Promoting respect, equity, and women's empowerment.</p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div>

            <!-- Orphans & Vulnerable Children -->
            <div class="col-lg-6 col-xl-4">
                <div class="sermon-item wow fadeIn" data-wow-delay="0.6s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="img/sermon-6.jpg" class="img-fluid w-100" alt="Support for Children">
                    </div>
                    <div class="p-4">
                        <a href="" class="d-inline-block h4 lh-sm mb-3">Support for Children</a>
                        <p class="mb-3">Providing care and education for orphans and vulnerable kids.</p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div>

            <!-- Livelihood & Skills Training -->
            <div class="col-lg-6 col-xl-4">
                <div class="sermon-item wow fadeIn" data-wow-delay="0.7s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="img/sermon-7.jpg" class="img-fluid w-100" alt="Skills Training">
                    </div>
                    <div class="p-4">
                        <a href="" class="d-inline-block h4 lh-sm mb-3">Skills Training</a>
                        <p class="mb-3">Training in vocational skills to boost livelihoods.</p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div>

            <!-- Humanitarian Relief -->
            <div class="col-lg-6 col-xl-4">
                <div class="sermon-item wow fadeIn" data-wow-delay="0.8s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="img/sermon-8.jpg" class="img-fluid w-100" alt="Humanitarian Relief">
                    </div>
                    <div class="p-4">
                        <a href="" class="d-inline-block h4 lh-sm mb-3">Humanitarian Relief</a>
                        <p class="mb-3">Providing emergency food, water, and shelter to affected families.</p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div>

            <!-- Environmental Conservation -->
            <div class="col-lg-6 col-xl-4">
                <div class="sermon-item wow fadeIn" data-wow-delay="0.9s">
                    <div class="overflow-hidden p-4 pb-0">
                        <img src="img/sermon-9.jpg" class="img-fluid w-100" alt="Environmental Conservation">
                    </div>
                    <div class="p-4">
                        <a href="" class="d-inline-block h4 lh-sm mb-3">Environmental Conservation</a>
                        <p class="mb-3">Tree planting, waste management, and eco-friendly initiatives.</p>
                        <a href="#" class="btn btn-primary px-3">More Details</a>
                    </div>
                </div>
            </div> --}}

            @foreach($programs as $program)
                <div class="col-lg-6 col-xl-4">
                    <div class="sermon-item wow fadeIn" data-wow-delay="0.1s">

                        <div class="overflow-hidden p-4 pb-0" style="height: 250px; overflow: hidden; border-radius: 6px;">

                            <img src="{{ asset('programs/' . $program->image) }}" alt="{{ $program->title }}"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">
                        </div>

                        <div class="p-4">
                            <a href="{{ route('program.details', $program->id) }}" class="d-inline-block h4 lh-sm mb-3">
                                {{ $program->title }}
                            </a>
                            <p class="mb-3">{{ $program->brief }}</p>
                            <a href="{{ route('program.details', $program->id) }}" class="btn btn-primary px-3">More
                                Details</a>
                        </div>

                    </div>
                </div>

            @endforeach


        </div>
    </div>
</div>
<!-- Sermon End -->

@include('layouts.footer')
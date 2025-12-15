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
<div class="container-fluid sermon section-bg">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
            <h1 class="display-3 text-primary pt-5">Our Programs</h1>
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
<!-- Sermon End -->

@include('layouts.footer')
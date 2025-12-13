@include('layouts.navbar')

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Latest Blog</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Latest Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Blog Start -->
<div class="container-fluid">
    <div class="container">
        <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Latest From <span class="text-primary">Our
                Blog</span></h1>
        <div class="row g-4 justify-content-center">
    @foreach($blogs as $index => $b)
        <div class="col-lg-6 col-xl-4">
            <div class="blog-item wow fadeIn" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">

                <!-- IMAGE WRAPPER (FORCES UNIFORM SIZE) -->
                <div class="blog-img position-relative overflow-hidden" 
                     style="width: 100%; height: 260px; overflow: hidden; border-radius: 6px;">

                    <img src="{{ asset('blogs/' . $b->image) }}" 
                         alt="{{ $b->title }}"
                         style="width: 100%; height: 100%; object-fit: cover;">
                    
                    <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0 end-0">
                        {{ \Carbon\Carbon::parse($b->published_date)->format('d M Y') }}
                    </div>
                </div>

                <div class="p-4">

                    <!-- Clickable Title (POST) -->
                    <form action="{{ route('blog.details') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $b->id }}">
                        <button type="submit" class="d-inline-block h4 lh-sm mb-3 btn btn-link p-0 text-start">
                            {{ $b->title }}
                        </button>
                    </form>

                    <p class="mb-4">{{ Str::limit($b->brief, 120) }}</p>

                    <!-- More Details button -->
                    <form action="{{ route('blog.details') }}" method="POST">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $b->id }}">
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
<!-- Blog End -->

@include('layouts.footer')
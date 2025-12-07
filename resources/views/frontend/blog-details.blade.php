@include('layouts.navbar')

<div class="container-fluid py-5" style="background: #f7f8fa;">
    <div class="container">

        <!-- PAGE HEADER -->
        <div class="col-12 text-center pt-5">
            <h1 class="display-3 text-primary pt-5 mt-5">{{ $blog->title }}</h1>
            <p class="lead mb-4">{{ $blog->brief }}</p>
        </div>

        <!-- IMAGE -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <img src="{{ asset('blogs/' . $blog->image) }}" 
                     alt="{{ $blog->title }}"
                     class="img-fluid rounded shadow"
                     style="width: 100%; object-fit: cover; max-height: 450px;">
            </div>
        </div>

        <!-- CONTENT SECTION -->
        <div class="row justify-content-center pb-5">
            <div class="col-lg-10">
                <div class="bg-white p-4 p-lg-5 rounded shadow-sm">
                    {!! $blog->content !!}
                </div>
            </div>
        </div>

        <!-- BACK BUTTON -->
        <div class="text-center pb-5">
            <a href="{{ url('blog') }}" class="btn btn-primary px-4 py-2">
                <i class="fa fa-arrow-left me-2"></i> Back to Blogs
            </a>
        </div>

    </div>
</div>

@include('layouts.footer')

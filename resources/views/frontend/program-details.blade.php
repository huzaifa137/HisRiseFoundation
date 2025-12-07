@include('layouts.navbar')

<div class="container-fluid py-5" style="background: #f7f8fa;">
    <div class="container">

        <!-- PAGE HEADER -->
        <div class="col-12 text-center pt-5">
            <h1 class="display-3 text-primary pt-5 mt-5">{{ $program->title }}</h1>
            <p class="lead mb-4">{{ $program->brief }}</p>
        </div>

        <!-- IMAGE -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <img src="{{ asset('programs/' . $program->image) }}" 
                     alt="{{ $program->title }}"
                     class="img-fluid rounded shadow"
                     style="width: 100%; object-fit: cover; max-height: 450px;">
            </div>
        </div>

        <!-- DETAILS SECTION -->
        <div class="row justify-content-center pb-5">
            <div class="col-lg-10">
                <div class="bg-white p-4 p-lg-5 rounded shadow-sm">
                    {!! $program->details !!}
                </div>
            </div>
        </div>

        <!-- BACK BUTTON -->
        <div class="text-center pb-5">
            <a href="{{ url('sermon') }}" class="btn btn-primary px-4 py-2">
                <i class="fa fa-arrow-left me-2"></i> Back to Programs
            </a>
        </div>

    </div>
</div>

@include('layouts.footer')

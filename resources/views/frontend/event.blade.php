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

        @forelse($events as $event)
            <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.2s">

                <!-- Left date -->
                <div class="col-3 col-lg-2 pe-0">
                    <div class="text-center border-bottom border-dark py-3 px-2">
                        <h6>{{ $event->event_date->format('d M Y') }}</h6>
                        <p class="mb-0">
                            {{ \Carbon\Carbon::parse($event->event_date)->format('D') }}
                            {{ date('H:i', strtotime($event->event_time)) }}
                        </p>
                    </div>
                </div>

                <!-- Middle content -->
                <div class="col-9 col-lg-6 border-start border-dark pb-5">
                    <div class="ms-3">
                        <h4 class="mb-3">{{ $event->title }}</h4>
                        <p class="mb-4">{{ $event->description }}</p>
                    </div>
                </div>

                <!-- Image -->
                <div class="col-12 col-lg-4">
                    <div class="overflow-hidden mb-5">

                        @if($event->image)
                            <img src="{{ asset('events/' . $event->image) }}" class="img-fluid w-100" alt="{{ $event->title }}">
                        @else
                            <img src="/img/default-event.jpg" class="img-fluid w-100" alt="">
                        @endif

                    </div>
                </div>

            </div>

        @empty

            <p class="text-warning text-center">No upcoming events at the moment.</p>

        @endforelse

    </div>
</div>
<!-- Events End -->



@include('layouts.footer')
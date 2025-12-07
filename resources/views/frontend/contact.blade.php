@include('layouts.navbar')

<!-- Hero Start -->
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Contact</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Contact Start -->
<div class="container-fluid contact py-5" 
     style="background: #f9fafc;">
    <div class="container py-5"
         style="border: 2px solid #f7941d; border-radius: 15px; padding: 40px; background: #ffffff; box-shadow: 0 6px 20px rgba(0,0,0,0.06);">

        <div class="text-center mx-auto mb-5 wow fadeIn" 
             data-wow-delay="0.1s" 
             style="max-width: 700px;">
             
            <p class="fs-5 text-uppercase text-primary">Get In Touch</p>
            <h1 class="display-3">We're Here to Help</h1>
            <p class="mb-0">
                Have questions, need support, or want to learn more about our programs?
                Our team is ready to assist you. Reach out to us through the contact form
                below and we will get back to you as soon as possible.
            </p>
        </div>

        <div class="row g-4 wow fadeIn" data-wow-delay="0.3s">
            <div class="col-sm-6">
                <input type="text" class="form-control bg-transparent p-3" placeholder="Your Name"
                       style="border: 1px solid #f7941d; border-radius: 8px;">
            </div>

            <div class="col-sm-6">
                <input type="email" class="form-control bg-transparent p-3" placeholder="Your Email"
                       style="border: 1px solid #f7941d; border-radius: 8px;">
            </div>

            <div class="col-12">
                <input type="text" class="form-control bg-transparent p-3" placeholder="Subject"
                       style="border: 1px solid #f7941d; border-radius: 8px;">
            </div>

            <div class="col-12">
                <textarea class="w-100 form-control bg-transparent p-3" rows="6" cols="10"
                          placeholder="Your Message"
                          style="border: 1px solid #f7941d; border-radius: 8px;"></textarea>
            </div>

            <div class="col-12 text-center">
    <button class="btn btn-primary border-0 py-3 px-5 text-white" type="button"
            style="border-radius: 8px;">
        <i class="fa fa-paper-plane me-2"></i> Send Message
    </button>
</div>

        </div>

    </div>
</div>
<!-- Contact End -->

@include('layouts.footer')
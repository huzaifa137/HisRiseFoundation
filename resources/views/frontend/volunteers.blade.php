@include('layouts.navbar')

<div class="container-fluid py-5 volunteer-section">
    <div class="container">

        <div class="col-12 text-center pt-5">
            <h1 class="display-3 text-primary pt-5 mt-5">Become a Volunteer</h1>
            <p class="lead mb-5">Join our mission and make a real difference in the community!</p>
        </div>

        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="p-4 shadow-sm rounded border border-2" style="border-color: #f7941d !important;">
                    <h3 class="mb-4 text-dark">Why Volunteer With Us?</h3>
                    <p class="mb-4" style="text-align: justify;">
                        Volunteering with our organization is more than just offering your time—it is becoming part of a
                        movement that creates
                        real and lasting change within communities. As a volunteer, you will have the opportunity to
                        engage directly with
                        people whose lives are impacted by our programs, helping to uplift vulnerable families, support
                        youth development,
                        promote education, and strengthen community resilience.
                    </p>


                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex align-items-center border-0 ps-0"><i
                                class="fa fa-check text-primary me-3"></i>Support critical community outreach programs.
                        </li>
                        <li class="list-group-item d-flex align-items-center border-0 ps-0"><i
                                class="fa fa-check text-primary me-3"></i>Contribute to education and youth empowerment.
                        </li>
                        <li class="list-group-item d-flex align-items-center border-0 ps-0"><i
                                class="fa fa-check text-primary me-3"></i>Be part of a dedicated and passionate team.
                        </li>
                        <li class="list-group-item d-flex align-items-center border-0 ps-0"><i
                                class="fa fa-check text-primary me-3"></i>Gain valuable experience in non-profit work.
                        </li>
                    </ul>

                    <h3 class="mt-5 mb-3 text-dark">Our Current Needs:</h3>
                    <div class="d-flex flex-wrap">
                        <span class="badge bg-secondary text-white m-1 p-2">Community Outreach Assistants</span>
                        <span class="badge bg-secondary text-white m-1 p-2">Skill Trainers (e.g., ICT,
                            Agribusiness)</span>
                        <span class="badge bg-secondary text-white m-1 p-2">Administrative Support</span>
                        <span class="badge bg-secondary text-white m-1 p-2">Fundraising Support</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-light p-5 shadow rounded border border-3 border-primary">
                    <h3 class="mb-4 text-dark text-center">Apply Today</h3>
                    <form id="volunteerForm">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 py-3" name="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 py-3" name="email"
                                    placeholder="Your Email" required>
                            </div>
                            <div class="col-12">
                                <input type="tel" class="form-control border-0 py-3" name="phone"
                                    placeholder="Phone Number" required>
                            </div>
                            <div class="col-12">
                                <select class="form-select border-0 py-3" aria-label="Volunteer Area"
                                    name="area_of_interest" required>
                                    <option selected disabled>Select Area of Interest</option>
                                    <option value="Community Outreach">Community Outreach</option>
                                    <option value="Education Support">Education Support</option>
                                    <option value="Health & Wellness">Health & Wellness Programs</option>
                                    <option value="Livelihood Training">Livelihood & Skills Training</option>
                                    <option value="General Support">General Volunteer Support</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" rows="6" name="message"
                                    placeholder="Tell us why you want to volunteer and about your relevant skills."
                                    required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary text-uppercase py-3 px-5" type="submit">Submit
                                    Application</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $("#volunteerForm").on("submit", function (e) {
        e.preventDefault();

        let submitBtn = $(this).find("button[type='submit']");
        let originalText = submitBtn.html();

        // Disable button and show loading text
        submitBtn.prop("disabled", true).html("Submitting...");

        $.ajax({
            url: "{{ route('volunteer.store') }}",
            method: "POST",
            data: $(this).serialize(),
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Application Submitted!',
                    text: response.message,
                    confirmButtonColor: '#3085d6'
                });

                $("#volunteerForm")[0].reset();
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Something went wrong!',
                    text: 'Please check your inputs and try again.'
                });
            },
            complete: function () {
                // Re-enable and restore button text
                submitBtn.prop("disabled", false).html(originalText);
            }
        });
    });
</script>


@include('layouts.footer')
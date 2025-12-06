@include('layouts.navbar')

<div class="container-fluid py-5 partner-section">
    <div class="container">

        <div class="col-12 text-center pt-5">
            <h1 class="display-3 text-primary pt-5 mt-5">Partner With Us</h1>
            <p class="lead mb-5">Forge a meaningful partnership to amplify your impact and achieve shared goals.</p>
        </div>
        <div class="row g-5">
            
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="p-4 shadow-sm rounded border border-2" style="border-color: #f7941d !important;">
                    <h3 class="mb-4 text-dark">Why Partner With Our Organization?</h3>
                    <p class="mb-4" style="text-align: justify;">
                        We believe that the greatest impact is achieved through collaboration. Partnering with us allows your organization to align its corporate social responsibility (CSR) goals or mission with on-the-ground programs that deliver measurable change in vulnerable communities. 
                    </p>
                    <p class="mb-4" style="text-align: justify;">
                        We are seeking long-term, strategic partnerships with corporations.

                    <h4 class="mt-4 mb-3 text-dark">Key Partnership Benefits:</h4>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex align-items-center border-0 ps-0"><i
                                class="fa fa-handshake text-primary me-3"></i>Shared Impact: Direct involvement in projects aligned with your strategic objectives.</li>
                        <li class="list-group-item d-flex align-items-center border-0 ps-0"><i
                                class="fa fa-chart-line text-primary me-3"></i>Visibility & Reach: Exposure to our extensive community network and outreach platforms.</li>
                        <li class="list-group-item d-flex align-items-center border-0 ps-0"><i
                                class="fa fa-award text-primary me-3"></i>CSR Alignment: Demonstrate corporate responsibility and enhance brand reputation.</li>
                        <li class="list-group-item d-flex align-items-center border-0 ps-0"><i
                                class="fa fa-bullseye text-primary me-3"></i>Measurable Results: Receive detailed reports on the impact of your investment.</li>
                    </ul>

                    <h4 class="mt-5 mb-3 text-dark">Areas of Collaboration:</h4>
                    <div class="d-flex flex-wrap">
                        <span class="badge bg-secondary text-white m-1 p-2">Project Funding & Sponsorship</span>
                        <span class="badge bg-secondary text-white m-1 p-2">Skill & Resource Sharing (Pro Bono)</span>
                        <span class="badge bg-secondary text-white m-1 p-2">Joint Program Development</span>
                        <span class="badge bg-secondary text-white m-1 p-2">Employee Engagement Programs</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-light p-5 shadow rounded border border-3 border-primary">
                    <h3 class="mb-4 text-dark text-center">Partnership Inquiry</h3>
                    <form>
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="text" class="form-control border-0 py-3" placeholder="Organization/Company Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 py-3" placeholder="Contact Person's Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 py-3" placeholder="Contact Email" required>
                            </div>
                            <div class="col-12">
                                <input type="tel" class="form-control border-0 py-3" placeholder="Phone Number" required>
                            </div>
                            <div class="col-12">
                                <select class="form-select border-0 py-3" aria-label="Partnership Type" required>
                                    <option selected disabled>Type of Organization</option>
                                    <option value="Corporation/Business">Corporation/Business</option>
                                    <option value="Non-Profit/NGO">Non-Profit/NGO/Foundation</option>
                                    <option value="Government Agency">Government Agency</option>
                                    <option value="Individual Donor/Funder">Individual Donor/Funder</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <select class="form-select border-0 py-3" aria-label="Area of Interest" required>
                                    <option selected disabled>Primary Area of Interest</option>
                                    <option value="Project Funding">Project Funding / Sponsorship</option>
                                    <option value="Resource Sharing">Resource / Pro Bono Support</option>
                                    <option value="Joint Programs">Joint Program Development</option>
                                    <option value="Other">Other Strategic Collaboration</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" rows="6"
                                    placeholder="Briefly describe your organization and how you envision this partnership creating mutual value."
                                    required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary text-uppercase py-3 px-5" type="submit">Submit Inquiry</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
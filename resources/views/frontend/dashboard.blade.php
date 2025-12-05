@include('layouts.navbar')

<!-- Hero Start -->
<div class="container-fluid" style="padding-bottom: 6rem; margin-bottom: 6rem;">
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>
<!-- Hero End -->

@include('layouts.dashboard-styles')

<div class="d-flex" id="wrapper">

    @include('layouts.admin-sidebar-nav')

    <div class="container-fluid p-4 page-content-area">
        <h1 class="mt-4 mb-4">Dashboard Overview</h1>

        <div class="row g-4 mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="fs-4 fw-bold">120</div>
                        <small>Total Users</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="fs-4 fw-bold">4</div>
                        <small>Upcoming Events</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <div class="fs-4 fw-bold">15</div>
                        <small>New Messages</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-info text-dark">
                    <div class="card-body">
                        <div class="fs-4 fw-bold">55</div>
                        <small>Active Volunteers</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white fw-bold">
                        Recent Activity
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            This section will contain recent notifications, log entries, or a quick list of the
                            latest database updates (e.g., newest user, newest contact message).
                        </p>
                        <div
                            style="height: 200px; background-color: #f8f9fa; border: 1px dashed #ced4da; display: flex; align-items: center; justify-content: center;">
                            Area for Charts/Tables
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

@include('layouts.footer')
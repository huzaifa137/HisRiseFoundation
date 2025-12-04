@include('layouts.navbar')

<!-- Hero Start -->
<div class="container-fluid" style="padding-bottom: 6rem; margin-bottom: 6rem;">
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>
<!-- Hero End -->

<!-- Contact Start -->
<div class="d-flex" id="wrapper">

    <div class="bg-dark border-right" id="sidebar-wrapper" style="min-width: 250px;">
        <div class="sidebar-heading text-white p-4 fs-5 fw-bold text-center border-bottom border-secondary">
            NGO Dashboard
        </div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white active">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard Home
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-users me-2"></i> Users
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-calendar-alt me-2"></i> Events
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-tasks me-2"></i> Our Programs
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-handshake me-2"></i> Partners
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-hands-helping me-2"></i> Volunteers
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-cog me-2"></i> Settings
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fas fa-envelope me-2"></i> Contact Us Messages
            </a>
        </div>
    </div>
    <div id="page-content-wrapper" class="flex-grow-1">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle"><i class="fas fa-bars"></i></button>

                <h4 class="ms-3 mb-0 d-none d-sm-block">Welcome, Admin!</h4>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> Account
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item text-danger" href="#" id="logoutBtn">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>

                                <form id="logoutForm" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid p-4">

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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var sidebarToggle = document.getElementById('sidebarToggle');
        var wrapper = document.getElementById('wrapper');

        if (sidebarToggle && wrapper) {
            sidebarToggle.addEventListener('click', function (e) {
                e.preventDefault();
                wrapper.classList.toggle('toggled');
            });
        }
    });

    document.getElementById('logoutBtn').addEventListener('click', function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "You will be logged out of the system.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, logout",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logoutForm').submit();
            }
        });
    });
</script>

<style>
    #wrapper {
        overflow-x: hidden;
    }

    #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -250px;
        transition: margin .25s ease-out;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

    #page-content-wrapper {
        min-width: 100vw;
    }

    #wrapper.toggled #page-content-wrapper {
        min-width: calc(100vw - 250px);
    }

    @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -250px;
        }
    }
</style>
<!-- Contact Start -->

@include('layouts.footer')
<div class="bg-dark border-right" id="sidebar-wrapper" style="min-width: 250px;">
    <div class="sidebar-heading text-white p-4 fs-5 fw-bold text-center border-bottom border-secondary">
        HISRISE FOUNDATION
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ url('/dashboard') }}"
            class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard Home
        </a>

        <a href="{{ route('admin.users') }}"
            class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.users') ? 'active' : '' }}">
            <i class="fas fa-users me-2"></i> Users
        </a>

        <a href="{{ route('admin.events') }}"
            class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.events') ? 'active' : '' }}">
            <i class="fas fa-calendar-alt me-2"></i> Events
        </a>

        <a href="{{ route('admin.programs') }}"
            class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.programs') ? 'active' : '' }}">
            <i class="fas fa-tasks me-2"></i> Our Programs
        </a>

        <a href="{{ route('admin.partners') }}"
            class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.partners') ? 'active' : '' }}">
            <i class="fas fa-handshake me-2"></i> Partners
        </a>

        <a href="{{ route('admin.volunteers') }}"
            class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.volunteers') ? 'active' : '' }}">
            <i class="fas fa-hands-helping me-2"></i> Volunteers
        </a>

        <a href="{{ route('admin.blogs') }}"
            class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('admin.blogs') ? 'active' : '' }}">
            <i class="fas fa-hand-holding-heart me-2"></i>
            Blogs
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
                            {{-- <a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a> --}}

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item text-danger" href="#" id="logoutBtn">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>

                            <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
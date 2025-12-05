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

        @if(isset($users))

            <h1 class="mb-4">Users List</h1>

            <div class="card shadow-sm">
                <div class="card-header fw-bold bg-white">
                    Registered Users
                </div>

                <div class="card-body p-0">
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-success mt-3 me-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="fa fa-user-plus me-1"></i> Add User
                        </button>
                    </div>
                    @if($users->count())
                        <table class="table table-striped table-bordered mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 5px;">No</th>
                                    <th>Email</th>
                                    <th colspan="2" style="text-align: center;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $count => $user)
                                    <tr>
                                        <td>{{ $count+1 }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary me-1 editUserBtn" data-id="{{ $user->id }}"
                                                data-email="{{ $user->email }}">
                                                <i class="fa fa-edit me-1"></i> Edit
                                            </button>

                                            <button class="btn btn-sm btn-danger deleteUserBtn" data-id="{{ $user->id }}">
                                                <i class="fa fa-trash me-1"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="p-3">No users found.</p>
                    @endif

                    <div class="modal fade" id="editUserModal" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('admin.users.update') }}">
                                @csrf
                                <input type="hidden" name="id" id="editUserId">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <label>Email</label>
                                        <input type="email" class="form-control mb-3" name="email" id="editEmail" required>

                                        <label>Password (optional)</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" name="password" id="editPassword"
                                                placeholder="Leave blank to keep current password">

                                            <span class="input-group-text" id="togglePassword" style="cursor:pointer;">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            <i class="fa fa-times me-1"></i> Cancel
                                        </button>

                                        <button type="submit" class="btn btn-primary" id="saveChangesBtn">
                                            <i class="fa fa-save me-1"></i> Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="modal fade" id="addUserModal" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('admin.users.store') }}">
                                @csrf

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <label>Email</label>
                                        <input type="email" class="form-control mb-3" name="email" required>

                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            <i class="fa fa-times me-1"></i> Cancel
                                        </button>

                                        <button type="submit" class="btn btn-success" id="createUserBtn">
                                            <i class="fa fa-check me-1"></i> Create User
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {

                            document.querySelectorAll('.editUserBtn').forEach(btn => {
                                btn.addEventListener('click', function () {
                                    let id = this.dataset.id;
                                    let email = this.dataset.email;

                                    document.getElementById('editUserId').value = id;
                                    document.getElementById('editEmail').value = email;

                                    new bootstrap.Modal(document.getElementById('editUserModal')).show();
                                });
                            });

                            document.querySelectorAll('.deleteUserBtn').forEach(btn => {
                                btn.addEventListener('click', function () {

                                    let id = this.dataset.id;

                                    Swal.fire({
                                        title: "Delete User?",
                                        text: "This action cannot be undone.",
                                        icon: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#d33",
                                        cancelButtonColor: "#3085d6",
                                        confirmButtonText: "Yes, delete it!"
                                    }).then((result) => {
                                        if (result.isConfirmed) {

                                            Swal.fire({
                                                title: "Deleting...",
                                                text: "Deleting user, please wait.",
                                                allowOutsideClick: false,
                                                showConfirmButton: false,
                                                didOpen: () => {
                                                    Swal.showLoading();
                                                }
                                            });

                                            window.location.href = "/admin/users/delete/" + id;
                                        }
                                    });

                                });
                            });
                        });


                        document.getElementById('togglePassword').addEventListener('click', function () {
                            const passwordInput = document.getElementById('editPassword');
                            const icon = this.querySelector('i');

                            if (passwordInput.type === "password") {
                                passwordInput.type = "text";
                                icon.classList.remove('fa-eye');
                                icon.classList.add('fa-eye-slash');
                            } else {
                                passwordInput.type = "password";
                                icon.classList.remove('fa-eye-slash');
                                icon.classList.add('fa-eye');
                            }
                        });

                        document.querySelector('#editUserModal form').addEventListener('submit', function () {
                            const btn = document.getElementById('saveChangesBtn');
                            btn.disabled = true;
                            btn.innerHTML = '<i class="fa fa-spinner fa-spin me-1"></i> Saving changes...';
                        });

                        document.querySelector('#addUserModal form').addEventListener('submit', function () {
                            const btn = document.getElementById('createUserBtn');
                            btn.disabled = true;
                            btn.innerHTML = '<i class="fa fa-spinner fa-spin me-1"></i> Creating user...';
                        });
                    </script>

                </div>
            </div>

        @else
            <div class="alert alert-warning text-center mt-3">
                No records found.
            </div>
        @endif

    </div>

</div>
</div>

@include('layouts.footer')
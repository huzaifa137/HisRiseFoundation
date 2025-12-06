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

        @if(isset($volunteers))

            <h1 class="mb-4">Volunteers List</h1>

            <div class="card shadow-sm">
                <div class="card-header fw-bold bg-white">
                    Submitted Volunteers
                </div>

                <div class="card-body p-0">

                    @if($volunteers->count())
                        <table class="table table-striped table-bordered mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 5px;">No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Area of Interest</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($volunteers as $count => $v)

                                    <!-- MAIN ROW -->
                                    <tr>
                                        <td>{{ $count + 1 }}</td>
                                        <td>{{ $v->name }}</td>
                                        <td>{{ $v->email }}</td>
                                        <td>{{ $v->phone }}</td>
                                        <td>{{ $v->area_of_interest }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-danger deleteVolunteerBtn" data-id="{{ $v->id }}">
                                                <i class="fa fa-trash me-1"></i> Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- FULL MESSAGE ROW -->
                                    <tr>
                                        <td colspan="7" class="bg-light">
                                            <strong>Message:</strong>
                                            <div style="white-space: pre-line; padding-top: 5px;">
                                                {{ $v->message }}
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>

                        </table>
                    @else
                        <p class="p-3 text-center text-warning">No volunteers found.</p>
                    @endif


                    {{-- DELETE CONFIRMATION --}}
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {

                            document.querySelectorAll('.deleteVolunteerBtn').forEach(btn => {
                                btn.addEventListener('click', function () {

                                    let id = this.dataset.id;

                                    Swal.fire({
                                        title: "Delete Volunteer?",
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
                                                text: "Deleting volunteer, please wait.",
                                                allowOutsideClick: false,
                                                showConfirmButton: false,
                                                didOpen: () => {
                                                    Swal.showLoading();
                                                }
                                            });

                                            window.location.href = "/admin/volunteers/delete/" + id;
                                        }
                                    });
                                });
                            });

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
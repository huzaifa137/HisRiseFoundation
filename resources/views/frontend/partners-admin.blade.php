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

        @if(isset($partners))

            <h1 class="mb-4">Partners List</h1>

            <div class="card shadow-sm">
                <div class="card-header fw-bold bg-white">
                    Submitted Partnership Requests
                </div>

                <div class="card-body p-0">

                    @if($partners->count())
                        <table class="table table-striped table-bordered mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 5px;">No</th>
                                    <th>Organization</th>
                                    <th>Contact Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Type</th>
                                    <th>Interest Area</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($partners as $count => $p)

                                    <!-- MAIN ROW -->
                                    <tr>
                                        <td>{{ $count + 1 }}</td>
                                        <td>{{ $p->organization }}</td>
                                        <td>{{ $p->contact_name }}</td>
                                        <td>{{ $p->email }}</td>
                                        <td>{{ $p->phone }}</td>
                                        <td>{{ $p->organization_type }}</td>
                                        <td>{{ $p->interest_area }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-danger deletePartnerBtn" data-id="{{ $p->id }}">
                                                <i class="fa fa-trash me-1"></i> Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- FULL MESSAGE ROW -->
                                    <tr>
                                        <td colspan="8" class="bg-light">
                                            <strong>Message:</strong>
                                            <div style="white-space: pre-line; padding-top: 5px;">
                                                {{ $p->message }}
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>

                        </table>
                    @else
                        <p class="p-3 text-center text-warning">No partners found.</p>
                    @endif


                    {{-- DELETE CONFIRMATION --}}
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {

                            document.querySelectorAll('.deletePartnerBtn').forEach(btn => {
                                btn.addEventListener('click', function () {

                                    let id = this.dataset.id;

                                    Swal.fire({
                                        title: "Delete Partner?",
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
                                                text: "Removing partner record, please wait.",
                                                allowOutsideClick: false,
                                                showConfirmButton: false,
                                                didOpen: () => {
                                                    Swal.showLoading();
                                                }
                                            });

                                            window.location.href = "/admin/partners/delete/" + id;
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
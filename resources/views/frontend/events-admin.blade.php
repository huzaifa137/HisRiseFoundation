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

        <h1 class="mb-4">Events List</h1>

        <div class="card shadow-sm">
            <div class="card-header fw-bold bg-white">
                Manage Events
            </div>

            <div class="card-body p-0">

                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-success mt-3 me-3" data-bs-toggle="modal" data-bs-target="#addEventModal">
                        <i class="fa fa-calendar-plus me-1"></i> Add Event
                    </button>
                </div>

                @if($events->count())
                    <table class="table table-striped table-bordered mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Title</th>
                                <th style="width:180px;text-align:center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($events as $index => $event)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $event->event_date->format('d M Y') }}</td>
                                    <td>{{ date('H:i', strtotime($event->event_time)) }}</td>
                                    <td>{{ $event->title }}</td>

                                    <td class="text-center">

                                        <button class="btn btn-sm btn-primary editEventBtn" data-id="{{ $event->id }}"
                                            data-date="{{ $event->event_date }}" data-time="{{ $event->event_time }}"
                                            data-title="{{ $event->title }}" data-description="{{ $event->description }}">
                                            <i class="fa fa-edit me-1"></i> Edit
                                        </button>

                                        <button class="btn btn-sm btn-danger deleteEventBtn" data-id="{{ $event->id }}">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="p-3">No events found.</p>
                @endif

            </div>
        </div>


        <!-- ADD EVENT MODAL -->
        <div class="modal fade" id="addEventModal" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('admin.events.store') }}">
                    @csrf
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Add New Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <label>Date</label>
                            <input type="date" class="form-control mb-3" name="event_date" required>

                            <label>Time</label>
                            <input type="time" class="form-control mb-3" name="event_time" required>

                            <label>Title</label>
                            <input type="text" class="form-control mb-3" name="title" required>

                            <label>Description</label>
                            <textarea class="form-control mb-3" name="description" rows="4" required></textarea>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-success">
                                <i class="fa fa-check me-1"></i> Create Event
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <!-- EDIT EVENT MODAL -->
        <div class="modal fade" id="editEventModal" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('admin.events.update') }}">
                    @csrf
                    <input type="hidden" name="id" id="editEventId">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Edit Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <label>Date</label>
                            <input type="date" class="form-control mb-3" id="editEventDate" name="event_date" required>

                            <label>Time</label>
                            <input type="time" class="form-control mb-3" id="editEventTime" name="event_time" required>

                            <label>Title</label>
                            <input type="text" class="form-control mb-3" id="editEventTitle" name="title" required>

                            <label>Description</label>
                            <textarea class="form-control mb-3" id="editEventDesc" name="description" rows="4"
                                required></textarea>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                            <button class="btn btn-primary">
                                <i class="fa fa-save me-1"></i> Save
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <!-- Event Scripts -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                document.querySelectorAll('.editEventBtn').forEach(btn => {
                    btn.addEventListener('click', function () {

                        let id = this.dataset.id;
                        let date = this.dataset.date;
                        let time = this.dataset.time;
                        let title = this.dataset.title;
                        let desc = this.dataset.description;

                        let formattedDate = new Date(date).toISOString().split('T')[0];

                        document.getElementById('editEventId').value = id;
                        document.getElementById('editEventDate').value = formattedDate;
                        document.getElementById('editEventTime').value = time;
                        document.getElementById('editEventTitle').value = title;
                        document.getElementById('editEventDesc').value = desc;

                        new bootstrap.Modal(document.getElementById('editEventModal')).show();
                    });
                });


                document.querySelectorAll('.deleteEventBtn').forEach(btn => {
                    btn.addEventListener('click', function () {

                        let id = this.dataset.id;

                        Swal.fire({
                            title: "Delete Event?",
                            text: "This action cannot be undone.",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#d33",
                            cancelButtonColor: "#3085d6",
                            confirmButtonText: "Yes, delete it!"
                        }).then(result => {
                            if (result.isConfirmed) {

                                Swal.fire({
                                    title: "Deleting...",
                                    text: "Removing event, please wait.",
                                    allowOutsideClick: false,
                                    showConfirmButton: false,
                                    didOpen: () => Swal.showLoading()
                                });

                                window.location.href = "/admin/events/delete/" + id;
                            }
                        });

                    });
                });


                document.querySelector('#editEventModal form').addEventListener('submit', function () {
                    const btn = document.querySelector('#editEventModal button.btn-primary');
                    btn.disabled = true;
                    btn.innerHTML = '<i class="fa fa-spinner fa-spin me-1"></i> Saving...';
                });


                document.querySelector('#addEventModal form').addEventListener('submit', function () {
                    const btn = document.querySelector('#addEventModal button.btn-success');
                    btn.disabled = true;
                    btn.innerHTML = '<i class="fa fa-spinner fa-spin me-1"></i> Creating event...';
                });

            });
        </script>

    </div>


</div>

</div>

@include('layouts.footer')
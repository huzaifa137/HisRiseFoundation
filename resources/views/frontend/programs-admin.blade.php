@include('layouts.navbar')

<!-- Hero Start -->
<div class="container-fluid" style="padding-bottom: 6rem; margin-bottom: 6rem;">
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>
<!-- Hero End -->

<style>
    .tox-notifications-container {
        display: hidden;
    }
</style>

@include('layouts.dashboard-styles')

<div class="d-flex" id="wrapper">

    @include('layouts.admin-sidebar-nav')

    <div class="container-fluid p-4 page-content-area">

        <h1 class="mb-4">Programs List</h1>

        <div class="card shadow-sm">
            <div class="card-header fw-bold bg-white">
                Manage Programs
            </div>

            <div class="card-body p-0">

                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-success mt-3 me-3" data-bs-toggle="modal" data-bs-target="#addProgramModal">
                        <i class="fa fa-plus-circle me-1"></i> Add Program
                    </button>
                </div>

                @if($programs->count())
                    <table class="table table-striped table-bordered mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Brief</th>
                                <th style="width:180px;text-align:center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($programs as $index => $p)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/programs/' . $p->image) }}"
                                            style="height: 60px; width: auto; border-radius: 6px;">
                                    </td>
                                    <td>{{ $p->title }}</td>
                                    <td>{{ Str::limit($p->brief, 40) }}</td>

                                    <td class="text-center">

                                        <button class="btn btn-sm btn-primary editProgramBtn" data-id="{{ $p->id }}"
                                            data-title="{{ $p->title }}" data-brief="{{ $p->brief }}"
                                            data-details="{{ htmlspecialchars($p->details) }}">
                                            <i class="fa fa-edit me-1"></i> Edit
                                        </button>

                                        <button class="btn btn-sm btn-danger deleteProgramBtn" data-id="{{ $p->id }}">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>

                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="p-3 text-center text-warning">No programs found.</p>
                @endif

            </div>
        </div>

        <!-- ADD PROGRAM MODAL -->
        <div class="modal fade" id="addProgramModal" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('admin.programs.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Add New Program</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <label>Title</label>
                            <input type="text" class="form-control mb-3" name="title" required>

                            <label>Brief</label>
                            <textarea class="form-control mb-3" name="brief" rows="3" required></textarea>

                            <label>Details</label>
                            <textarea class="form-control mb-3 rich-editor" name="details" rows="6" required></textarea>

                            <label>Image</label>
                            <input type="file" class="form-control mb-3" name="image" accept="image/*" required>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-success">
                                <i class="fa fa-check me-1"></i> Create Program
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>

        <!-- EDIT PROGRAM MODAL -->
        <div class="modal fade" id="editProgramModal" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('admin.programs.update') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" id="editProgramId">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Edit Program</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <label>Title</label>
                            <input type="text" class="form-control mb-3" id="editProgramTitle" name="title" required>

                            <label>Brief</label>
                            <textarea class="form-control mb-3" id="editProgramBrief" name="brief" rows="3"
                                required></textarea>

                            <label>Details</label>
                            <textarea class="form-control mb-3 rich-editor" id="editProgramDetails" name="details"
                                rows="6" required></textarea>

                            <label>Replace Image</label>
                            <input type="file" class="form-control mb-3" name="image" accept="image/*">

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

        {{-- SCRIPTS --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.rich-editor').forEach(function (editorElement) {
                    ClassicEditor.create(editorElement).catch(error => console.error(error));
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {

                // EDIT PROGRAM
                document.querySelectorAll(".editProgramBtn").forEach(btn => {
                    btn.addEventListener("click", function () {

                        document.getElementById('editProgramId').value = this.dataset.id;
                        document.getElementById('editProgramTitle').value = this.dataset.title;
                        document.getElementById('editProgramBrief').value = this.dataset.brief;

                        tinymce.get("editProgramDetails").setContent(this.dataset.details);

                        new bootstrap.Modal(document.getElementById('editProgramModal')).show();
                    });
                });


                // DELETE PROGRAM
                document.querySelectorAll('.deleteProgramBtn').forEach(btn => {
                    btn.addEventListener('click', function () {

                        let id = this.dataset.id;

                        Swal.fire({
                            title: "Delete Program?",
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
                                    allowOutsideClick: false,
                                    showConfirmButton: false,
                                    didOpen: () => Swal.showLoading()
                                });

                                window.location.href = "/admin/programs/delete/" + id;
                            }
                        });

                    });
                });

            });
        </script>

    </div>


    @include('layouts.footer')
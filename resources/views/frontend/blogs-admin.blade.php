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

        <h1 class="mb-4">Blogs List</h1>

        <div class="card shadow-sm">
            <div class="card-header fw-bold bg-white">
                Manage Blogs
            </div>

            <div class="card-body p-0">

                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-success mt-3 me-3" data-bs-toggle="modal" data-bs-target="#addBlogModal">
                        <i class="fa fa-plus-circle me-1"></i> Add Blog
                    </button>
                </div>

                @if($blogs->count())
                    <table class="table table-striped table-bordered mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Brief</th>
                                <th>Published Date</th>
                                <th style="width:180px;text-align:center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($blogs as $index => $b)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('blogs/' . $b->image) }}"
                                            style="height: 60px; width: auto; border-radius: 6px;">
                                    </td>
                                    <td>{{ $b->title }}</td>
                                    <td>{{ Str::limit($b->brief, 40) }}</td>
                                    <td>{{ $b->published_date->format('d M Y') }}</td>
                                    <td class="text-center">

                                        <button class="btn btn-sm btn-primary editBlogBtn" 
                                                data-id="{{ $b->id }}"
                                                data-title="{{ $b->title }}"
                                                data-brief="{{ $b->brief }}"
                                                data-content="{{ htmlspecialchars($b->content) }}"
                                                data-date="{{ $b->published_date }}">
                                            <i class="fa fa-edit me-1"></i> Edit
                                        </button>

                                        <button class="btn btn-sm btn-danger deleteBlogBtn" data-id="{{ $b->id }}">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="p-3 text-center text-warning">No blogs found.</p>
                @endif

            </div>
        </div>

        <!-- ADD BLOG MODAL -->
        <div class="modal fade" id="addBlogModal" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Add New Blog</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <label>Title</label>
                            <input type="text" class="form-control mb-3" name="title" required>

                            <label>Brief</label>
                            <textarea class="form-control mb-3" name="brief" rows="3" required></textarea>

                            <label>Content</label>
                            <textarea class="form-control mb-3 rich-editor" name="content" rows="6"></textarea>

                            <label>Published Date</label>
                            <input type="date" class="form-control mb-3" name="published_date" value="{{ date('Y-m-d') }}" required>

                            <label>Image</label>
                            <input type="file" class="form-control mb-3" name="image" accept="image/*" required>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-success" id="addBlogSubmitBtn">
                                <i class="fa fa-check me-1"></i> Create Blog
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <!-- EDIT BLOG MODAL -->
        <div class="modal fade" id="editBlogModal" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('admin.blogs.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="editBlogId">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Edit Blog</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <label>Title</label>
                            <input type="text" class="form-control mb-3" id="editBlogTitle" name="title" required>

                            <label>Brief</label>
                            <textarea class="form-control mb-3" id="editBlogBrief" name="brief" rows="3" required></textarea>

                            <label>Content</label>
                            <textarea class="form-control mb-3 rich-editor" id="editBlogContent" name="content" rows="6" required></textarea>

                            <label>Published Date</label>
                            <input type="date" class="form-control mb-3" id="editBlogDate" name="published_date" required>

                            <label>Replace Image</label>
                            <input type="file" class="form-control mb-3" name="image" accept="image/*">

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="editBlogSubmitBtn">
                                <i class="fa fa-save me-1"></i> Save
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        {{-- CKEditor --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.rich-editor').forEach(function (editorElement) {
                    ClassicEditor.create(editorElement).catch(error => console.error(error));
                });
            });
        </script>

        {{-- Edit/Delete JS --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {

                // EDIT BLOG
                document.querySelectorAll(".editBlogBtn").forEach(btn => {
                    btn.addEventListener("click", function () {
                        document.getElementById('editBlogId').value = this.dataset.id;
                        document.getElementById('editBlogTitle').value = this.dataset.title;
                        document.getElementById('editBlogBrief').value = this.dataset.brief;
                        document.getElementById('editBlogContent').value = this.dataset.content;
                        document.getElementById('editBlogDate').value = this.dataset.date;

                        ClassicEditor.create(document.getElementById('editBlogContent'))
                            .catch(error => console.error(error));

                        new bootstrap.Modal(document.getElementById('editBlogModal')).show();
                    });
                });

                // DELETE BLOG
                document.querySelectorAll('.deleteBlogBtn').forEach(btn => {
                    btn.addEventListener('click', function () {
                        let id = this.dataset.id;

                        Swal.fire({
                            title: "Delete Blog?",
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

                                window.location.href = "/admin/blogs/delete/" + id;
                            }
                        });
                    });
                });

                // Submit loading
                const addForm = document.querySelector('#addBlogModal form');
                const addBtn = document.getElementById('addBlogSubmitBtn');

                if (addForm) {
                    addForm.addEventListener("submit", function () {
                        addBtn.disabled = true;
                        addBtn.innerHTML = `<i class="fa fa-spinner fa-spin me-1"></i> Creating Blog...`;
                    });
                }

                const editForm = document.querySelector('#editBlogModal form');
                const editBtn = document.getElementById('editBlogSubmitBtn');

                if (editForm) {
                    editForm.addEventListener("submit", function () {
                        editBtn.disabled = true;
                        editBtn.innerHTML = `<i class="fa fa-spinner fa-spin me-1"></i> Saving...`;
                    });
                }

            });
        </script>

    </div>

    @include('layouts.footer')

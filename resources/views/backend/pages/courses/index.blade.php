@extends('backend.layouts.master')

@section('content')
    <div class="dashboard-main-body">
        <!-- Page Header -->
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div>
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Courses</h1>
                <div>
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard</a>
                    <span class="text-secondary-light">/ Courses</span>
                </div>
            </div>
            <a href="{{ route('courses.create') }}" class="btn btn-primary-600 d-flex align-items-center gap-6">
                <i class="ri-add-large-line"></i> Add New Course
            </a>
        </div>

        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: @json(session('success')),
                        timer: 3000,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false
                    });
                });
            </script>
        @endif

        <!-- Courses Table -->
        <div class="mt-24">
            <div class="card h-100">
                <div class="card-body p-0 dataTable-wrapper">
                    <!-- Table Toolbar -->
                    <div
                        class="d-flex align-items-center justify-content-between flex-wrap gap-16 px-20 py-12 border-bottom border-neutral-200">
                        <div class="d-flex flex-wrap align-items-center gap-16">
                            <div class="dropdown">
                                <button type="button"
                                    class="px-12 py-5-px border border-neutral-300 radius-8 d-flex align-items-center gap-20"
                                    data-bs-toggle="dropdown">
                                    <span class="d-flex align-items-center gap-1 text-secondary-light text-sm"><i
                                            class="ri-file-upload-line text-md line-height-1"></i> Export</span>
                                    <span><i class="ri-arrow-down-s-line"></i></span>
                                </button>
                                <ul class="dropdown-menu p-12 border bg-base shadow">
                                    <li><button type="button"
                                            class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"><i
                                                class="ri-file-3-line"></i> PDF</button></li>
                                    <li><button type="button"
                                            class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"><i
                                                class="ri-file-excel-line"></i> Excel</button></li>
                                </ul>
                            </div>
                            <form class="navbar-search dt-search m-0">
                                <input type="text" class="dt-input bg-transparent radius-4" name="search"
                                    placeholder="Search Courses...">
                                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                            </form>
                        </div>
                        <div class="d-flex align-items-center gap-8 text-secondary-light">
                            <span>Rows per page:</span>
                            <div class="dt-length">
                                <select name="dataTable_length" class="dt-input form-control form-select">
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table bordered-table mb-0 data-table" id="dataTable" data-page-length='10'>

                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Course</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($courses as $course)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-12">
                                                <img src="{{ asset('storage/' . $course->home_image) }}" class="rounded"
                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                                <div>
                                                    <p class="fw-medium mb-0">{{ $course->name }}</p>
                                                    <small class="text-muted">{{ $course->slug }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ Str::limit($course->short_description, 80) }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $course->status ? 'success' : 'danger' }} bg-opacity-10 text-{{ $course->status ? 'success' : 'danger' }} px-2 py-1">
                                                {{ $course->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="text-primary-light text-xl"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end border p-2">
                                                    <li>
                                                        <a href="{{ route('courses.edit', $course) }}"
                                                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6">
                                                            <i class="ri-edit-2-line"></i> Edit
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <button type="button"
                                                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                            onclick="confirmDelete({{ $course->id }}, '{{ route('courses.destroy', $course) }}')">
                                                            <i class="ri-delete-bin-6-line"></i> Delete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">No courses found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="mb-3"><span class="avatar avatar-lg bg-danger text-white rounded-circle"><i
                                class="ti ti-trash fs-1"></i></span></div>
                    <h5 class="fw-bold mb-1">Delete Course?</h5>
                    <p class="text-muted small mb-3">This action cannot be undone.</p>
                    <form id="deleteForm" method="POST">@csrf @method('DELETE')
                        <div class="d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function confirmDelete(id, url) {
            document.getElementById('deleteForm').action = url;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }
    </script>
@endpush

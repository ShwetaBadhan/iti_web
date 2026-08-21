@extends('backend.layouts.master')

@section('content')
    <div class="dashboard-main-body">
        <!-- Breadcrumb -->
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div>
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Certificates</h1>
                <div>
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard</a>
                    <span class="text-secondary-light">/ Certificates</span>
                </div>
            </div>
            <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                <i class="ri-add-large-line"></i> Generate Certificate
            </button>
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

        @if (session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: @json(session('error')),
                        timer: 3000,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false
                    });
                });
            </script>
        @endif

        <!-- Main Table Card -->
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
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="d-flex align-items-center gap-1 text-secondary-light text-sm">
                                        <i class="ri-file-upload-line text-md line-height-1"></i>
                                        Export
                                    </span>
                                    <span>
                                        <i class="ri-arrow-down-s-line"></i>
                                    </span>
                                </button>
                                <ul class="dropdown-menu p-12 border bg-base shadow">
                                    <li>
                                        <button type="button"
                                            class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10">
                                            <i class="ri-file-3-line"></i> PDF
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10">
                                            <i class="ri-file-excel-line"></i> Excel
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <form action="{{ route('certificates.index') }}" method="GET"
                                class="navbar-search dt-search m-0">
                                <input type="text" class="dt-input bg-transparent radius-4" aria-controls="dataTable"
                                    name="search" value="{{ request('search') }}" placeholder="Search students...">
                                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                            </form>
                        </div>
                        <div class="d-flex align-items-center gap-8 text-secondary-light">
                            <span>Rows per page:</span>
                            <div class="dt-length">
                                <select name="dataTable_length" aria-controls="dataTable"
                                    class="dt-input form-control form-select">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table bordered-table mb-0 data-table" id="dataTable" data-page-length='10'>
                            <thead class="thead-light">
                                <tr>
                                    <th>S.L</th>
                                    <th>Student</th>
                                    <th>Course</th>
                                    <th>Fee Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $index => $student)
                                    <tr>
                                        <td>{{ $students->firstItem() + $index }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-12">
                                                @if ($student->photo)
                                                    <img src="{{ asset('storage/' . $student->photo) }}"
                                                        class="rounded-circle"
                                                        style="width: 40px; height: 40px; object-fit: cover;">
                                                @else
                                                    <div class="avatar avatar-md bg-light text-dark d-flex align-items-center justify-content-center rounded-circle"
                                                        style="width: 40px; height: 40px;">
                                                        <i class="ri-user-line"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <p class="fw-medium mb-0">{{ $student->name }}</p>
                                                    <small class="text-muted">Roll No: <span
                                                            class="fw-semibold">{{ $student->roll_number }}</span></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $student->course }}</td>
                                        <td>
                                            <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">
                                                <i class="ri-check-line me-1"></i> Paid
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
                                                        <a href="{{ route('certificates.generate', ['id' => $student->id, 'type' => 'regular']) }}"
                                                            target="_blank"
                                                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6">
                                                            <i class="ri-file-text-line"></i> Regular Certificate
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('form5.generate', ['id' => $student->id]) }}"
                                                            target="_blank"
                                                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6">
                                                            <i class="ri-file-paper-2-line"></i> Form 5 Certificate
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            <i class="ri-inbox-line fs-1 d-block mb-2"></i>
                                            No students with paid fees found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($students->hasPages())
                        <div
                            class="d-flex align-items-center justify-content-between flex-wrap gap-16 px-20 py-12 border-top border-neutral-200">
                            <div class="text-secondary-light text-sm">
                                Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of
                                {{ $students->total() }} entries
                            </div>
                            <div>
                                {{ $students->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Generate Certificate Sidebar -->
    <div
        class="my-sidebar bg-white position-fixed end-0 top-0 h-100vh overflow-y-auto z-99 max-w-700-px w-100 translate-x-full duration-300 active-translate-0">
        <div class="px-20 py-12 border-bottom d-flex align-items-center justify-content-between gap-20">
            <h5 class="text-lg mb-0">Generate Certificate</h5>
            <button type="button" class="close-my-sidebar text-danger-600 text-lg d-flex">
                <i class="ri-close-large-line"></i>
            </button>
        </div>
        <form action="{{ route('certificates.index') }}" method="GET" class="d-flex flex-column p-20" id="generateForm">
            <div class="row g-3">
                <div class="col-sm-12">
                    <label for="studentSelect" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Student
                        <span class="text-danger-600">*</span></label>
                    <select id="studentSelect" name="student_id" class="form-control form-select" required>
                        <option value="" disabled selected>Select a Student</option>
                        @foreach ($students as $std)
                            <option value="{{ $std->id }}">{{ $std->name }} ({{ $std->roll_number }}) -
                                {{ $std->course }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12">
                    <label for="certificateType"
                        class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Certificate Type <span
                            class="text-danger-600">*</span></label>
                    <select id="certificateType" name="type" class="form-control form-select" required>
                        <option value="regular">Regular Course Certificate</option>
                        <option value="form5">Form 5 Certificate</option>
                    </select>
                </div>

                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center gap-3 mt-8">
                        <button type="button"
                            class="close-my-sidebar border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-50 py-11 radius-8">Cancel</button>
                        <button type="submit"
                            class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8">
                            <i class="ri-printer-line me-1"></i> Generate
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            // Sidebar toggle
            document.querySelector('.my-sidebar-btn')?.addEventListener('click', () => {
                document.querySelector('.my-sidebar').classList.add('active-translate-0');
            });
            document.querySelectorAll('.close-my-sidebar').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelector('.my-sidebar').classList.remove('active-translate-0');
                });
            });

            // Form submission
            document.getElementById('generateForm')?.addEventListener('submit', function(e) {
                e.preventDefault();
                const studentId = document.getElementById('studentSelect').value;
                const type = document.getElementById('certificateType').value;
                if (!studentId) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Select a student',
                        confirmButtonColor: '#0d6efd'
                    });
                    return;
                }
                const url = `{{ url('certificates/generate') }}/${studentId}/${type}`;
                window.open(url, '_blank');
            });
        </script>
    @endpush
@endsection

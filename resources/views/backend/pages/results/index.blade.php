@extends('backend.layouts.master')

@section('content')
    <div class="dashboard-main-body">
        <!-- Page Header -->
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div>
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Student Results</h1>
                <div>
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard</a>
                    <span class="text-secondary-light">/ Results</span>
                </div>
            </div>
            <button type="button" class="btn btn-primary-600 d-flex align-items-center gap-6" data-bs-toggle="modal"
                data-bs-target="#addResultModal">
                <i class="ri-add-large-line"></i> Add Result
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

        <!-- Results Table -->
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
                                    <th scope="col">Student</th>
                                    <th scope="col">Roll No & Course</th>
                                    <th scope="col">Marksheet</th>
                                    <th scope="col">Regular Cert</th>
                                    <th scope="col">Form 5 Cert</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($results as $result)
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center gap-12">
                                                @if ($result->student && $result->student->photo)
                                                    <img src="{{ asset('storage/' . $result->student->photo) }}"
                                                        class="rounded-circle"
                                                        style="width: 40px; height: 40px; object-fit: cover;">
                                                @else
                                                    <div
                                                        class="avatar avatar-md bg-light text-dark d-flex align-items-center justify-content-center rounded-circle">
                                                        <i class="ti ti-user"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <p class="fw-medium mb-0">{{ $result->student->name ?? 'Unknown' }}</p>
                                                    <small
                                                        class="text-muted">{{ $result->student->father_name ?? '' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 fw-semibold">{{ $result->roll_number }}</p>
                                            <small class="text-muted">{{ $result->course }}</small>
                                        </td>
                                        <td>
                                            @if ($result->marksheet)
                                                <a href="{{ asset('storage/' . $result->marksheet) }}" target="_blank"
                                                    class="btn btn-sm btn-outline-primary"><i class="ri-eye-line"></i>
                                                    View</a>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($result->certificate_regular)
                                                <a href="{{ asset('storage/' . $result->certificate_regular) }}"
                                                    target="_blank" class="btn btn-sm btn-outline-success"><i
                                                        class="ri-eye-line"></i> View</a>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($result->certificate_form5)
                                                <a href="{{ asset('storage/' . $result->certificate_form5) }}"
                                                    target="_blank" class="btn btn-sm btn-outline-info"><i
                                                        class="ri-eye-line"></i> View</a>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('results.toggle-status', $result) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit"
                                                    class="badge bg-{{ $result->status ? 'success' : 'danger' }} bg-opacity-10 text-{{ $result->status ? 'success' : 'danger' }} border border-{{ $result->status ? 'success' : 'danger' }} px-2 py-1 fs-13 fw-medium">
                                                    {{ $result->status ? 'Active' : 'Inactive' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="btn-group">
                                                <button type="button" class="text-primary-light text-xl"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end border p-2">
                                                    <li><button type="button"
                                                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editResultModal{{ $result->id }}"><i
                                                                class="ri-edit-2-line"></i> Edit</button></li>

                                                    <li><button type="button"
                                                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6"
                                                            onclick="confirmDelete('{{ route('results.destroy', $result) }}')"><i
                                                                class="ri-delete-bin-6-line"></i> Delete</button></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- ✅ EDIT MODAL  -->
                                    <div class="modal fade" id="editResultModal{{ $result->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('results.update', $result) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf @method('PUT')
                                                    <div class="modal-header border-bottom">
                                                        <h5 class="modal-title fw-bold">Edit Result</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold">Select Student <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="student_id" class="form-select student-select"
                                                                required>
                                                                <option value="">-- Choose Student --</option>
                                                                @foreach ($students as $student)
                                                                    <option value="{{ $student->id }}"
                                                                        {{ $result->student_id == $student->id ? 'selected' : '' }}
                                                                        data-name="{{ $student->name }}"
                                                                        data-roll="{{ $student->roll_number }}"
                                                                        data-course="{{ $student->course }}"
                                                                        data-father="{{ $student->father_name }}">
                                                                        {{ $student->name }} ({{ $student->roll_number }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="row g-3">
                                                            <div class="col-md-6"><label
                                                                    class="form-label">Name</label><input type="text"
                                                                    class="form-control bg-light edit-name" readonly></div>
                                                            <div class="col-md-6"><label class="form-label">Roll
                                                                    Number</label><input type="text"
                                                                    class="form-control bg-light edit-roll" readonly></div>
                                                            <div class="col-md-6"><label
                                                                    class="form-label">Course</label><input type="text"
                                                                    class="form-control bg-light edit-course" readonly>
                                                            </div>
                                                            <div class="col-md-6"><label class="form-label">Father's
                                                                    Name</label><input type="text"
                                                                    class="form-control bg-light edit-father" readonly>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="form-label">Upload Marksheet
                                                                    (PDF/JPG)</label>
                                                                @if ($result->marksheet)
                                                                    <p class="small text-success mb-1">Current: <a
                                                                            href="{{ asset('storage/' . $result->marksheet) }}"
                                                                            target="_blank">View File</a></p>
                                                                @endif
                                                                <input type="file" name="marksheet"
                                                                    class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Upload Regular
                                                                    Certificate</label>
                                                                @if ($result->certificate_regular)
                                                                    <p class="small text-success mb-1">Current: <a
                                                                            href="{{ asset('storage/' . $result->certificate_regular) }}"
                                                                            target="_blank">View File</a></p>
                                                                @endif
                                                                <input type="file" name="certificate_regular"
                                                                    class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="form-label">Upload Form 5 Certificate</label>
                                                                @if ($result->certificate_form5)
                                                                    <p class="small text-success mb-1">Current: <a
                                                                            href="{{ asset('storage/' . $result->certificate_form5) }}"
                                                                            target="_blank">View File</a></p>
                                                                @endif
                                                                <input type="file" name="certificate_form5"
                                                                    class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label">Status</label>
                                                                <select name="status" class="form-select" required>
                                                                    <option value="1"
                                                                        {{ $result->status == 1 ? 'selected' : '' }}>Active
                                                                    </option>
                                                                    <option value="0"
                                                                        {{ $result->status == 0 ? 'selected' : '' }}>
                                                                        Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-top">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Update
                                                            Result</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ✅ END EDIT MODAL -->

                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">No results uploaded yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ✅ ADD MODAL (Ab bahar hai) -->
    <div class="modal fade" id="addResultModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('results.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title fw-bold">Add Student Result</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Select Student <span
                                    class="text-danger">*</span></label>
                            <select name="student_id" id="addStudentSelect" class="form-select" required>
                                <option value="">-- Choose Student --</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}" data-name="{{ $student->name }}"
                                        data-roll="{{ $student->roll_number }}" data-course="{{ $student->course }}"
                                        data-father="{{ $student->father_name }}">
                                        {{ $student->name }} ({{ $student->roll_number }}) - {{ $student->course }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label">Name</label><input type="text"
                                    id="addName" class="form-control bg-light" readonly></div>
                            <div class="col-md-6"><label class="form-label">Roll Number</label><input type="text"
                                    id="addRoll" class="form-control bg-light" readonly></div>
                            <div class="col-md-6"><label class="form-label">Course</label><input type="text"
                                    id="addCourse" class="form-control bg-light" readonly></div>
                            <div class="col-md-6"><label class="form-label">Father's Name</label><input type="text"
                                    id="addFather" class="form-control bg-light" readonly></div>

                            <div class="col-md-6">
                                <label class="form-label">Upload Marksheet (PDF/JPG)</label>
                                <input type="file" name="marksheet" class="form-control"
                                    accept=".pdf,.jpg,.jpeg,.png">
                                <small class="text-muted">Optional</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Upload Regular Certificate</label>
                                <input type="file" name="certificate_regular" class="form-control"
                                    accept=".pdf,.jpg,.jpeg,.png">
                                <small class="text-primary"><i class="ri-information-line"></i> Select downloaded regular
                                    cert</small>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Upload Form 5 Certificate</label>
                                <input type="file" name="certificate_form5" class="form-control"
                                    accept=".pdf,.jpg,.jpeg,.png">
                                <small class="text-primary"><i class="ri-information-line"></i> Select downloaded Form 5
                                    cert</small>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Result</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ✅ DELETE MODAL (Ab bahar hai) -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="mb-3"><span class="avatar avatar-lg bg-danger text-white rounded-circle"><i
                                class="ti ti-trash fs-1"></i></span></div>
                    <h5 class="fw-bold mb-1">Delete Result?</h5>
                    <p class="text-muted small mb-3">Files will also be deleted.</p>
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

    <script>
        // Dynamic Delete
        function confirmDelete(url) {
            document.getElementById('deleteForm').action = url;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }

        // Auto-fill Add Modal
        document.getElementById('addStudentSelect').addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];
            document.getElementById('addName').value = selected.dataset.name || '';
            document.getElementById('addRoll').value = selected.dataset.roll || '';
            document.getElementById('addCourse').value = selected.dataset.course || '';
            document.getElementById('addFather').value = selected.dataset.father || '';
        });

        // Auto-fill Edit Modals
        document.querySelectorAll('select[name="student_id"]').forEach(select => {
            if (select.closest('.modal-content')) {
                const modal = select.closest('.modal-content');
                const nameInput = modal.querySelector('.edit-name');
                const rollInput = modal.querySelector('.edit-roll');
                const courseInput = modal.querySelector('.edit-course');
                const fatherInput = modal.querySelector('.edit-father');

                const triggerChange = () => {
                    const selected = select.options[select.selectedIndex];
                    if (nameInput) nameInput.value = selected.dataset.name || '';
                    if (rollInput) rollInput.value = selected.dataset.roll || '';
                    if (courseInput) courseInput.value = selected.dataset.course || '';
                    if (fatherInput) fatherInput.value = selected.dataset.father || '';
                };

                select.addEventListener('change', triggerChange);
                triggerChange();
            }
        });
    </script>

@endsection

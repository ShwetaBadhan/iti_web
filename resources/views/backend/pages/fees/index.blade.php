@extends('backend.layouts.master')

@section('content')
<div class="dashboard-main-body">
    <!-- Page Header -->
    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h1 class="fw-semibold mb-4 h6 text-primary-light">Fee Receipts</h1>
            <div>
                <a href="{{ route('dashboard') }}" class="text-secondary-light hover-text-primary hover-underline">Dashboard</a>
                <span class="text-secondary-light">/ Fee Receipts</span>
            </div>
        </div>
        <button type="button" class="btn btn-primary-600 d-flex align-items-center gap-6" data-bs-toggle="modal" data-bs-target="#createReceiptModal">
            <i class="ri-add-large-line"></i> Generate Receipt
        </button>
    </div>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({ icon: 'success', title: 'Success!', text: @json(session('success')), timer: 3000, toast: true, position: 'top-end', showConfirmButton: false });
            });
        </script>
    @endif

    <!-- Receipts Table -->
    <div class="mt-24">
        <div class="card h-100">
            <div class="card-body p-0 dataTable-wrapper">
                <!-- Table Toolbar -->
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-16 px-20 py-12 border-bottom border-neutral-200">
                    <form class="navbar-search dt-search m-0">
                        <input type="text" class="dt-input bg-transparent radius-4" name="search" placeholder="Search receipts...">
                        <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                    </form>
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
                                <th>Receipt No</th>
                                <th>Student</th>
                                <th>Course</th>
                                <th>Paid Amount</th>
                                <th>Pending</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($receipts as $receipt)
                                <tr>
                                    <td><span class="badge bg-light text-dark border">{{ $receipt->receipt_no }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-12">
                                            <div>
                                                <p class="fw-medium mb-0">{{ $receipt->student->name }}</p>
                                                <small class="text-muted">{{ $receipt->student->roll_number }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $receipt->student->course }}</td>
                                    <td class="text-success fw-semibold">₹{{ number_format($receipt->paid_amount, 2) }}</td>
                                    <td class="text-danger fw-semibold">₹{{ number_format($receipt->pending_amount, 2) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($receipt->payment_date)->format('d M, Y') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="text-primary-light text-xl" data-bs-toggle="dropdown" aria-expanded="false">
                                                <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end border p-2">
                                                <li>
                                                    <a href="{{ route('fees.print', $receipt->id) }}" target="_blank" class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6">
                                                        <i class="ri-printer-line"></i> Print
                                                    </a>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6" data-bs-toggle="modal" data-bs-target="#editReceiptModal{{ $receipt->id }}">
                                                        <i class="ri-edit-2-line"></i> Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item rounded text-danger bg-hover-danger-200 d-flex align-items-center gap-2 py-6" onclick="confirmDelete('{{ route('fees.destroy', $receipt) }}')">
                                                        <i class="ri-delete-bin-6-line"></i> Delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <!-- ✅ EDIT MODAL (Inside Loop) -->
                                <div class="modal fade" id="editReceiptModal{{ $receipt->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('fees.update', $receipt) }}" method="POST">
                                                @csrf @method('PUT')
                                                <div class="modal-header border-bottom">
                                                    <h5 class="modal-title fw-bold">Edit Fee Receipt</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <label class="form-label fw-semibold text-sm">Select Student</label>
                                                            <select name="student_id" class="form-select edit-student-select" data-modal-id="{{ $receipt->id }}" required>
                                                                <option value="">-- Choose Student --</option>
                                                                @foreach($students as $student)
                                                                    <option value="{{ $student->id }}" {{ $receipt->student_id == $student->id ? 'selected' : '' }}>
                                                                        {{ $student->name }} ({{ $student->roll_number }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4"><label class="form-label text-sm text-muted">Name</label><input type="text" class="form-control bg-light edit-name-{{ $receipt->id }}" value="{{ $receipt->student->name }}" readonly></div>
                                                        <div class="col-md-4"><label class="form-label text-sm text-muted">Roll No</label><input type="text" class="form-control bg-light edit-roll-{{ $receipt->id }}" value="{{ $receipt->student->roll_number }}" readonly></div>
                                                        <div class="col-md-4"><label class="form-label text-sm text-muted">Course</label><input type="text" class="form-control bg-light edit-course-{{ $receipt->id }}" value="{{ $receipt->student->course }}" readonly></div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold text-sm">Total Fees (₹)</label>
                                                            <input type="number" name="total_fees" class="form-control edit-total-{{ $receipt->id }}" value="{{ $receipt->total_fees }}" step="0.01" required oninput="calculatePending('edit', {{ $receipt->id }})">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold text-sm">Paid Amount ()</label>
                                                            <input type="number" name="paid_amount" class="form-control edit-paid-{{ $receipt->id }}" value="{{ $receipt->paid_amount }}" step="0.01" required oninput="calculatePending('edit', {{ $receipt->id }})">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold text-sm">Pending (₹)</label>
                                                            <input type="number" class="form-control bg-light text-danger fw-bold edit-pending-{{ $receipt->id }}" value="{{ $receipt->pending_amount }}" readonly>
                                                            <input type="hidden" name="pending_amount" class="edit-hidden-pending-{{ $receipt->id }}" value="{{ $receipt->pending_amount }}">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold text-sm">Payment Date</label>
                                                            <input type="date" name="payment_date" class="form-control" value="{{ $receipt->payment_date->format('Y-m-d') }}" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold text-sm">Payment Mode</label>
                                                            <select name="payment_mode" class="form-select" required>
                                                                <option value="Cash" {{ $receipt->payment_mode == 'Cash' ? 'selected' : '' }}>Cash</option>
                                                                <option value="UPI" {{ $receipt->payment_mode == 'UPI' ? 'selected' : '' }}>UPI</option>
                                                                <option value="Bank Transfer" {{ $receipt->payment_mode == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                                                <option value="Card" {{ $receipt->payment_mode == 'Card' ? 'selected' : '' }}>Card</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold text-sm">Remarks</label>
                                                            <input type="text" name="remarks" class="form-control" value="{{ $receipt->remarks }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-top">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Update Receipt</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- ✅ END EDIT MODAL -->

                              @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ CREATE MODAL (Outside Loop) -->
<div class="modal fade" id="createReceiptModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('fees.store') }}" method="POST">
                @csrf
                <div class="modal-header border-bottom">
                    <h5 class="modal-title fw-bold">Generate Fee Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-semibold text-sm">Select Active Student <span class="text-danger">*</span></label>
                            <select name="student_id" id="createStudentSelect" class="form-select" required>
                                <option value="">-- Choose Student --</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->roll_number }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4"><label class="form-label text-sm text-muted">Name</label><input type="text" id="createName" class="form-control bg-light" readonly></div>
                        <div class="col-md-4"><label class="form-label text-sm text-muted">Roll No</label><input type="text" id="createRoll" class="form-control bg-light" readonly></div>
                        <div class="col-md-4"><label class="form-label text-sm text-muted">Course</label><input type="text" id="createCourse" class="form-control bg-light" readonly></div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-sm">Total Fees (₹) <span class="text-danger">*</span></label>
                            <input type="number" name="total_fees" id="createTotal" class="form-control" step="0.01" required oninput="calculatePending('create', '')">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-sm">Paid Amount (₹) <span class="text-danger">*</span></label>
                            <input type="number" name="paid_amount" id="createPaid" class="form-control" step="0.01" required oninput="calculatePending('create', '')">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-sm">Pending (₹)</label>
                            <input type="number" id="createPending" class="form-control bg-light text-danger fw-bold" readonly value="0.00">
                            <input type="hidden" name="pending_amount" id="createHiddenPending" value="0.00">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-sm">Payment Date</label>
                            <input type="date" name="payment_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-sm">Payment Mode</label>
                            <select name="payment_mode" class="form-select" required>
                                <option value="Cash">Cash</option>
                                <option value="UPI">UPI</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Card">Card</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-sm">Remarks</label>
                            <input type="text" name="remarks" class="form-control" placeholder="e.g., 1st Installment">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Generate Receipt</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ✅ DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <div class="mb-3">
                {{-- <span class="avatar avatar-lg bg-danger text-white rounded-circle d-flex align-items-center justify-content-center"><i class="ri-delete-bin-line fs-1"></i></span> --}}
                </div>
                <h5 class="fw-bold mb-1">Delete Receipt?</h5>
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

@push('scripts')
<script>
    // Dynamic Delete
    function confirmDelete(url) {
        document.getElementById('deleteForm').action = url;
        new bootstrap.Modal(document.getElementById('deleteModal')).show();
    }

    // Auto-calculate Pending Amount (Works for both Create and Edit)
    function calculatePending(type, id) {
        let total, paid;
        if (type === 'create') {
            total = parseFloat(document.getElementById('createTotal').value) || 0;
            paid = parseFloat(document.getElementById('createPaid').value) || 0;
            const pending = Math.max(0, total - paid);
            document.getElementById('createPending').value = pending.toFixed(2);
            document.getElementById('createHiddenPending').value = pending.toFixed(2);
        } else {
            total = parseFloat(document.querySelector(`.edit-total-${id}`).value) || 0;
            paid = parseFloat(document.querySelector(`.edit-paid-${id}`).value) || 0;
            const pending = Math.max(0, total - paid);
            document.querySelector(`.edit-pending-${id}`).value = pending.toFixed(2);
            document.querySelector(`.edit-hidden-pending-${id}`).value = pending.toFixed(2);
        }
    }

    // Fetch Student Details via AJAX
    function fetchStudentDetails(studentId, type, id) {
        if (!studentId) {
            if (type === 'create') {
                document.getElementById('createName').value = '';
                document.getElementById('createRoll').value = '';
                document.getElementById('createCourse').value = '';
            }
            return;
        }

        fetch(`/fees/student/${studentId}`)
            .then(response => response.json())
            .then(data => {
                if (type === 'create') {
                    document.getElementById('createName').value = data.name;
                    document.getElementById('createRoll').value = data.roll_number;
                    document.getElementById('createCourse').value = data.course;
                } else {
                    document.querySelector(`.edit-name-${id}`).value = data.name;
                    document.querySelector(`.edit-roll-${id}`).value = data.roll_number;
                    document.querySelector(`.edit-course-${id}`).value = data.course;
                }
            });
    }

    // Create Modal Listener
    document.getElementById('createStudentSelect').addEventListener('change', function() {
        fetchStudentDetails(this.value, 'create', '');
    });

    // Edit Modal Listeners (Loop through all edit selects)
    document.querySelectorAll('.edit-student-select').forEach(select => {
        select.addEventListener('change', function() {
            const modalId = this.dataset.modalId;
            fetchStudentDetails(this.value, 'edit', modalId);
        });
    });
</script>
@endpush
@endsection
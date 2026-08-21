@extends('backend.layouts.master')

@section('content')
<div class="dashboard-main-body">

    <!-- Start Page Header -->
    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div class="">
            <h1 class="fw-semibold mb-4 h6 text-primary-light">FAQs</h1>
            <div class="">
                <a href="{{ route('dashboard') }}" class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                <span class="text-secondary-light">/ FAQs</span>
            </div>
        </div>
        <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6" data-bs-toggle="modal" data-bs-target="#addFaqModal">
            <span class="d-flex text-md"><i class="ri-add-large-line"></i></span>
            Add New FAQ
        </button>
    </div>
    <!-- End Page Header -->

    <!-- SweetAlert Session Messages -->
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({ icon: 'success', title: 'Success!', text: @json(session('success')), timer: 4000, toast: true, position: 'top-end', showConfirmButton: false });
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const errorList = @json($errors->all()).map(err => `<li>${err}</li>`).join('');
                Swal.fire({ icon: 'error', title: 'Validation Error', html: `<ul class="text-start mb-0">${errorList}</ul>`, confirmButtonText: 'Got it', confirmButtonColor: '#dc3545' });
            });
        </script>
    @endif

    <!-- Start FAQs Table Card -->
    <div class="mt-24">
        <div class="card h-100">
            <div class="card-body p-0 dataTable-wrapper">

                <!-- Table Toolbar -->
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-16 px-20 py-12 border-bottom border-neutral-200">
                    <div class="d-flex flex-wrap align-items-center gap-16">
                        <div class="dropdown">
                            <button type="button" class="px-12 py-5-px border border-neutral-300 radius-8 d-flex align-items-center gap-20" data-bs-toggle="dropdown">
                                <span class="d-flex align-items-center gap-1 text-secondary-light text-sm"><i class="ri-file-upload-line text-md line-height-1"></i> Export</span>
                                <span><i class="ri-arrow-down-s-line"></i></span>
                            </button>
                            <ul class="dropdown-menu p-12 border bg-base shadow">
                                <li><button type="button" class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"><i class="ri-file-3-line"></i> PDF</button></li>
                                <li><button type="button" class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"><i class="ri-file-excel-line"></i> Excel</button></li>
                            </ul>
                        </div>
                        <form class="navbar-search dt-search m-0">
                            <input type="text" class="dt-input bg-transparent radius-4" name="search" placeholder="Search FAQs...">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                        </form>
                    </div>
                    <div class="d-flex align-items-center gap-8 text-secondary-light">
                        <span>Rows per page:</span>
                        <div class="dt-length">
                            <select name="dataTable_length" class="dt-input form-control form-select">
                                <option value="10" selected>10</option><option value="25">25</option><option value="50">50</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Data Table -->
                <div class="p-0">
                    <table class="table bordered-table mb-0 data-table" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col" style="width: 35%;">Question</th>
                                <th scope="col" style="width: 35%;">Answer</th>
                                <th scope="col">Order</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($faqs as $faq)
                                <tr>
                                    <!-- Question -->
                                    <td>
                                        <p class="fw-semibold text-dark mb-0">{{ $faq->question }}</p>
                                    </td>
                                    
                                    <!-- Answer (Truncated) -->
                                    <td>
                                        <p class="mb-0 text-secondary-light" style="max-width: 400px;">
                                            {{ Str::limit(strip_tags($faq->answer), 80) }}
                                        </p>
                                    </td>

                                    <!-- Order -->
                                    <td>
                                        <span class="badge bg-light text-dark border px-2 py-1 fs-13 fw-medium">
                                            {{ $faq->order }}
                                        </span>
                                    </td>

                                    <!-- Status -->
                                    <td>
                                        <form action="{{ route('faqs.toggle-status', $faq) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="badge bg-{{ $faq->status ? 'success' : 'danger' }} bg-opacity-10 text-{{ $faq->status ? 'success' : 'danger' }} border border-{{ $faq->status ? 'success' : 'danger' }} px-2 py-1 fs-13 fw-medium">
                                                {{ $faq->status ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Action -->
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="text-primary-light text-xl" data-bs-toggle="dropdown" aria-expanded="false">
                                                <iconify-icon icon="tabler:dots-vertical"></iconify-icon>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                                                <li>
                                                    <button type="button" class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6" data-bs-toggle="modal" data-bs-target="#editFaqModal{{ $faq->id }}">
                                                        <i class="ri-edit-2-line"></i> Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6" type="button" onclick="confirmDelete('{{ route('faqs.destroy', $faq) }}')" data-bs-toggle="modal" data-bs-target="#deleteFaqModal">
                                                        <i class="ri-delete-bin-6-line"></i> Delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <!-- ✅ EDIT MODAL (Generated per FAQ) -->
                                <div class="modal fade" id="editFaqModal{{ $faq->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('faqs.update', $faq) }}" method="POST">
                                                @csrf @method('PUT')
                                                <div class="modal-header border-bottom">
                                                    <h5 class="modal-title fw-bold">Edit FAQ</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Question <span class="text-danger">*</span></label>
                                                        <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Answer <span class="text-danger">*</span></label>
                                                        <textarea name="answer" class="form-control" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Order</label>
                                                            <input type="number" name="order" class="form-control" value="{{ old('order', $faq->order) }}">
                                                            <small class="text-muted">Lower number shows first</small>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Status</label>
                                                            <select name="status" class="form-select">
                                                                <option value="1" {{ old('status', $faq->status) == 1 ? 'selected' : '' }}>Active</option>
                                                                <option value="0" {{ old('status', $faq->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-top">
                                                    <button type="button" class="btn btn-white border" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Update FAQ</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- ✅ END EDIT MODAL -->

                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="ri-question-answer-line fs-1 text-secondary-light opacity-50"></i>
                                            <p class="mt-2 mb-0">No FAQs found. Click "Add New FAQ" to create one.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End FAQs Table Card -->


    <!-- ========================
         Modals Section
    ========================== -->

    <!-- Start Add FAQ Modal -->
    <div class="modal fade" id="addFaqModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('faqs.store') }}" method="POST">
                    @csrf
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title fw-bold">Add New FAQ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Question <span class="text-danger">*</span></label>
                            <input type="text" name="question" class="form-control" value="{{ old('question') }}" placeholder="e.g., What is your return policy?" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Answer <span class="text-danger">*</span></label>
                            <textarea name="answer" class="form-control" rows="5" placeholder="Type the answer here..." required>{{ old('answer') }}</textarea>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Order</label>
                                <input type="number" name="order" class="form-control" value="{{ old('order') }}" placeholder="1">
                                <small class="text-muted">Lower number shows first</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{ old('status') === '1' || old('status') === null ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-white border" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Add FAQ Modal -->

    <!-- Start Delete FAQ Modal (Single Dynamic Modal) -->
    <div class="modal fade" id="deleteFaqModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center position-relative z-1 p-4">
                    <div class="mb-3">
                        <span class="avatar avatar-lg bg-danger text-white rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="fw-bold mb-1">Delete Confirmation</h5>
                    <p class="mb-3 small text-muted">Are you sure? This action cannot be undone.</p>
                    <form id="deleteFaqForm" method="POST">
                        @csrf @method('DELETE')
                        <div class="d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete FAQ Modal -->

    <!-- JavaScript -->
    <script>
        function confirmDelete(url) {
            document.getElementById('deleteFaqForm').action = url;
        }
    </script>

</div>
@endsection
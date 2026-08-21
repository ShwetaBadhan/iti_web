@extends('backend.layouts.master')

@section('content')
<div class="dashboard-main-body">

    <!-- Start Page Header -->
    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div class="">
            <h1 class="fw-semibold mb-4 h6 text-primary-light">Testimonials</h1>
            <div class="">
                <a href="{{ route('dashboard') }}" class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                <span class="text-secondary-light">/ Testimonials</span>
            </div>
        </div>
        <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
            <span class="d-flex text-md"><i class="ri-add-large-line"></i></span>
            Add New Testimonial
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

    <!-- Start Testimonials Table Card -->
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
                            <input type="text" class="dt-input bg-transparent radius-4" name="search" placeholder="Search testimonials...">
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
                                <th scope="col">Client</th>
                                <th scope="col">Message</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testimonials as $testimonial)
                                <tr>
                                    <!-- Client Info -->
                                    <td>
                                        <div class="d-flex align-items-center gap-12">
                                            <div class="avatar avatar-md bg-light text-dark d-flex align-items-center justify-content-center overflow-hidden rounded-circle">
                                                @if ($testimonial->image)
                                                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Photo" class="img-fluid" style="width: 40px; height: 40px; object-fit: cover;">
                                                @else
                                                    <i class="ti ti-user fs-20"></i>
                                                @endif
                                            </div>
                                            <div>
                                                <p class="fw-medium text-dark mb-0">{{ $testimonial->name }}</p>
                                                <small class="text-muted">{{ $testimonial->designation ?: 'No Designation' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <!-- Message -->
                                    <td>
                                        <p class="mb-0 text-secondary-light" style="max-width: 300px;">
                                            {{ Str::limit($testimonial->message, 80) }}
                                        </p>
                                    </td>

                                    <!-- Rating -->
                                    <td>
                                        <div class="d-flex gap-1 text-warning fs-14">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="ri-star-{{ $i <= $testimonial->rating ? 'fill' : 'line' }}"></i>
                                            @endfor
                                        </div>
                                    </td>

                                    <!-- Status -->
                                    <td>
                                        <form action="{{ route('testimonials.toggle-status', $testimonial) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="badge bg-{{ $testimonial->status ? 'success' : 'danger' }} bg-opacity-10 text-{{ $testimonial->status ? 'success' : 'danger' }} border border-{{ $testimonial->status ? 'success' : 'danger' }} px-2 py-1 fs-13 fw-medium">
                                                {{ $testimonial->status ? 'Active' : 'Inactive' }}
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
                                                    <button type="button" class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6" data-bs-toggle="modal" data-bs-target="#editTestimonialModal{{ $testimonial->id }}">
                                                        <i class="ri-edit-2-line"></i> Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6" type="button" onclick="confirmDelete('{{ route('testimonials.destroy', $testimonial) }}')" data-bs-toggle="modal" data-bs-target="#deleteTestimonialModal">
                                                        <i class="ri-delete-bin-6-line"></i> Delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <!-- ✅ EDIT MODAL (Generated per testimonial) -->
                                <div class="modal fade" id="editTestimonialModal{{ $testimonial->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                                                @csrf @method('PUT')
                                                <div class="modal-header border-bottom">
                                                    <h5 class="modal-title fw-bold">Edit Testimonial</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-4 text-center">
                                                            <label class="form-label">Client Photo</label>
                                                            <div class="mb-3">
                                                                @if ($testimonial->image)
                                                                    <img src="{{ asset('storage/' . $testimonial->image) }}" class="img-fluid rounded-circle border" style="width: 120px; height: 120px; object-fit: cover;">
                                                                @else
                                                                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 120px; height: 120px;"><i class="ti ti-user fs-1 text-muted"></i></div>
                                                                @endif
                                                            </div>
                                                            <input type="file" name="image" class="form-control form-control-sm" accept="image/*" onchange="previewImage(this, 'editPreview{{ $testimonial->id }}')">
                                                            <small class="text-muted">Leave empty to keep current</small>
                                                            <img id="editPreview{{ $testimonial->id }}" class="img-fluid rounded-circle mt-2 d-none" style="width: 100px; height: 100px; object-fit: cover;">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="row g-3">
                                                                <div class="col-6">
                                                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                                                    <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label">Designation</label>
                                                                    <input type="text" name="designation" class="form-control" value="{{ old('designation', $testimonial->designation) }}">
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="form-label">Message <span class="text-danger">*</span></label>
                                                                    <textarea name="message" class="form-control" rows="3" required>{{ old('message', $testimonial->message) }}</textarea>
                                                                </div>
                                                                <div class="col-4">
                                                                    <label class="form-label">Rating (1-5)</label>
                                                                    <select name="rating" class="form-select">
                                                                        @for($r=1; $r<=5; $r++)
                                                                            <option value="{{ $r }}" {{ old('rating', $testimonial->rating) == $r ? 'selected' : '' }}>{{ $r }} Star{{ $r > 1 ? 's' : '' }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                                <div class="col-4">
                                                                    <label class="form-label">Order</label>
                                                                    <input type="number" name="order" class="form-control" value="{{ old('order', $testimonial->order) }}">
                                                                </div>
                                                                <div class="col-4">
                                                                    <label class="form-label">Status</label>
                                                                    <select name="status" class="form-select">
                                                                        <option value="1" {{ old('status', $testimonial->status) == 1 ? 'selected' : '' }}>Active</option>
                                                                        <option value="0" {{ old('status', $testimonial->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-top">
                                                    <button type="button" class="btn btn-white border" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Update Testimonial</button>
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
                                            <i class="ri-chat-quote-line fs-1 text-secondary-light opacity-50"></i>
                                            <p class="mt-2 mb-0">No testimonials found.</p>
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
    <!-- End Testimonials Table Card -->


    <!-- ========================
         Modals Section
    ========================== -->

    <!-- Start Add Testimonial Modal -->
    <div class="modal fade" id="addTestimonialModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title fw-bold">Add New Testimonial</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-4 text-center">
                                <label class="form-label">Client Photo</label>
                                <div class="mb-3 bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                                    <i class="ti ti-user fs-1 text-muted"></i>
                                </div>
                                <input type="file" name="image" class="form-control form-control-sm" accept="image/*" onchange="previewImage(this, 'addPreview')">
                                <small class="text-muted">Max 2MB (JPG, PNG)</small>
                                <img id="addPreview" class="img-fluid rounded-circle mt-2 d-none" style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                            <div class="col-md-8">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Designation</label>
                                        <input type="text" name="designation" class="form-control" value="{{ old('designation') }}" placeholder="e.g. CEO, Tech Corp">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Message <span class="text-danger">*</span></label>
                                        <textarea name="message" class="form-control" rows="3" required>{{ old('message') }}</textarea>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Rating (1-5)</label>
                                        <select name="rating" class="form-select">
                                            <option value="5" {{ old('rating') == '5' || old('rating') === null ? 'selected' : '' }}>5 Stars</option>
                                            <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>4 Stars</option>
                                            <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>3 Stars</option>
                                            <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>2 Stars</option>
                                            <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>1 Star</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Order</label>
                                        <input type="number" name="order" class="form-control" value="{{ old('order') }}" placeholder="1">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="1" {{ old('status') === '1' || old('status') === null ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top">
                        <button type="button" class="btn btn-white border" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Testimonial</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Add Testimonial Modal -->

    <!-- Start Delete Testimonial Modal (Single Dynamic Modal) -->
    <div class="modal fade" id="deleteTestimonialModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center position-relative z-1 p-4">
                    <div class="mb-3">
                        <span class="avatar avatar-lg bg-danger text-white rounded-circle"><i class="ti ti-trash fs-24"></i></span>
                    </div>
                    <h5 class="fw-bold mb-1">Delete Confirmation</h5>
                    <p class="mb-3 small text-muted">Are you sure? This action cannot be undone.</p>
                    <form id="deleteTestimonialForm" method="POST">
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
    <!-- End Delete Testimonial Modal -->

   

</div>
@endsection

@push('scripts')
     <!-- JavaScript -->
    <script>
        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById(previewId);
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function confirmDelete(url) {
            document.getElementById('deleteTestimonialForm').action = url;
        }
    </script>
@endpush
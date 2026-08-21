@extends('backend.layouts.master')

@section('content')
<div class="dashboard-main-body">

    <!-- Start Page Header -->
    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div class="">
            <h1 class="fw-semibold mb-4 h6 text-primary-light">Home Page Sliders</h1>
            <div class="">
                <a href="{{ route('dashboard') }}" class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                <span class="text-secondary-light">/ Sliders</span>
            </div>
        </div>
        <button type="button" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6" data-bs-toggle="modal" data-bs-target="#addSliderModal">
            <span class="d-flex text-md">
                <i class="ri-add-large-line"></i>
            </span>
            Add New Slider
        </button>
    </div>
    <!-- End Page Header -->

    <!-- SweetAlert Session Messages -->
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: @json(session('success')),
                    timer: 4000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end'
                });
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const errorList = @json($errors->all()).map(err => `<li>${err}</li>`).join('');
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: `<ul class="text-start mb-0">${errorList}</ul>`,
                    confirmButtonText: 'Got it',
                    confirmButtonColor: '#dc3545'
                });
            });
        </script>
    @endif

    <!-- Start Sliders Table Card -->
    <div class="mt-24">
        <div class="card h-100">
            <div class="card-body p-0 dataTable-wrapper">

                <!-- Table Toolbar -->
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-16 px-20 py-12 border-bottom border-neutral-200">
                    <div class="d-flex flex-wrap align-items-center gap-16">
                        <div class="dropdown">
                            <button type="button" class="px-12 py-5-px border border-neutral-300 radius-8 d-flex align-items-center gap-20" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-flex align-items-center gap-1 text-secondary-light text-sm">
                                    <i class="ri-file-upload-line text-md line-height-1"></i>
                                    Export
                                </span>
                                <span class="">
                                    <i class="ri-arrow-down-s-line"></i>
                                </span>
                            </button>
                            <ul class="dropdown-menu p-12 border bg-base shadow">
                                <li>
                                    <button type="button" class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10">
                                        <i class="ri-file-3-line"></i> PDF
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10">
                                        <i class="ri-file-excel-line"></i> Excel
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <form class="navbar-search dt-search m-0">
                            <input type="text" class="dt-input bg-transparent radius-4" aria-controls="dataTable" name="search" placeholder="Search sliders...">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                        </form>
                    </div>
                    <div class="d-flex align-items-center gap-8 text-secondary-light">
                        <span>Rows per page:</span>
                        <div class="dt-length">
                            <select name="dataTable_length" aria-controls="dataTable" class="dt-input form-control form-select">
                                <option value="5">5</option>
                                <option value="10" selected>10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Data Table -->
                <div class="p-0">
                    <table class="table bordered-table mb-0 data-table" id="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">Slider</th>
                                <th scope="col">Order</th>
                                <th scope="col">Button</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sliders as $slider)
                                <tr>
                                    <!-- Slider Image & Title -->
                                    <td>
                                        <div class="d-flex align-items-center gap-12">
                                            <div class="avatar avatar-md bg-light text-dark d-flex align-items-center justify-content-center overflow-hidden rounded-circle">
                                                <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image" class="img-fluid" style="width: 40px; height: 40px; object-fit: cover;">
                                            </div>
                                            <div>
                                                <p class="fw-medium text-dark mb-0">{{ $slider->title ?: 'Untitled Slider' }}</p>
                                                <small class="text-muted">{{ Str::limit($slider->subtitle, 35) ?: 'No subtitle' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <!-- Order -->
                                    <td>
                                        <span class="badge bg-light text-dark border px-2 py-1 fs-13 fw-medium">
                                            {{ $slider->order }}
                                        </span>
                                    </td>

                                    <!-- Button -->
                                    <td>
                                        @if($slider->button_text)
                                            <span class="text-primary fw-medium fs-13">{{ $slider->button_text }}</span>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>

                                    <!-- Status -->
                                    <td>
                                        <form action="{{ route('sliders.toggle-status', $slider) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="badge bg-{{ $slider->status ? 'success' : 'danger' }} bg-opacity-10 text-{{ $slider->status ? 'success' : 'danger' }} border border-{{ $slider->status ? 'success' : 'danger' }} px-2 py-1 fs-13 fw-medium">
                                                {{ $slider->status ? 'Active' : 'Inactive' }}
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
                                                    <button type="button" class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6" data-bs-toggle="modal" data-bs-target="#editSliderModal{{ $slider->id }}">
                                                        <i class="ri-edit-2-line"></i> Edit
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6" type="button" onclick="confirmDelete('{{ route('sliders.destroy', $slider) }}')" data-bs-toggle="modal" data-bs-target="#deleteSliderModal">
                                                        <i class="ri-delete-bin-6-line"></i> Delete
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <!-- ✅ EDIT MODAL (Generated per slider) -->
                                <div class="modal fade" id="editSliderModal{{ $slider->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
                                                @csrf @method('PUT')
                                                <div class="modal-header border-bottom">
                                                    <h5 class="modal-title fw-bold">Edit Slider</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-5">
                                                            <label class="form-label">Current Image</label>
                                                            <img src="{{ asset('storage/' . $slider->image) }}" class="img-fluid rounded mb-2 border" style="height: 140px; width: 100%; object-fit: cover;">
                                                            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(this, 'editPreview{{ $slider->id }}')">
                                                            <small class="text-muted">Leave empty to keep current</small>
                                                            <img id="editPreview{{ $slider->id }}" class="img-fluid rounded mt-2 d-none" style="height: 100px; width: 100%; object-fit: cover;">
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="mb-3">
                                                                <label class="form-label">Title</label>
                                                                <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Subtitle</label>
                                                                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $slider->subtitle) }}">
                                                            </div>
                                                            <div class="row g-3">
                                                                <div class="col-6">
                                                                    <label class="form-label">Button Text</label>
                                                                    <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $slider->button_text) }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label">Button URL</label>
                                                                    <input type="url" name="button_url" class="form-control" value="{{ old('button_url', $slider->button_url) }}">
                                                                </div>
                                                            </div>
                                                            <div class="row g-3 mt-1">
                                                                <div class="col-6">
                                                                    <label class="form-label">Order</label>
                                                                    <input type="number" name="order" class="form-control" value="{{ old('order', $slider->order) }}">
                                                                </div>
                                                                <div class="col-6">
                                                                    <label class="form-label">Status</label>
                                                                    <select name="status" class="form-select">
                                                                        <option value="1" {{ old('status', $slider->status) == 1 ? 'selected' : '' }}>Active</option>
                                                                        <option value="0" {{ old('status', $slider->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-top">
                                                    <button type="button" class="btn btn-white border" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Update Slider</button>
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
                                            <i class="ri-image-line fs-1 text-secondary-light opacity-50"></i>
                                            <p class="mt-2 mb-0">No sliders found. Click "Add New Slider" to create one.</p>
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
    <!-- End Sliders Table Card -->


    <!-- ========================
         Modals Section
    ========================== -->

    <!-- Start Add Slider Modal -->
    <div class="modal fade" id="addSliderModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title fw-bold">Add New Slider</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <label class="form-label">Slider Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" accept="image/*" required onchange="previewImage(this, 'addPreview')">
                                <small class="text-muted">Recommended: 1920x600px (Max 2MB)</small>
                                <img id="addPreview" class="img-fluid rounded mt-2 d-none" style="height: 140px; width: 100%; object-fit: cover;">
                            </div>
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g., Welcome to Our School">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Subtitle</label>
                                    <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}" placeholder="e.g., Best education for your child">
                                </div>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label">Button Text</label>
                                        <input type="text" name="button_text" class="form-control" value="{{ old('button_text') }}" placeholder="e.g., Learn More">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Button URL</label>
                                        <input type="url" name="button_url" class="form-control" value="{{ old('button_url') }}" placeholder="https://...">
                                    </div>
                                </div>
                                <div class="row g-3 mt-1">
                                    <div class="col-6">
                                        <label class="form-label">Order</label>
                                        <input type="number" name="order" class="form-control" value="{{ old('order') }}" placeholder="1">
                                        <small class="text-muted">Lower number shows first</small>
                                    </div>
                                    <div class="col-6">
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
                        <button type="submit" class="btn btn-primary">Save Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Add Slider Modal -->

    <!-- Start Delete Slider Modal (Single Dynamic Modal) -->
    <div class="modal fade" id="deleteSliderModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center position-relative z-1 p-4">
                    <div class="mb-3">
                        <span class="avatar avatar-lg bg-danger text-white rounded-circle">
                            <i class="ti ti-trash fs-24"></i>
                        </span>
                    </div>
                    <h5 class="fw-bold mb-1">Delete Confirmation</h5>
                    <p class="mb-3 small text-muted">Are you sure? This action cannot be undone.</p>
                    <form id="deleteSliderForm" method="POST">
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
    <!-- End Delete Slider Modal -->

   

</div>
@endsection

@push('scripts')
     <!-- JavaScript for Image Preview & Delete Logic -->
    <script>
        // Image Preview Function
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

        // Dynamic Delete Modal Logic
        function confirmDelete(url) {
            document.getElementById('deleteSliderForm').action = url;
        }
    </script>
@endpush
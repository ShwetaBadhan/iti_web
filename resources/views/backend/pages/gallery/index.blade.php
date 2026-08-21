@extends('backend.layouts.master')

@section('content')
<div class="dashboard-main-body">

    <!-- Page Header -->
    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h1 class="fw-semibold mb-4 h6 text-primary-light">Gallery</h1>
            <div>
                <a href="{{ route('dashboard') }}" class="text-secondary-light hover-text-primary hover-underline">Dashboard</a>
                <span class="text-secondary-light">/ Gallery</span>
            </div>
        </div>
        <button type="button" class="btn btn-primary-600 d-flex align-items-center gap-6" data-bs-toggle="modal" data-bs-target="#addGalleryModal">
            <i class="ri-add-large-line"></i> Upload Image
        </button>
    </div>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({ icon: 'success', title: 'Success!', text: @json(session('success')), timer: 3000, toast: true, position: 'top-end', showConfirmButton: false });
            });
        </script>
    @endif

    <!-- Gallery Grid -->
    <div class="mt-24">
        <div class="card h-100">
            <div class="card-body">
                <div class="row g-4">
                    @forelse($galleries as $gallery)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card border h-100 position-relative overflow-hidden">
                                <!-- Image -->
                                <div class="position-relative" style="height: 200px;">
                                    <img src="{{ asset('storage/' . $gallery->image) }}" 
                                         class="w-100 h-100" 
                                         style="object-fit: cover;" 
                                         alt="{{ $gallery->title ?? 'Gallery Image' }}">
                                    
                                    <!-- Status Badge -->
                                    <span class="position-absolute top-0 end-0 m-2 badge bg-{{ $gallery->status ? 'success' : 'secondary' }} bg-opacity-75">
                                        {{ $gallery->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>

                                <!-- Content -->
                                <div class="card-body p-3">
                                    <h6 class="mb-2 fw-semibold text-truncate">{{ $gallery->title ?? 'Untitled' }}</h6>
                                    <small class="text-muted d-block">{{ $gallery->created_at->format('d M Y') }}</small>
                                </div>

                                <!-- Actions -->
                                <div class="card-footer bg-transparent border-0 p-3 pt-0">
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('gallery.toggle-status', $gallery) }}" method="POST" class="flex-grow-1">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-{{ $gallery->status ? 'outline-success' : 'outline-secondary' }} w-100">
                                                {{ $gallery->status ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-outline-primary" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editGalleryModal{{ $gallery->id }}">
                                            <i class="ri-edit-line"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" 
                                                onclick="confirmDelete({{ $gallery->id }}, '{{ route('gallery.destroy', $gallery) }}')"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal (Per Gallery) -->
                            <div class="modal fade" id="editGalleryModal{{ $gallery->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="{{ route('gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header border-bottom">
                                                <h5 class="modal-title fw-bold">Edit Image</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Current Image -->
                                                <div class="mb-3 text-center">
                                                    <label class="form-label fw-semibold">Current Image</label>
                                                    <img src="{{ asset('storage/' . $gallery->image) }}" class="img-fluid rounded" style="max-height: 200px;">
                                                </div>

                                                <!-- Upload New Image -->
                                                <div class="mb-3">
                                                    <label class="form-label">Change Image (Optional)</label>
                                                    <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(this, 'editPreview{{ $gallery->id }}')">
                                                    <img id="editPreview{{ $gallery->id }}" class="img-fluid rounded mt-2 d-none" style="max-height: 150px;">
                                                </div>

                                                <!-- Title -->
                                                <div class="mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}">
                                                </div>

                                                <!-- Status -->
                                                <div class="mb-0">
                                                    <label class="form-label">Status</label>
                                                    <select name="status" class="form-select" required>
                                                        <option value="1" {{ old('status', $gallery->status) == 1 ? 'selected' : '' }}>Active</option>
                                                        <option value="0" {{ old('status', $gallery->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-top">
                                                <button type="button" class="btn btn-white border" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="ri-image-line fs-1 text-secondary-light opacity-50"></i>
                            <p class="mt-3 mb-0 text-muted">No images in gallery yet</p>
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addGalleryModal">Upload First Image</button>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Gallery Modal -->
<div class="modal fade" id="addGalleryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header border-bottom">
                    <h5 class="modal-title fw-bold">Upload New Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Image <span class="text-danger">*</span></label>
                        <div class="border rounded-3 p-4 text-center bg-light" id="dropZone">
                            <input type="file" name="image" id="imageInput" class="d-none" accept="image/*" required onchange="previewImage(this, 'addPreview')">
                            
                            <div id="uploadPrompt" class="cursor-pointer" onclick="document.getElementById('imageInput').click()">
                                <i class="ri-image-add-line fs-1 text-primary-600 mb-2 d-block"></i>
                                <h6 class="fw-semibold mb-1">Click to upload image</h6>
                                <small class="text-muted">PNG, JPG, WEBP up to 5MB</small>
                            </div>
                            
                            <div id="addPreview" class="d-none position-relative d-inline-block">
                                <img id="previewImg" class="img-fluid rounded" style="max-height: 250px;">
                                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2 rounded-circle" onclick="removeImage()" style="width: 32px; height: 32px;">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label">Title (Optional)</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g., Annual Function 2024">
                    </div>

                    <!-- Status -->
                    <div class="mb-0">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="1" {{ old('status') === '1' || old('status') === null ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-white border" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="ri-upload-line me-1"></i> Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-4">
                <div class="mb-3">
                    <span class="avatar avatar-lg bg-danger text-white rounded-circle">
                        <i class="ti ti-trash fs-1"></i>
                    </span>
                </div>
                <h5 class="fw-bold mb-1">Delete Image?</h5>
                <p class="text-muted small mb-3">This action cannot be undone.</p>
                <form id="deleteForm" method="POST">
                    @csrf @method('DELETE')
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
// Image Preview Function
function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById(previewId);
            const img = preview.querySelector('img') || preview;
            img.src = e.target.result;
            preview.classList.remove('d-none');
            if(document.getElementById('uploadPrompt')) {
                document.getElementById('uploadPrompt').classList.add('d-none');
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    document.getElementById('imageInput').value = '';
    document.getElementById('uploadPrompt').classList.remove('d-none');
    document.getElementById('addPreview').classList.add('d-none');
}

// Delete Confirmation
function confirmDelete(id, url) {
    document.getElementById('deleteForm').action = url;
}

// Drag and Drop
const dropZone = document.getElementById('dropZone');
if(dropZone) {
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('border-primary');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('border-primary');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('border-primary');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            document.getElementById('imageInput').files = files;
            previewImage(document.getElementById('imageInput'), 'addPreview');
        }
    });
}
</script>
@endpush
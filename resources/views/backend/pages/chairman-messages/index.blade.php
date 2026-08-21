@extends('backend.layouts.master')

@section('content')
<div class="dashboard-main-body">

    <!-- Start Page Header -->
    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div class="">
            <h1 class="fw-semibold mb-4 h6 text-primary-light">
                {{ $message ? 'Edit Chairman Message' : 'Add Chairman Message' }}
            </h1>
            <div class="">
                <a href="{{ route('dashboard') }}" class="text-secondary-light hover-text-primary hover-underline">Dashboard </a>
                <span class="text-secondary-light">/ Chairman Message</span>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- SweetAlert Success Message -->
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: @json(session('success')),
                    timer: 3000,
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

    <!-- Start Direct Form Card -->
    <div class="mt-24">
        <div class="card h-100">
            <div class="card-body">
                
                <form action="{{ route('chairman-message.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-4">
                        <!-- Left Column: Image Upload -->
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">Chairman Photo</label>
                            <div class="text-center p-4 border rounded-3 bg-light">
                                @if ($message && $message->image)
                                    <img id="imagePreview" src="{{ asset('storage/' . $message->image) }}" 
                                         class="img-fluid rounded-circle mb-3 border" 
                                         style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                    <div id="imagePlaceholder" class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 border" style="width: 150px; height: 150px;">
                                        <i class="ti ti-user fs-1 text-muted"></i>
                                    </div>
                                    <img id="imagePreview" class="img-fluid rounded-circle mb-3 border d-none" style="width: 150px; height: 150px; object-fit: cover;">
                                @endif

                                <input type="file" name="image" class="form-control form-control-sm" accept="image/*" onchange="previewImage(this)">
                                <small class="text-muted d-block mt-2">Recommended: 400x400px (Max 2MB)</small>
                            </div>
                        </div>

                        <!-- Right Column: Details -->
                        <div class="col-lg-8">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" 
                                           value="{{ old('name', $message->name ?? '') }}" 
                                           placeholder="Enter Chairman Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Designation</label>
                                    <input type="text" name="designation" class="form-control" 
                                           value="{{ old('designation', $message->designation ?? '') }}" 
                                           placeholder="e.g. Chairman, Board of Directors">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
                                    <textarea name="message" class="form-control" rows="8" 
                                              placeholder="Write the chairman's message here..." required>{{ old('message', $message->message ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                        <a href="{{ route('dashboard') }}" class="btn btn-white border">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="ri-save-line me-1"></i> 
                            {{ $message ? 'Update Message' : 'Save Message' }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- End Direct Form Card -->

   

</div>
@endsection

@push('scripts')
     <!-- JavaScript for Image Preview -->
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    const placeholder = document.getElementById('imagePlaceholder');
                    
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                    
                    if(placeholder) placeholder.classList.add('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
@extends('backend.layouts.master')

@section('content')
    <!-- Trix Editor CSS -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.1.0/dist/trix.css">

    <div class="dashboard-main-body">

        <!-- Page Header -->
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div>
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Create New Course</h1>
                <div>
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard</a>
                    <span class="text-secondary-light">/ <a href="{{ route('courses.index') }}">Courses</a> / Create</span>
                </div>
            </div>
        </div>

        <!-- Validation Errors -->
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

        <!-- Form Card -->
        <div class="mt-24">
            <div class="card h-100">
                <div class="card-body">
                    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-4">
                            <!-- Left Column: Images -->
                            <div class="col-lg-4">
                                <div class="card border p-3 bg-light h-100">
                                    <h6 class="fw-bold mb-3">Course Images</h6>

                                    <!-- Home Image -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Home Page Image <span
                                                class="text-danger">*</span></label>
                                        <div class="text-center p-3 border rounded bg-white mb-2">
                                            <img id="homePreview" class="img-fluid rounded d-none"
                                                style="height: 150px; width: 100%; object-fit: cover;">
                                            <div id="homePlaceholder"
                                                class="d-flex align-items-center justify-content-center text-muted"
                                                style="height: 150px;">
                                                <i class="ri-image-line fs-1"></i>
                                            </div>
                                        </div>
                                        <input type="file" name="home_image" class="form-control form-control-sm"
                                            accept="image/*" required
                                            onchange="previewImage(this, 'homePreview', 'homePlaceholder')">
                                        <small class="text-muted">Recommended: 800x600px (Max 2MB)</small>
                                    </div>

                                    <!-- Detail Image -->
                                    <div class="mb-0">
                                        <label class="form-label fw-semibold">Detail Page Banner <span
                                                class="text-danger">*</span></label>
                                        <div class="text-center p-3 border rounded bg-white mb-2">
                                            <img id="detailPreview" class="img-fluid rounded d-none"
                                                style="height: 150px; width: 100%; object-fit: cover;">
                                            <div id="detailPlaceholder"
                                                class="d-flex align-items-center justify-content-center text-muted"
                                                style="height: 150px;">
                                                <i class="ri-image-line fs-1"></i>
                                            </div>
                                        </div>
                                        <input type="file" name="detail_image" class="form-control form-control-sm"
                                            accept="image/*" required
                                            onchange="previewImage(this, 'detailPreview', 'detailPlaceholder')">
                                        <small class="text-muted">Recommended: 1200x400px (Max 2MB)</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column: Content -->
                            <div class="col-lg-8">
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <label class="form-label fw-semibold">Course Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}" placeholder="e.g., Truck Dispatcher" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-select" required>
                                            <option value="1"
                                                {{ old('status') === '1' || old('status') === null ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Short Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="short_description" class="form-control" rows="2"
                                            placeholder="Brief summary for the home page card..." required>{{ old('short_description') }}</textarea>
                                        <small class="text-muted">Plain text only (no formatting)</small>
                                    </div>

                                    <!-- Course Detail with Trix Editor -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Course Detail (What you'll learn) <span
                                                class="text-danger">*</span></label>
                                        <input id="course_detail" type="hidden" name="course_detail"
                                            value="{{ old('course_detail') }}">
                                        <trix-editor input="course_detail" class="trix-content border rounded"
                                            style="min-height: 200px;"></trix-editor>
                                    </div>

                                    <!-- Course Overview with Trix Editor -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Course Overview <span
                                                class="text-danger">*</span></label>
                                        <input id="course_overview" type="hidden" name="course_overview"
                                            value="{{ old('course_overview') }}">
                                        <trix-editor input="course_overview" class="trix-content border rounded"
                                            style="min-height: 200px;"></trix-editor>
                                    </div>

                                    <!-- Career Opportunities with Trix Editor -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Career Opportunities <span
                                                class="text-danger">*</span></label>
                                        <input id="career_opportunities" type="hidden" name="career_opportunities"
                                            value="{{ old('career_opportunities') }}">
                                        <trix-editor input="career_opportunities" class="trix-content border rounded"
                                            style="min-height: 150px;"></trix-editor>
                                    </div>

                                    <!-- Dynamic Downloads Section -->
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <label class="form-label fw-semibold mb-0">Downloads (PDFs, Brochures,
                                                etc.)</label>
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                onclick="addDownloadRow()">
                                                <i class="ri-add-line"></i> Add File
                                            </button>
                                        </div>
                                        <div id="downloads-container" class="border rounded p-3 bg-light">
                                            <p class="text-muted small mb-0 text-center" id="no-downloads-msg">No
                                                downloads added yet. Click "Add File" to upload.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                            <a href="{{ route('courses.index') }}" class="btn btn-white border">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="ri-save-line me-1"></i> Create Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Trix Editor JS -->
    <script type="text/javascript" src="https://unpkg.com/trix@2.1.0/dist/trix.umd.min.js"></script>
@endsection

@push('scripts')
    <script>
        let downloadIndex = 0;

        function previewImage(input, previewId, placeholderId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(previewId).src = e.target.result;
                    document.getElementById(previewId).classList.remove('d-none');
                    document.getElementById(placeholderId).classList.add('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function addDownloadRow(name = '', file = '') {
            document.getElementById('no-downloads-msg').classList.add('d-none');
            const container = document.getElementById('downloads-container');

            const row = document.createElement('div');
            row.className = 'd-flex gap-2 mb-2 align-items-center download-row';
            row.innerHTML = `
            <div class="flex-grow-1">
                <input type="text" name="downloads[${downloadIndex}][name]" class="form-control form-control-sm" placeholder="File Name (e.g., Syllabus PDF)" value="${name}" required>
            </div>
            <div class="flex-grow-1">
                <input type="file" name="downloads[${downloadIndex}][file]" class="form-control form-control-sm" accept=".pdf,.doc,.docx" ${file ? '' : 'required'}>
                ${file ? `<small class="text-success">Current: ${file}</small>` : ''}
            </div>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.parentElement.remove(); checkDownloadsEmpty();">
                <i class="ri-delete-bin-line"></i>
            </button>
        `;
            container.appendChild(row);
            downloadIndex++;
        }

        function checkDownloadsEmpty() {
            if (document.querySelectorAll('.download-row').length === 0) {
                document.getElementById('no-downloads-msg').classList.remove('d-none');
            }
        }

        // Trix Editor Configuration - Remove image upload option (optional)
        document.addEventListener("trix-initialize", function(event) {
            const fileTools = event.target.querySelector(".trix-button-group--file-tools");
            if (fileTools) {
                fileTools.remove();
            }
        });
    </script>
@endpush

<style>
    /* Trix Editor Custom Styling */
    trix-toolbar {
        position: sticky;
        top: 0;
        z-index: 10;
        background: #fff;
        border-bottom: 1px solid #e2e8f0;
        border-radius: 0.375rem 0.375rem 0 0;
    }

    trix-editor {
        border: 1px solid #e2e8f0;
        border-radius: 0 0 0.375rem 0.375rem;
        padding: 12px;
        min-height: 150px;
    }

    trix-editor:focus {
        outline: none;
        border-color: #25A194;
        box-shadow: 0 0 0 3px rgba(37, 161, 148, 0.1);
    }

    /* Trix content styling */
    .trix-content ul {
        list-style-type: disc;
        padding-left: 2em;
        margin-bottom: 1em;
    }

    .trix-content ol {
        list-style-type: decimal;
        padding-left: 2em;
        margin-bottom: 1em;
    }

    .trix-content p {
        margin-bottom: 1em;
    }
</style>

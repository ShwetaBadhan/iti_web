@extends('backend.layouts.master')

@section('content')
    <div class="dashboard-main-body">

        <!-- Page Header -->
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div>
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Edit Course</h1>
                <div>
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard</a>
                    <span class="text-secondary-light">/ <a href="{{ route('courses.index') }}">Courses</a> / Edit</span>
                </div>
            </div>
        </div>

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
                    <form action="{{ route('courses.update', $course) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">
                            <!-- Left Column: Images -->
                            <div class="col-lg-4">
                                <div class="card border p-3 bg-light h-100">
                                    <h6 class="fw-bold mb-3">Course Images</h6>

                                    <!-- Home Image -->
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">Home Page Image</label>
                                        <div class="text-center p-3 border rounded bg-white mb-2">
                                            <img id="homePreview" src="{{ asset('storage/' . $course->home_image) }}"
                                                class="img-fluid rounded"
                                                style="height: 150px; width: 100%; object-fit: cover;">
                                        </div>
                                        <input type="file" name="home_image" class="form-control form-control-sm"
                                            accept="image/*" onchange="previewImage(this, 'homePreview')">
                                        <small class="text-muted">Leave empty to keep current</small>
                                    </div>

                                    <!-- Detail Image -->
                                    <div class="mb-0">
                                        <label class="form-label fw-semibold">Detail Page Banner</label>
                                        <div class="text-center p-3 border rounded bg-white mb-2">
                                            <img id="detailPreview" src="{{ asset('storage/' . $course->detail_image) }}"
                                                class="img-fluid rounded"
                                                style="height: 150px; width: 100%; object-fit: cover;">
                                        </div>
                                        <input type="file" name="detail_image" class="form-control form-control-sm"
                                            accept="image/*" onchange="previewImage(this, 'detailPreview')">
                                        <small class="text-muted">Leave empty to keep current</small>
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
                                            value="{{ old('name', $course->name) }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-semibold">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="form-select" required>
                                            <option value="1"
                                                {{ old('status', $course->status) == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0"
                                                {{ old('status', $course->status) == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Short Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="short_description" class="form-control" rows="2" required>{{ old('short_description', $course->short_description) }}</textarea>
                                    </div>

                                    <!-- Course Detail with Trix Editor -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Course Detail (What you'll learn) <span
                                                class="text-danger">*</span></label>
                                        <input id="course_detail" type="hidden" name="course_detail"
                                            value="{{ old('course_detail', $course->course_detail) }}">
                                        <trix-editor input="course_detail" class="trix-content border rounded"
                                            style="min-height: 200px;"></trix-editor>
                                    </div>


                                    <!-- Course Overview with Trix Editor -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Course Overview <span
                                                class="text-danger">*</span></label>
                                        <input id="course_overview" type="hidden" name="course_overview"
                                            value="{{ old('course_overview', $course->course_overview) }}">
                                        <trix-editor input="course_overview" class="trix-content border rounded"
                                            style="min-height: 200px;"></trix-editor>
                                    </div>

                                    <!-- Career Opportunities with Trix Editor -->
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Career Opportunities <span
                                                class="text-danger">*</span></label>
                                        <input id="career_opportunities" type="hidden" name="career_opportunities"
                                            value="{{ old('career_opportunities', $course->career_opportunities) }}">
                                        <trix-editor input="career_opportunities" class="trix-content border rounded"
                                            style="min-height: 150px;"></trix-editor>
                                    </div>

                                    <!-- Dynamic Downloads Section -->
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <label class="form-label fw-semibold mb-0">Downloads</label>
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                onclick="addDownloadRow()">
                                                <i class="ri-add-line"></i> Add File
                                            </button>
                                        </div>
                                        <div id="downloads-container" class="border rounded p-3 bg-light">
                                            @if ($course->downloads && count($course->downloads) > 0)
                                                @foreach ($course->downloads as $index => $download)
                                                    <div class="d-flex gap-2 mb-2 align-items-center download-row">
                                                        <div class="flex-grow-1">
                                                            <input type="text"
                                                                name="downloads[{{ $index }}][name]"
                                                                class="form-control form-control-sm"
                                                                value="{{ $download['name'] }}" required>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <input type="file"
                                                                name="downloads[{{ $index }}][file]"
                                                                class="form-control form-control-sm"
                                                                accept=".pdf,.doc,.docx">
                                                            <small class="text-success">Current:
                                                                {{ $download['file'] }}</small>
                                                        </div>
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            onclick="this.parentElement.remove()">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-muted small mb-0 text-center" id="no-downloads-msg">No
                                                    downloads added yet.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                            <a href="{{ route('courses.index') }}" class="btn btn-white border">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="ri-save-line me-1"></i> Update Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script>
        let downloadIndex = {{ $course->downloads ? count($course->downloads) : 0 }};

        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(previewId).src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function addDownloadRow() {
            const noMsg = document.getElementById('no-downloads-msg');
            if (noMsg) noMsg.classList.add('d-none');

            const container = document.getElementById('downloads-container');
            const row = document.createElement('div');
            row.className = 'd-flex gap-2 mb-2 align-items-center download-row';
            row.innerHTML = `
            <div class="flex-grow-1">
                <input type="text" name="downloads[${downloadIndex}][name]" class="form-control form-control-sm" placeholder="File Name" required>
            </div>
            <div class="flex-grow-1">
                <input type="file" name="downloads[${downloadIndex}][file]" class="form-control form-control-sm" accept=".pdf,.doc,.docx">
            </div>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="this.parentElement.remove()">
                <i class="ri-delete-bin-line"></i>
            </button>
        `;
            container.appendChild(row);
            downloadIndex++;
        }
    </script>
@endpush

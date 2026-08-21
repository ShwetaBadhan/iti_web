@extends('backend.layouts.master')

@section('content')
<div class="dashboard-main-body">
    <!-- Page Header -->
    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h1 class="fw-semibold mb-4 h6 text-primary-light">SEO Setup</h1>
            <div>
                <a href="{{ route('dashboard') }}" class="text-secondary-light hover-text-primary hover-underline">Dashboard</a>
                <span class="text-secondary-light">/ SEO Setup</span>
            </div>
        </div>
    </div>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({ icon: 'success', title: 'Success!', text: @json(session('success')), timer: 3000, toast: true, position: 'top-end', showConfirmButton: false });
            });
        </script>
    @endif

    <div class="row g-4">
        <!-- Sidebar Navigation -->
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <!-- Global Settings -->
                        <a href="#tab-global" class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request('section') != 'courses' && request('section') != 'pages' ? 'active' : '' }}" data-bs-toggle="list" style="cursor: pointer; border-left: 3px solid {{ request('section') != 'courses' && request('section') != 'pages' ? 'var(--bs-primary)' : 'transparent' }};">
                            <i class="ri-global-line text-primary"></i>
                            <span class="fw-semibold">Global Settings</span>
                        </a>

                        <!-- Static Pages Header -->
                        <div class="list-group-item bg-light fw-semibold text-muted">
                            <i class="ri-file-text-line me-2"></i>Static Pages
                        </div>
                        
                        @php
                            $staticPagesList = [
                                'home' => 'Home Page',
                                'about' => 'About Us',
                                'contact' => 'Contact Us',
                                'results' => 'Results / Verify Certificate',
                                'courses.index' => 'All Courses'
                            ];
                        @endphp

                        @foreach($staticPagesList as $key => $label)
                            <a href="#page-{{ $key }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2 ps-4 {{ request('page') == $key ? 'active' : '' }}" data-bs-toggle="list" style="cursor: pointer; border-left: 3px solid {{ request('page') == $key ? 'var(--bs-primary)' : 'transparent' }};">
                                <span>{{ $label }}</span>
                            </a>
                        @endforeach

                        <!-- Courses Header -->
                        <div class="list-group-item bg-light fw-semibold text-muted mt-2">
                            <i class="ri-book-open-line me-2"></i>Courses
                        </div>

                        @foreach($courses as $course)
                            <a href="#course-{{ $course->id }}" class="list-group-item list-group-item-action d-flex align-items-center gap-2 ps-4 {{ request('course') == $course->id ? 'active' : '' }}" data-bs-toggle="list" style="cursor: pointer; border-left: 3px solid {{ request('course') == $course->id ? 'var(--bs-primary)' : 'transparent' }};">
                                <i class="ri-circle-line text-success" style="font-size: 6px;"></i>
                                <span>{{ Str::limit($course->name, 35) }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="col-lg-9">
            <div class="card h-100">
                <div class="card-body">
                    <div class="tab-content">
                        
                        <!-- Global Settings Tab -->
                        <div class="tab-pane fade {{ request('section') != 'courses' && request('section') != 'pages' ? 'show active' : '' }}" id="tab-global">
                            <h4 class="mb-4 text-primary">Global SEO Settings</h4>
                            <form action="{{ route('global.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold text-sm">Site Title <span class="text-danger">*</span></label>
                                        <input type="text" name="site_title" class="form-control radius-8" value="{{ old('site_title', $globalSetting->site_title) }}" required>
                                        <small class="text-muted">Default title for all pages</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold text-sm">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" class="form-control radius-8" value="{{ old('meta_keywords', $globalSetting->meta_keywords) }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold text-sm">Meta Description</label>
                                        <textarea name="meta_description" class="form-control radius-8" rows="3">{{ old('meta_description', $globalSetting->meta_description) }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold text-sm">OG Image (Social Sharing)</label>
                                        <input type="file" name="og_image" class="form-control radius-8" accept="image/*">
                                        @if($globalSetting->og_image)
                                            <img src="{{ asset('storage/' . $globalSetting->og_image) }}" class="mt-2 rounded border" style="max-height: 80px;">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold text-sm">Google Analytics ID</label>
                                        <input type="text" name="google_analytics" class="form-control radius-8" value="{{ old('google_analytics', $globalSetting->google_analytics) }}" placeholder="G-XXXXXXXXXX">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary-600"><i class="ri-save-line me-1"></i> Save Global Settings</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Static Pages Tabs -->
                        @foreach($staticPagesList as $key => $label)
                            @php $page = $staticPages->get($key) ?? new \App\Models\SeoPage(); @endphp
                            <div class="tab-pane fade" id="page-{{ $key }}">
                                <h4 class="mb-4 text-primary">{{ $label }}</h4>
                                <form action="{{ route('page.update', $key) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-sm">SEO Title</label>
                                        <input type="text" name="meta_title" class="form-control radius-8" value="{{ old('meta_title', $page->meta_title) }}" maxlength="60">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-sm">SEO Description</label>
                                        <textarea name="meta_description" class="form-control radius-8" rows="3" maxlength="160">{{ old('meta_description', $page->meta_description) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-sm">SEO Keywords</label>
                                        <input type="text" name="meta_keywords" class="form-control radius-8" value="{{ old('meta_keywords', $page->meta_keywords) }}">
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" name="noindex" id="noindex-page-{{ $key }}" {{ old('noindex', $page->noindex) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="noindex-page-{{ $key }}">Hide from Google (Noindex)</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary-600"><i class="ri-save-line me-1"></i> Save Page SEO</button>
                                </form>
                            </div>
                        @endforeach

                 <!-- Course Tabs -->
@foreach($courses as $course)
    <div class="tab-pane fade" id="course-{{ $course->id }}">
        <h4 class="mb-4 text-primary">{{ $course->name }} - SEO Settings</h4>
        
        <!-- Removed @method('PUT') so it defaults to POST -->
        <form action="{{ route('course.update', $course->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold text-sm">SEO Title</label>
                <input type="text" name="meta_title" class="form-control radius-8 @error('meta_title') is-invalid @enderror" 
                       value="{{ old('meta_title', $course->meta_title) }}" placeholder="{{ $course->name }} | Your Institute" maxlength="60">
                @error('meta_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <small class="text-muted">Leave empty to auto-generate from course name</small>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-sm">SEO Description</label>
                <textarea name="meta_description" class="form-control radius-8 @error('meta_description') is-invalid @enderror" rows="3" maxlength="160">{{ old('meta_description', $course->meta_description) }}</textarea>
                @error('meta_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <small class="text-muted">Leave empty to auto-generate from course description</small>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-sm">SEO Keywords</label>
                <input type="text" name="meta_keywords" class="form-control radius-8 @error('meta_keywords') is-invalid @enderror" 
                       value="{{ old('meta_keywords', $course->meta_keywords) }}">
                @error('meta_keywords') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" name="noindex" id="noindex-course-{{ $course->id }}" value="1" {{ old('noindex', $course->noindex) ? 'checked' : '' }}>
                <label class="form-check-label" for="noindex-course-{{ $course->id }}">Hide this course from Google</label>
            </div>

            <button type="submit" class="btn btn-primary-600"><i class="ri-save-line me-1"></i> Save Course SEO</button>
        </form>
    </div>
@endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
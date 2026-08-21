<!-- courses-area -->
<section class="courses-area-six grey-bg-two">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section__title text-center mb-50">
                    <span class="sub-title">Learn High-Value Courses</span>
                    <h2 class="title bold">Master High-Income Skills with Expert-Led Courses</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-start" id="courses-form-row">
            <div class="col-xl-5">
                <!-- Course Form Component -->
                @include('components.course-form')
            </div>

            <div class="col-xl-7">
                <div class="courses-scroll-wrapper" id="courses-scroll-wrapper">
                    <div class="row">
                        
                        @if(isset($courses) && $courses->isNotEmpty())
                            @foreach($courses as $course)
                                <div class="col-xl-6 col-lg-4 col-md-6">
                                    <div class="courses__item shine__animate-item">
                                        <div class="courses__item-thumb">
                                            <a href="{{ route('course.details', $course->slug) }}" class="shine__animate-link">
                                                <!-- ✅ Dynamic Home Image -->
                                                <img src="{{ asset('storage/' . $course->home_image) }}" alt="{{ $course->name }}">
                                            </a>
                                        </div>
                                        <div class="courses__item-content">
                                            <!-- ✅ Dynamic Course Name & URL -->
                                            <h5 class="title">
                                                <a href="{{ route('course.details', $course->slug) }}">{{ $course->name }}</a>
                                            </h5>
                                            <div class="courses__item-bottom">
                                                <div class="button">
                                                    <a href="{{ route('course.details', $course->slug) }}">
                                                        <span class="text">Enroll Now</span>
                                                        <i class="flaticon-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center py-4">
                                <p class="text-muted">No courses available at the moment.</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="discover-courses-btn text-center mt-30">
            <!-- ✅ Link to the main courses listing page -->
            {{-- <a href="{{ route('courses') }}" class="btn arrow-btn btn-four">
                Discover All Courses <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable">
            </a> --}}
        </div>
    </div>
</section>
<!-- courses-area-end -->

<style>
    /* Make the wrapper scrollable vertically */
    #courses-scroll-wrapper {
        overflow-y: auto;
    }

    /* Custom scrollbar styling for Chrome, Edge, Safari */
    #courses-scroll-wrapper::-webkit-scrollbar {
        width: 8px;
    }

    #courses-scroll-wrapper::-webkit-scrollbar-track {
        background: #f8fafc;
        border-radius: 10px;
    }

    #courses-scroll-wrapper::-webkit-scrollbar-thumb {
        background-color: #cbd5e1;
        border-radius: 10px;
        border: 2px solid #f8fafc;
    }

    #courses-scroll-wrapper::-webkit-scrollbar-thumb:hover {
        background-color: #94a3b8;
    }

    /* Prevent inner row margins from causing horizontal scrolling */
    #courses-scroll-wrapper .row {
        margin-right: 0;
        margin-left: 0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formWrap = document.getElementById('contact-form-wrap');
        const coursesWrapper = document.getElementById('courses-scroll-wrapper');

        function syncHeights() {
            if (formWrap && coursesWrapper) {
                coursesWrapper.style.maxHeight = 'none';
                const formHeight = formWrap.offsetHeight;
                coursesWrapper.style.maxHeight = formHeight + 'px';
            }
        }

        syncHeights();
        window.addEventListener('resize', syncHeights);
        window.addEventListener('load', syncHeights);

        const observer = new MutationObserver(syncHeights);
        if (formWrap) {
            observer.observe(formWrap, { childList: true, subtree: true, attributes: true });
        }
    });
</script>
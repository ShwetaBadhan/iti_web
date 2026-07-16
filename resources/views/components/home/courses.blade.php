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

        <!-- Added align-items-start to prevent columns from stretching each other -->
        <div class="row justify-content-center align-items-start" id="courses-form-row">
            <div class="col-xl-5">
                <!-- FIX 1: Added id="contact-form-wrap" here so JS can find it -->
                @include('components.course-form')
            </div>

            <div class="col-xl-7">
                <!-- FIX 2: Moved the <div class="row"> INSIDE the scroll wrapper -->
                <div class="courses-scroll-wrapper" id="courses-scroll-wrapper">
                    <div class="row">
                        <div class="col-xl-6 col-lg-4 col-md-6">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="{{ route('truck-dispatch-details') }}#truck-dispatch" class="shine__animate-link">
                                        <img src="assets/img/courses/truck-dispatcher.png" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <h5 class="title"><a href="{{ route('truck-dispatch-details') }}">Truck Dispatcher</a></h5>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="{{ route('truck-dispatch-details') }}">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-6">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="{{ route('fire-safety-details') }}" class="shine__animate-link">
                                        <img src="assets/img/courses/fire-safety.png" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <h5 class="title"><a href="{{ route('fire-safety-details') }}">Fire & Safety</a></h5>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="{{ route('fire-safety-details') }}">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-6">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="{{ route('trailer-training-details') }}" class="shine__animate-link">
                                        <img src="assets/img/courses/trailer.png" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <h5 class="title"><a href="{{ route('trailer-training-details') }}">Trailer Training</a></h5>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="{{ route('trailer-training-details') }}">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-4 col-md-6">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="{{ route('forklift-training-details') }}" class="shine__animate-link">
                                        <img src="assets/img/courses/fork-lift.png" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <h5 class="title"><a href="{{ route('forklift-training-details') }}">Forklift Training</a>
                                    </h5>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="{{ route('forklift-training-details') }}">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-6">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="{{ route('jcb-training-details') }}" class="shine__animate-link">
                                        <img src="assets/img/courses/jdc.png" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <h5 class="title"><a href="{{ route('jcb-training-details') }}">JCB Training</a></h5>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="{{ route('jcb-training-details') }}">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-6">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="{{ route('excavator-training-details') }}" class="shine__animate-link">
                                        <img src="assets/img/courses/excavator.png" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <h5 class="title"><a href="{{ route('excavator-training-details') }}">Excavator Training</a>
                                    </h5>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="{{ route('excavator-training-details') }}">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-6">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="{{ route('motor-mechanic-details') }}" class="shine__animate-link">
                                        <img src="assets/img/courses/motor-mechanic.png" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <h5 class="title"><a href="{{ route('motor-mechanic-details') }}">Motor Mechanic</a>
                                    </h5>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="{{ route('motor-mechanic-details') }}">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-6">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="{{ route('video-editing-details') }}" class="shine__animate-link">
                                        <img src="assets/img/courses/video-editing.png" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <h5 class="title"><a href="{{ route('video-editing-details') }}">Video Editing</a></h5>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="{{ route('video-editing-details') }}">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-6">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    <a href="{{ route('car-driving-details') }}" class="shine__animate-link">
                                        <img src="assets/img/courses/car-driving.png" alt="img">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    <h5 class="title"><a href="{{ route('car-driving-details') }}">Car Driving</a></h5>
                                    <div class="courses__item-bottom">
                                        <div class="button">
                                            <a href="{{ route('car-driving-details') }}">
                                                <span class="text">Enroll Now</span>
                                                <i class="flaticon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="discover-courses-btn text-center mt-30">
            <a href="{{ route('courses') }}" class="btn arrow-btn btn-four">Discover All Class <img
                    src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
        </div>
    </div>
</section>
<!-- courses-area-end -->

<style>
    /* Make the wrapper scrollable vertically */
    #courses-scroll-wrapper {
        overflow-y: auto;
        /* Custom scrollbar styling for Firefox */
        {{-- scrollbar-width: thin; --}} {{-- scrollbar-color: #cbd5e1 #f8fafc; --}}
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
                // Temporarily reset max-height to measure the form's true natural height
                coursesWrapper.style.maxHeight = 'none';
                const formHeight = formWrap.offsetHeight;

                // Apply the form's height as the max-height for the courses
                coursesWrapper.style.maxHeight = formHeight + 'px';
            }
        }

        // 1. Initial sync on page load
        syncHeights();

        // 2. Re-sync if the user resizes the browser window
        window.addEventListener('resize', syncHeights);

        // 3. Re-sync when all images are fully loaded (images change the height of courses)
        window.addEventListener('load', syncHeights);

        // 4. Observe the form for dynamic changes (e.g., if Laravel validation errors appear)
        const observer = new MutationObserver(syncHeights);
        if (formWrap) {
            observer.observe(formWrap, {
                childList: true,
                subtree: true,
                attributes: true
            });
        }
    });
</script>

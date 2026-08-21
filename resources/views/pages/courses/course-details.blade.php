@extends('layouts.master')
@section('title', $course->name)
@section('content')

    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <div class="breadcrumb__area breadcrumb__bg breadcrumb__bg-two" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            {{-- ✅ Dynamic Breadcrumb Title --}}
                            <h3 class="title">{{ $course->name }}</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="">Courses</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">{{ $course->name }}</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__shape-wrap">
                <img src="assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
                <img src="assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
                <img src="assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
                <img src="assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left" data-aos-delay="400">
                <img src="assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- courses-details-area -->
        <section class="courses__details-area section-py-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="courses__details-thumb">
                            {{-- ✅ Dynamic Detail Image --}}
                            <img src="{{ asset('storage/' . $course->detail_image) }}" alt="{{ $course->name }}">
                        </div>
                        <div class="courses__details-content">

                            {{-- ✅ Dynamic Main Title --}}
                            <h2 class="title">{{ $course->name }}</h2>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">Course Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="curriculum-tab" data-bs-toggle="tab" data-bs-target="#curriculum-tab-pane" type="button" role="tab" aria-controls="curriculum-tab-pane" aria-selected="false">Course Overview</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="instructors-tab" data-bs-toggle="tab" data-bs-target="#instructors-tab-pane" type="button" role="tab" aria-controls="instructors-tab-pane" aria-selected="false">Downloads</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Career Opportunities</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                
                                <!-- Tab 1: Course Detail -->
                                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                                    <div class="courses__overview-wrap">
                                        {{-- ✅ Dynamic Content from Database --}}
                                        {!! $course->course_detail !!}
                                    </div>
                                </div>

                                <!-- Tab 2: Course Overview -->
                                <div class="tab-pane fade" id="curriculum-tab-pane" role="tabpanel" aria-labelledby="curriculum-tab" tabindex="0">
                                    <div class="courses__curriculum-wrap">
                                        {{-- ✅ Dynamic Content from Database --}}
                                        {!! $course->course_overview !!}
                                    </div>
                                </div>

                                <!-- Tab 3: Downloads -->
                                <div class="tab-pane fade" id="instructors-tab-pane" role="tabpanel" aria-labelledby="instructors-tab" tabindex="0">
                                    <div class="courses__curriculum-wrap">
                                        <h3 class="title">Download Brochures & Resources</h3>
                                        
                                        @if($course->downloads && count($course->downloads) > 0)
                                            <ul class="about__info-list list-wrap">
                                                @foreach($course->downloads as $download)
                                                    <li class="about__info-list-item mb-2">
                                                        <i class="flaticon-angle-right"></i>
                                                        <a href="{{ asset('storage/' . $download['file']) }}" class="btn btn-two arrow-btn" download>
                                                            {{ $download['name'] }} <img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable">
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-muted">No downloads available for this course yet.</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Tab 4: Career Opportunities -->
                                <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                                    <div class="courses__rating-wrap">
                                        <h2 class="title">Career Opportunities</h2>
                                        {{-- ✅ Dynamic Content from Database --}}
                                        {!! $course->career_opportunities !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-lg-4">
                        <div class="courses__details-sidebar">
                            @include('components.course-form')
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- courses-details-area-end -->

    </main>
    <!-- main-area-end -->

@endsection
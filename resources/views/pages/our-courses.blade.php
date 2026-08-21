@extends('layouts.master')
@section('title', 'Our Courses')
@section('content')

    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">All Courses</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ route('home') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Courses</span>
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
    </section>
    <!-- breadcrumb-area-end -->

    <!-- courses-area -->
    <section class="courses-area-six grey-bg-two">
        <div class="container">
            <div class="row justify-content-center">
                
                @if(isset($courses) && $courses->isNotEmpty())
                    @foreach($courses as $course)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="courses__item shine__animate-item">
                                <div class="courses__item-thumb">
                                    {{-- ✅ Dynamic Image & Link --}}
                                    <a href="{{ route('course.details', $course->slug) }}" class="shine__animate-link">
                                        <img src="{{ asset('storage/' . $course->home_image) }}" alt="{{ $course->name }}">
                                    </a>
                                </div>
                                <div class="courses__item-content">
                                    {{-- ✅ Dynamic Title & Link --}}
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
                    {{-- Fallback if no courses are active in the database --}}
                    <div class="col-12 text-center py-5">
                        <h4 class="text-muted">No courses available at the moment.</h4>
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!-- courses-area-end -->

@endsection
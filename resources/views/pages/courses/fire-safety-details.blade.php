@extends('layouts.master')
@section('title', 'Fire & Safety Details')
@section('content')


    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <div class="breadcrumb__area breadcrumb__bg breadcrumb__bg-two" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href= "{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">
                                    <a href= "{{ route('home') }}">Courses</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Fire & Safety</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__shape-wrap">
                <img src="assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
                <img src="assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right"
                    data-aos-delay="300">
                <img src="assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
                <img src="assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left"
                    data-aos-delay="400">
                <img src="assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left"
                    data-aos-delay="400">
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- courses-details-area -->
        <section class="courses__details-area section-py-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="courses__details-thumb">
                            <img src="assets/img/courses/fire-safety-course.png" alt="img">
                        </div>
                        <div class="courses__details-content">

                            <h2 class="title">Fire & Safety</h2>
                           
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                        data-bs-target="#overview-tab-pane" type="button" role="tab"
                                        aria-controls="overview-tab-pane" aria-selected="true">Course Detail</button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="curriculum-tab" data-bs-toggle="tab" data-bs-target="#curriculum-tab-pane" type="button" role="tab" aria-controls="curriculum-tab-pane" aria-selected="false">Eligibility Criteria</button>
                                </li> --}}
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="instructors-tab" data-bs-toggle="tab"
                                        data-bs-target="#instructors-tab-pane" type="button" role="tab"
                                        aria-controls="instructors-tab-pane" aria-selected="false">Downloads</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                        data-bs-target="#reviews-tab-pane" type="button" role="tab"
                                        aria-controls="reviews-tab-pane" aria-selected="false">Career Opportunities</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel"
                                    aria-labelledby="overview-tab" tabindex="0">
                                    <div class="courses__overview-wrap">
                                        <h3 class="title">Build a Safe & Rewarding Career in Fire and Industrial Safety</h3>
                                        <p align="justify">The Fire & Safety Course is designed to prepare students for rewarding careers in industrial safety, fire prevention, emergency response, and occupational health. With increasing safety regulations across industries, trained Fire & Safety professionals are in high demand in India and abroad.</p>
                                        <p align="justify">At <strong>Dr. B. R. Ambedkar ITI, Jalandhar</strong>,students receive 100% practical training through live demonstrations, mock drills, industrial safety practices, and hands-on equipment handling. Our experienced trainers ensure every student gains the practical knowledge and confidence required to work in real industrial environments.</p>
                                        <h3 class="title">Government Approved Certification</h3>
                                        <p align="justify">Upon successful completion of the training, students will receive a
                                            <strong>Government Approved Certificate</strong> from <strong>Dr. B. R. Ambedkar
                                                ITI, Jalandhar</strong>, enhancing their credibility and improving their
                                            employment opportunities in the logistics sector.
                                        </p>
<h3 class="title">Course Duration</h3>
<ul class="about__info-list list-wrap">
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">1 Month</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">3 Months</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">6 Months</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">1 Year</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">2 Years</p>
                                            </li>
                                            </ul>
                                        <h3 class="title">What you'll learn in this course?</h3>
                                        <p align="justify">After completing the course, students can work with logistics companies, dispatch
                                            firms, or start working remotely with international clients.</p>

                                        <ul class="about__info-list list-wrap">
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Fire Prevention & Fire Fighting</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Fire Extinguisher Operation & Maintenance</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Hydrant & Sprinkler System Training</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Mock Drills & Emergency Response</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Industrial Safety Management</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Hazard Identification & Risk Assessment</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">First Aid & Rescue Techniques</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Disaster Management</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Safety Rules for Industries & Construction Sites</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">PPE (Personal Protective Equipment) Usage</p>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade" id="curriculum-tab-pane" role="tabpanel" aria-labelledby="curriculum-tab" tabindex="0">
                                    <div class="courses__curriculum-wrap">
                                        <h3 class="title">Eligibility Criteria</h3>
                                       <ul class="about__info-list list-wrap">
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">12th Pass Students</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">ITI Students</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Graduates</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Job Seekers</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Freshers</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Working Professionals looking for a career switch</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div> --}}
                                <div class="tab-pane fade" id="instructors-tab-pane" role="tabpanel"
                                    aria-labelledby="instructors-tab" tabindex="0">
                                    <div class="courses__curriculum-wrap">
                                        <h3 class="title">Download Brochures</h3>
                                        <ul class="about__info-list list-wrap">
                                            <a href="" class="btn btn-two arrow-btn">Download <img
                                                    src="assets/img/icons/right_arrow.svg" alt="img"
                                                    class="injectable"></a>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel"
                                    aria-labelledby="reviews-tab" tabindex="0">
                                    <div class="courses__rating-wrap">
                                        <h2 class="title">Career Opportunities</h2>
                                        <ul class="about__info-list list-wrap">
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Safety Officer in Industries</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Safety Executive in Corporate Industries</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Hotel Safety Supervisor</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Construction Safety Supervisor</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Fire & Safety Supervisor in Malls, Hospitals & Schools</p>
                                                
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Fire Department Opportunities</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Oil & Gas Sector Safety Jobs</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Manufacturing Industry Safety Jobs</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Power Plant & Chemical Plant Safety Jobs</p>
                                                
                                            </li>
                                        </ul>
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

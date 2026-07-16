@extends('layouts.master')
@section('title', 'Trailer Training Details')
@section('content')


    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <div class="breadcrumb__area breadcrumb__bg breadcrumb__bg-two" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h2 class="title">Trailer Training</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href= "{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">
                                    <a href= "{{ route('home') }}">Courses</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Trailer Training</span>
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
                            <img src="assets/img/courses/trailer-training-course.png" alt="img">
                        </div>
                        <div class="courses__details-content">

                            <h2 class="title">HTV Trailer Training</h2>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                        data-bs-target="#overview-tab-pane" type="button" role="tab"
                                        aria-controls="overview-tab-pane" aria-selected="true">Course Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="curriculum-tab" data-bs-toggle="tab"
                                        data-bs-target="#curriculum-tab-pane" type="button" role="tab"
                                        aria-controls="curriculum-tab-pane" aria-selected="false">Course Overview</button>
                                </li>
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

                                        <h3 class="title">Course Duration</h3>
                                        <ul class="about__info-list list-wrap">
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">21 Days</p>
                                            </li>

                                        </ul>
                                        <h3 class="title">What you'll learn in this course?</h3>
                                        <p align="justify">After completing the course, students can work with logistics
                                            companies, dispatch
                                            firms, or start working remotely with international clients.</p>

                                        <ul class="about__info-list list-wrap">
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Introduction to Heavy Commercial Vehicles </p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Trailer Controls & Vehicle Inspection</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Defensive Driving Techniques</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Highway & City Driving</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Reverse Parking & Trailer Maneuvering</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Coupling & Uncoupling Procedures</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Safe Loading & Weight Distribution</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Road Signs & Traffic Rules</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Fuel-Efficient Driving Techniques</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Emergency Handling & Accident Prevention</p>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="curriculum-tab-pane" role="tabpanel"
                                    aria-labelledby="curriculum-tab" tabindex="0">
                                    <div class="courses__curriculum-wrap">
                                        <h3 class="title">Drive Your Future with Professional Trailer Driving Skills</h3>
                                        <p align="justify">The Trailer Driving Training Course at Dr. B. R. Ambedkar ITI,
                                            Jalandhar is designed to develop skilled and confident heavy trailer drivers for
                                            the transportation and logistics industry. Through practical, hands-on training,
                                            students learn to safely operate heavy commercial trailers while understanding
                                            road safety regulations, vehicle maintenance, and professional driving
                                            techniques.</p>
                                        <p align="justify">Our expert instructors provide real-world training using
                                            industry-standard methods to prepare students for careers in logistics,
                                            transportation companies, fleet operations, and government sectors.</p>
                                        <h3 class="title">Government Approved Certification</h3>
                                        <p align="justify">Upon successful completion of the training, students will
                                            receive
                                            a
                                            <strong>Government Approved Certificate</strong> from <strong>Dr. B. R. Ambedkar
                                                ITI, Jalandhar</strong>, adding value to their qualifications and enhancing
                                            employment opportunities across India.
                                        </p>
                                    </div>
                                </div>
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
                                                <p class="content">Heavy Trailer Driver</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Commercial Truck Driver</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Logistics Driver</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Fleet Driver</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Transport Company Driver</p>

                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Industrial Vehicle Operator</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Government Transport Driver</p>
                                            </li>
                                            <li class="about__info-list-item">
                                                <i class="flaticon-angle-right"></i>
                                                <p class="content">Long-Haul Trailer Driver</p>
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

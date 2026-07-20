@extends('layouts.master')
@section('title', 'Chairman Message')
@section('content')

    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Chairman Message</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ route('home') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Chairman Message</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape-wrap">
            <img src="assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
            <img src="assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
            <img src="assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
            <img src="assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left"
                data-aos-delay="400">
            <img src="assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- about-area -->
    <section class="about-area-three section-py-120">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-9">
                    <div class="">
                        <img src="{{ url('assets/img/management/dhillon-sir.png') }}" alt="img">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content-three">
                        <div class="section__title mb-10">
                            <span class="sub-title">Chairman's Message</span>
                            <h6>
                                Dear Students, Parents & Well-Wishers,
                            </h6>
                        </div>
                        <p class="desc" align="justify">For over 30 years, my mission has remained the same: to empower
                            the youth of Punjab through skill-based education and meaningful employment opportunities.
                            Nothing gives me greater satisfaction than seeing our students build successful careers and
                            create a better future for themselves and their families.</p>
                        <p class="desc" align="justify">Over the years, thousands of students have completed trade
                            training with us and are now well-settled, both in India and abroad. Their success inspires us
                            to continue serving society with the same dedication.</p>
                        <p class="desc" align="justify">I truly love Punjab and firmly believe that the progress of our
                            state depends on the strength and skills of its youth. By providing high-value, industry-focused
                            courses, we aim to prepare young people for rewarding careers while contributing to the growth
                            and prosperity of Punjab’s economy.</p>
                        <p class="desc" align="justify">Together, let us build a skilled, self-reliant, and stronger
                            Punjab.</p>
                        <h6>Best Wishes,</h6>
                        <h6>Kuldeep Singh Dhillon</h6>
                        <h6>Chairman</h6>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->


@endsection

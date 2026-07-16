@extends('layouts.master')
@section('title', 'Director Message')
@section('content')

    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Director Message</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ route('home') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Director Message</span>
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
                <div class="col-lg-6 col-md-6">
                    <div class="">
                        <img src="{{ url('assets/img/management/director-img.png') }}" alt="img">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content-three">
                        <div class="section__title mb-10">
                            <span class="sub-title">Director's Message</span>
                            <h6>
                                Dear Students, Parents & Well-Wishers,
                            </h6>
                        </div>

                        <p class="desc" align="justify">I believe the real strength of Punjab lies in its youth. My vision
                            is to make our young generation skilled, confident, and career-ready so they can secure valuable
                            jobs, earn better incomes, and build a brighter future.
                        </p>
                        <p class="desc" align="justify">While pursuing my Master’s in New Zealand, I observed that skilled
                            professionals were always in demand. They found employment more easily, earned higher salaries,
                            and even during challenging times like the COVID-19 pandemic, they faced far less uncertainty
                            because their skills remained valuable.
                        </p>
                        <p class="desc" align="justify">Inspired by this, we introduced high-demand, industry-focused
                            programs such as Truck Dispatch, Fire & Safety, Motor Mechanic, and practical operator training
                            for Trailer, Forklift, JCB, and Excavator. These are skills that industries across India and
                            abroad are actively looking for.
                        </p>
                        <p class="desc" align="justify">Our mission is not just to provide training, but to create
                            professionals who are respected in their workplaces, valued by employers, and capable of
                            building successful careers anywhere in the world.</p>
                        <p class="desc" align="justify">Together, let us build a more skilled Punjab and a brighter future
                            for our youth.</p>
                        <h6>Best Wishes,</h6>
                        <h6>Manav Goswami</h6>
                        <h6>Managing Director</h6>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->


@endsection

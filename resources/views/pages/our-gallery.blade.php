@extends('layouts.master')
@section('title', 'Our Gallery')
@section('content')

  <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title">Photo Gallery</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href= "{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Gallery</span>
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

        <!-- event-area -->
        <section class="event__area-two section-py-120">
            <div class="container">
                <div class="event__inner-wrap">
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="event__item shine__animate-item">
                                <div class="event__item-thumb">
                                    <a href="javascript:void(0)" class="shine__animate-link"><img src="assets/img/gallery/img.png" alt="img"></a>
                                </div>
                             
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="event__item shine__animate-item">
                                 <div class="event__item-thumb">
                                    <a href="javascript:void(0)" class="shine__animate-link"><img src="assets/img/gallery/img.png" alt="img"></a>
                                </div>
                              
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="event__item shine__animate-item">
                                <div class="event__item-thumb">
                                    <a href="javascript:void(0)" class="shine__animate-link"><img src="assets/img/gallery/img.png" alt="img"></a>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="event__item shine__animate-item">
                                <div class="event__item-thumb">
                                    <a href="javascript:void(0)" class="shine__animate-link"><img src="assets/img/gallery/img.png" alt="img"></a>
                                </div>
                               
                            </div>
                        </div>
                       </div>
                </div>
            </div>
        </section>
        <!-- event-area-end -->

    </main>
    <!-- main-area-end -->


@endsection
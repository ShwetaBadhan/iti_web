@extends('layouts.master')
@section('title','Our Courses')
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
              <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="courses__item shine__animate-item">
                      <div class="courses__item-thumb">
                          <a href="course-details.html" class="shine__animate-link">
                              <img src="assets/img/courses/truck-dispatcher.png" alt="img">
                          </a>
                      </div>
                      <div class="courses__item-content">

                          <h5 class="title"><a href="course-details.html">Truck Dispatcher</a></h5>

                          <div class="courses__item-bottom">
                              <div class="button">
                                  <a href="course-details.html">
                                      <span class="text">Enroll Now</span>
                                      <i class="flaticon-arrow-right"></i>
                                  </a>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="courses__item shine__animate-item">
                      <div class="courses__item-thumb">
                          <a href="course-details.html" class="shine__animate-link">
                              <img src="assets/img/courses/fire-safety.png" alt="img">
                          </a>
                      </div>
                      <div class="courses__item-content">

                          <h5 class="title"><a href="course-details.html">Fire & Safety</a></h5>

                          <div class="courses__item-bottom">
                              <div class="button">
                                  <a href="course-details.html">
                                      <span class="text">Enroll Now</span>
                                      <i class="flaticon-arrow-right"></i>
                                  </a>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="courses__item shine__animate-item">
                      <div class="courses__item-thumb">
                          <a href="course-details.html" class="shine__animate-link">
                              <img src="assets/img/courses/motor-mechanic.png" alt="img">
                          </a>
                      </div>
                      <div class="courses__item-content">

                          <h5 class="title"><a href="course-details.html">Motor Mechanic</a></h5>

                          <div class="courses__item-bottom">
                              <div class="button">
                                  <a href="course-details.html">
                                      <span class="text">Enroll Now</span>
                                      <i class="flaticon-arrow-right"></i>
                                  </a>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="courses__item shine__animate-item">
                      <div class="courses__item-thumb">
                          <a href="course-details.html" class="shine__animate-link">
                              <img src="assets/img/courses/video-editing.png" alt="img">
                          </a>
                      </div>
                      <div class="courses__item-content">

                          <h5 class="title"><a href="course-details.html">Video Editing</a></h5>

                          <div class="courses__item-bottom">
                              <div class="button">
                                  <a href="course-details.html">
                                      <span class="text">Enroll Now</span>
                                      <i class="flaticon-arrow-right"></i>
                                  </a>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="courses__item shine__animate-item">
                      <div class="courses__item-thumb">
                          <a href="course-details.html" class="shine__animate-link">
                              <img src="assets/img/courses/fork-lift.png" alt="img">
                          </a>
                      </div>
                      <div class="courses__item-content">

                          <h5 class="title"><a href="course-details.html">Forklift Training</a></h5>

                          <div class="courses__item-bottom">
                              <div class="button">
                                  <a href="course-details.html">
                                      <span class="text">Enroll Now</span>
                                      <i class="flaticon-arrow-right"></i>
                                  </a>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="courses__item shine__animate-item">
                      <div class="courses__item-thumb">
                          <a href="course-details.html" class="shine__animate-link">
                              <img src="assets/img/courses/jdc.png" alt="img">
                          </a>
                      </div>
                      <div class="courses__item-content">

                          <h5 class="title"><a href="course-details.html">JCB Training</a></h5>

                          <div class="courses__item-bottom">
                              <div class="button">
                                  <a href="course-details.html">
                                      <span class="text">Enroll Now</span>
                                      <i class="flaticon-arrow-right"></i>
                                  </a>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="courses__item shine__animate-item">
                      <div class="courses__item-thumb">
                          <a href="course-details.html" class="shine__animate-link">
                              <img src="assets/img/courses/excavator.png" alt="img">
                          </a>
                      </div>
                      <div class="courses__item-content">

                          <h5 class="title"><a href="course-details.html">Excavator Training</a></h5>

                          <div class="courses__item-bottom">
                              <div class="button">
                                  <a href="course-details.html">
                                      <span class="text">Enroll Now</span>
                                      <i class="flaticon-arrow-right"></i>
                                  </a>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="courses__item shine__animate-item">
                      <div class="courses__item-thumb">
                          <a href="course-details.html" class="shine__animate-link">
                              <img src="assets/img/courses/trailer.png" alt="img">
                          </a>
                      </div>
                      <div class="courses__item-content">

                          <h5 class="title"><a href="course-details.html">Trailer Training</a></h5>

                          <div class="courses__item-bottom">
                              <div class="button">
                                  <a href="course-details.html">
                                      <span class="text">Enroll Now</span>
                                      <i class="flaticon-arrow-right"></i>
                                  </a>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>



            
          </div>
  </section>
  <!-- courses-area-end --

@endsection
@extends('layouts.master')
@section('title','Blog Details')
@section('content')



    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title">Blog Details</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="{{ route('our-blogs') }}">Blogs</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Learn from Anywhere with Our eLearning Platform</span>
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

        <!-- blog-details-area -->
        <section class="blog-details-area section-py-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="blog__details-wrapper">
                            <div class="blog__details-thumb">
                                <img src="assets/img/courses/forklift-training-course.png" alt="img">
                            </div>
                            <div class="blog__details-content">
                                <div class="blog__post-meta">
                                    <ul class="list-wrap">
                                        <li><i class="flaticon-calendar"></i> 20 July, 2024</li>
                                        <li><i class="flaticon-user-1"></i> by <a href="#">Admin</a></li>
                                        <li><i class="flaticon-clock"></i> 5 Min Read</li>
                                        <li><i class="far fa-comment-alt"></i> 05 Comments</li>
                                    </ul>
                                </div>
                                <h3 class="title">Learn from Anywhere with Our eLearning Platform</h3>
                                <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis semper bibendum. Ut ac nisi porta, malesuada risus nonrra dolo areay Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae in tristique libero, quis ultrices diamraesent varius diam dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra.Maximus ligula eleifend.</p>
                                <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis semper bibendum. Ut ac nisi porta, malesuada risus nonrra dolo areay Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae in tristique libero, quis ultrices diamraesent varius diam dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra.Maximus ligula eleifend.</p>
                                
                                <p>Maximus ligula eleifend id nisl quis interdum. Sed malesuada tortor non turpis semper bibendum. Ut ac nisi porta, malesuada risus nonrra dolo areay Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.</p>
                               
                            </div>
                        </div>
                      
                       
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <aside class="blog-sidebar">
                            
                           
                            <div class="blog-widget">
                                <h4 class="widget-title">Latest Post</h4>
                                <div class="rc-post-item">
                                    <div class="rc-post-thumb">
                                        <a href="{{ route('blog-details') }}">
                                            <img src="assets/img/courses/forklift-training-course.png" alt="img">
                                        </a>
                                    </div>
                                    <div class="rc-post-content">
                                        <span class="date"><i class="flaticon-calendar"></i> April 13, 2024</span>
                                        <h4 class="title"><a href="{{ route('blog-details') }}">the Right Learning Path for your</a></h4>
                                    </div>
                                </div>
                                <div class="rc-post-item">
                                    <div class="rc-post-thumb">
                                        <a href="{{ route('blog-details') }}">
                                            <img src="assets/img/courses/forklift-training-course.png" alt="img">
                                        </a>
                                    </div>
                                    <div class="rc-post-content">
                                        <span class="date"><i class="flaticon-calendar"></i> April 13, 2024</span>
                                        <h4 class="title"><a href="{{ route('blog-details') }}">The Growing Need Management</a></h4>
                                    </div>
                                </div>
                                <div class="rc-post-item">
                                    <div class="rc-post-thumb">
                                        <a href="{{ route('blog-details') }}">
                                            <img src="assets/img/courses/forklift-training-course.png" alt="img">
                                        </a>
                                    </div>
                                    <div class="rc-post-content">
                                        <span class="date"><i class="flaticon-calendar"></i> April 13, 2024</span>
                                        <h4 class="title"><a href="{{ route('blog-details') }}">the Right Learning Path for your</a></h4>
                                    </div>
                                </div>
                                <div class="rc-post-item">
                                    <div class="rc-post-thumb">
                                        <a href="{{ route('blog-details') }}">
                                            <img src="assets/img/courses/forklift-training-course.png" alt="img">
                                        </a>
                                    </div>
                                    <div class="rc-post-content">
                                        <span class="date"><i class="flaticon-calendar"></i> April 13, 2024</span>
                                        <h4 class="title"><a href="{{ route('blog-details') }}">The Growing Need Management</a></h4>
                                    </div>
                                </div>
                            </div>
                            
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->

    </main>
    <!-- main-area-end -->

@endsection
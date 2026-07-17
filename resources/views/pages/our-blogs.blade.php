@extends('layouts.master')
@section('title','Our Blogs')
@section('content')


   <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title">Our Blogs</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Blogs</span>
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

        <!-- blog-area -->
        <section class="blog-area section-py-120">
            <div class="container">
                <div class="row gutter-20">
                     <div class="col-lg-4 col-md-6">
                        <div class="blog__post-item-six shine__animate-item">
                            <div class="blog__post-thumb-six">
                                <a href="{{ route('blog-details') }}" class="shine__animate-link"><img src="assets/img/blog/blog_post01.jpg" alt="img"></a>
                                {{-- <a href="blog.html" class="post-tag-four">Cooking</a> --}}
                            </div>
                            <div class="blog__post-content-six">
                                <div class="blog__post-meta">
                                    <ul class="list-wrap">
                                        <li><i class="flaticon-calendar"></i>20 July, 2024</li>
                                        <li><i class="flaticon-user-1"></i>by <a href="{{ route('blog-details') }}">Admin</a></li>
                                    </ul>
                                </div>
                                <h2 class="title"><a href="{{ route('blog-details') }}">Learn from Anywhere with Our eLearning Platform</a></h2>
                                <a href="{{ route('blog-details') }}" class="btn arrow-btn">Read More <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
              
            </div>
        </section>
        <!-- blog-area-end -->

    </main>
    <!-- main-area-end -->

@endsection
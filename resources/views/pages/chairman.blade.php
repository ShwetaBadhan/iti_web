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
            <img src="assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left" data-aos-delay="400">
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
                        {{-- ✅ Dynamic Image with Fallback --}}
                        @if($message && $message->image)
                            <img src="{{ asset('storage/' . $message->image) }}" alt="{{ $message->name ?? 'Chairman' }}" class="img-fluid rounded">
                        @else
                            <img src="{{ asset('assets/img/management/dhillon-sir.png') }}" alt="Chairman" class="img-fluid rounded">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content-three">
                        @if($message)
                            <div class="section__title mb-10">
                                <span class="sub-title">Chairman's Message</span>
                            </div>
                            
                            {{-- ✅ Dynamic Message Content --}}
                            {{-- white-space: pre-wrap preserves the line breaks from the textarea --}}
                            <div class="desc" align="justify" style="white-space: pre-wrap;">
                                {!! $message->message !!}
                            </div>

                            {{-- ✅ Dynamic Sign-off --}}
                            @if($message->name)
                                <h6 class="mt-4 mb-1">Best Wishes,</h6>
                                <h6 class="mb-1">{{ $message->name }}</h6>
                                @if($message->designation)
                                    <h6 class="mb-0">{{ $message->designation }}</h6>
                                @endif
                            @endif
                        @else
                            {{-- Fallback content if database is empty --}}
                            <div class="section__title mb-10">
                                <span class="sub-title">Chairman's Message</span>
                                <h6>Dear Students, Parents & Well-Wishers,</h6>
                            </div>
                            <p class="desc" align="justify">For over 30 years, my mission has remained the same: to empower the youth of Punjab through skill-based education and meaningful employment opportunities.</p>
                            <h6 class="mt-4 mb-1">Best Wishes,</h6>
                            <h6 class="mb-0">Kuldeep Singh Dhillon</h6>
                            <h6 class="mb-0">Chairman</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->

@endsection
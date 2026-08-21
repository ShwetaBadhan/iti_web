<!-- testimonial-area -->
<section class="testimonial__area-two section-py-120 testimonial__bg" data-background="assets/img/bg/testimonials_bg.html">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section__title text-center mb-50">
                    <span class="sub-title">Our Testimonials</span>
                    <h2 class="title">What Students Think and Say About SkillGrow</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial__item-wrap">
                    <div class="swiper-container testimonial-swiper-active-two">
                        <div class="swiper-wrapper">
                            
                            @if(isset($testimonials) && $testimonials->isNotEmpty())
                                @foreach($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="testimonial__item-two">
                                            <div class="testimonial__content-two">
                                                <!-- ✅ Dynamic Title/Message -->
                                                <h2 class="title">{{ $testimonial->title ?? 'Great Experience!' }}</h2>
                                                
                                                <!-- ✅ Dynamic Star Rating -->
                                                <div class="rating">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $testimonial->rating)
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                
                                                <!-- ✅ Dynamic Testimonial Message -->
                                                <p>"{{ Str::limit($testimonial->message, 150) }}"</p>
                                            </div>
                                            <div class="testimonial__author testimonial__author-two">
                                                <div class="testimonial__author-thumb testimonial__author-thumb-two">
                                                    <!-- ✅ Dynamic Author Image -->
                                                    <img src="{{ $testimonial->image ? asset('storage/' . $testimonial->image) : asset('assets/img/others/testi_author01.png') }}" alt="{{ $testimonial->name }}">
                                                </div>
                                                <div class="testimonial__author-content testimonial__author-content-two">
                                                    <!-- ✅ Dynamic Author Name -->
                                                    <h2 class="title">{{ $testimonial->name }}</h2>
                                                    <!-- ✅ Dynamic Designation -->
                                                    <span>{{ $testimonial->designation ?? 'Student' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <!-- Fallback testimonials if database is empty -->
                                <div class="swiper-slide">
                                    <div class="testimonial__item-two">
                                        <div class="testimonial__content-two">
                                            <h2 class="title">Great Quality!</h2>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <p>"Excellent training and supportive staff. Highly recommended!"</p>
                                        </div>
                                        <div class="testimonial__author testimonial__author-two">
                                            <div class="testimonial__author-thumb testimonial__author-thumb-two">
                                                <img src="assets/img/others/testi_author01.png" alt="img">
                                            </div>
                                            <div class="testimonial__author-content testimonial__author-content-two">
                                                <h2 class="title">John Doe</h2>
                                                <span>Student</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-area-end -->
<!-- slider-area -->
<section class="slider__area">
    @php
        $sliders = \App\Models\Slider::where('status', true)->orderBy('order')->get();
    @endphp

    @if($sliders->isNotEmpty())
        <div class="swiper-container slider__active">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide slider__single">
                        <div class="slider__bg" data-background="{{ asset('storage/' . $slider->image) }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <!-- Fallback: Default images agar database mein sliders nahi hain -->
        <div class="swiper-container slider__active">
            <div class="swiper-wrapper">
                <div class="swiper-slide slider__single">
                    <div class="slider__bg" data-background="assets/img/banner/4.png"></div>
                </div>
                <div class="swiper-slide slider__single">
                    <div class="slider__bg" data-background="assets/img/banner/5.png"></div>
                </div>
                <div class="swiper-slide slider__single">
                    <div class="slider__bg" data-background="assets/img/banner/6.png"></div>
                </div>
            </div>
        </div>
    @endif
</section>
<!-- slider-area-end -->
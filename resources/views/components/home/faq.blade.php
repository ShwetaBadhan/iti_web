<!-- faq-area -->
<section class="faq__area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="faq__img-wrap tg-svg">
                    <div class="faq__round-text">
                        <div class="curved-circle">
                            * Learn * Skills * Earn * Money * 
                        </div>
                    </div>
                    <div class="faq__img">
                        <img src="assets/img/others/student.png" alt="img">
                        <div class="shape-one">
                            <img src="assets/img/others/faq_shape01.svg" class="injectable tg-motion-effects4" alt="img">
                        </div>
                        <div class="shape-two">
                            <span class="svg-icon" id="faq-svg" data-svg-icon="assets/img/others/faq_shape02.svg"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faq__content">
                    <div class="section__title pb-10">
                        <span class="sub-title">Faq’s</span>
                        <h2 class="title">Master Skills. Unlock Opportunities</h2>
                    </div>
                    <p>Gain job-ready skills with expert training, practical workshops, and real-world experience all under one roof.</p>
                    <div class="faq__wrap">
                        <div class="accordion" id="accordionExample">
                            
                            @if(isset($faqs) && $faqs->isNotEmpty())
                                @foreach($faqs as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            {{-- ✅ Dynamic ID and Active State for First Item --}}
                                            <button class="accordion-button {{ !$loop->first ? 'collapsed' : '' }}" type="button" 
                                                    data-bs-toggle="collapse" 
                                                    data-bs-target="#collapse{{ $loop->iteration }}"
                                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}" 
                                                    aria-controls="collapse{{ $loop->iteration }}">
                                                {{ $faq->question }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>{{ $faq->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <!-- Fallback: Default FAQ if database is empty -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDefault" aria-expanded="true" aria-controls="collapseDefault">
                                            Is Dr. B.R. Ambedkar ITI Government Approved?
                                        </button>
                                    </h2>
                                    <div id="collapseDefault" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Yes. Dr. B.R. Ambedkar ITI is a government-approved institute, and students receive certificates as per the applicable government norms.</p>
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
<!-- faq-area-end -->
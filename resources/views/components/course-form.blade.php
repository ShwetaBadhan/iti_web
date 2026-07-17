<div class="contact-form-wrap" id="contact-form-wrap">
    <h4 class="title">Contact Us</h4>
    
    <!-- Changed id to "iti-contact-form" to prevent ajax-form.js from hijacking it -->
    <form id="iti-contact-form" action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-grp">
                    <input name="name" type="text" placeholder="Name *" required 
                           value="{{ old('name') }}" class="form-control">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-grp">
                    <input name="phone" type="tel" placeholder="Phone No *" required 
                           value="{{ old('phone') }}" class="form-control">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-grp select-grp">
                    <select name="course" id="course" class="country-name form-control" required>
                        <option value="" disabled {{ old('course') ? '' : 'selected' }}>Select Courses</option>
                        @php
                            $courses = ['Truck Dispatcher', 'Fire & Safety', 'Motor Mechanic', 'Video Editing', 'Forklift Training', 'JCB Training', 'Excavator Training', 'Trailer Training'];
                        @endphp
                        @foreach($courses as $course)
                            <option value="{{ $course }}" {{ old('course') == $course ? 'selected' : '' }}>
                                {{ $course }}
                            </option>
                        @endforeach
                    </select>
                    @error('course') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
        </div>
        <div class="form-grp">
            <textarea name="message" placeholder="Comment" class="form-control">{{ old('message') }}</textarea>
            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <button type="submit" class="btn btn-two arrow-btn">
            Book a Call 
            <img src="{{ asset('assets/img/icons/right_arrow.svg') }}" alt="arrow" class="injectable">
        </button>
    </form>
    <!-- Removed <p class="ajax-response mb-0"></p> as we are using Toastr -->
</div>
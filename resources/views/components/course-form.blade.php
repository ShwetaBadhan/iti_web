<div class="contact-form-wrap" id="contact-form-wrap">
                    <h4 class="title">Contact Us</h4>
                    {{-- <p>Your email address will not be published. Required fields are marked *</p> --}}
                    <form id="contact-form" action="https://html.themegenix.com/skillgro/assets/mail.php"
                        method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-grp">
                                    <input name="name" type="text" placeholder="Name *" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-grp">
                                    <input name="email" type="text" placeholder="Phone No *" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-grp select-grp">
                                    <select name="" id="" class="country-name">
                                        <option value="" selected disabled>Select Courses</option>
                                        <option value="Truck Dispatcher">Truck Dispatcher</option>
                                        <option value="Fire & Safety">Fire & Safety</option>
                                        <option value="Motor Mechanic">Motor Mechanic</option>
                                        <option value="Video Editing">Video Editing</option>
                                        <option value="Forklift Training">Forklift Training</option>
                                        <option value="JCB Training">JCB Training</option>
                                        <option value="Excavator Training">Excavator Training</option>
                                        <option value="Trailer Training">Trailer Training</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-grp">
                            <textarea name="message" placeholder="Comment" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-two arrow-btn">Book a Call <img
                                src="assets/img/icons/right_arrow.svg" alt="img" class="injectable"></button>
                    </form>
                    <p class="ajax-response mb-0"></p>
                </div>
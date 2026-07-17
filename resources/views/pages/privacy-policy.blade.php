@extends('layouts.master')
@section('title', 'Privacy Policy')
@section('content')

    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h3 class="title">Privacy Policy</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="{{ route('home') }}">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Privacy Policy</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape-wrap">
            <img src="assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
            <img src="assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
            <img src="assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
            <img src="assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left"
                data-aos-delay="400">
            <img src="assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- courses-area -->
    <section class="courses-area-six grey-bg-two">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-10">


                    <h2 class="title">Privacy Policy</h2>
                    <p align="justify">At Dr. B. R. Ambedkar Industrial Training Institute (ITI), Jalandhar, we are
                        committed to protecting the privacy and personal information of our students, parents, visitors, and
                        website users. This Privacy Policy explains how we collect, use, disclose, and safeguard your
                        information when you visit our website or interact with our services.</p>
                    <p>By using this website, you consent to the practices described in this Privacy Policy.</p>
                    <h4>1. Information We Collect</h4>
                    <p align="justify">We may collect the following types of information:</p>
                    <h6>Personal Information</h6>
                    <p>When you submit an enquiry, admission application, or contact form, we may collect:</p>
                    <ul class="about__info-list list-wrap">
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Full Name
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Mobile Number
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Email Address
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Residential Address
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Date of Birth
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Educational Qualification
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Course of Interest
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Parent/Guardian Details (where applicable)
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Any other information voluntarily provided by you
                        </li>
                    </ul>
                    <h6>Non-Personal Information</h6>
                    <p>We may automatically collect certain technical information, including:</p>
                    <ul class="about__info-list list-wrap">
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>IP Address
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Browser Type
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Device Information
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Operating System
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Pages Visited
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Date and Time of Visit
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Website Usage Statistics
                        </li>

                    </ul>
                    <h4>2. How We Use Your Information</h4>
                    <p align="justify">The information collected may be used to:</p>
                    <ul class="about__info-list list-wrap">
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Process admission enquiries and applications.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Contact you regarding courses and admissions.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Respond to your questions and requests.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Improve our website and services.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Send important notices and updates.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Maintain student records.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Comply with applicable legal and regulatory requirements.
                        </li>
                    </ul>
                    <p align="justify">We do not sell or rent your personal information to third parties.</p>
                    <h4>3. Cookies</h4>
                    <p align="justify">Our website may use cookies and similar technologies to improve your browsing
                        experience.</p>
                    <p>Cookies help us:</p>
                    <ul class="about__info-list list-wrap">
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Remember user preferences.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Analyze website traffic.
                        </li>
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Improve website performance.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Enhance user experience.
                        </li>


                    </ul>
                    <p align="justify">You may disable cookies through your browser settings; however, doing so may affect
                        certain website features.</p>
                    <h4>4. Information Sharing</h4>
                    <p>We may share your information only when necessary:</p>
                    <ul class="about__info-list list-wrap">
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>With government authorities when required by law.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>With authorized service providers who assist in operating
                            our website or admission processes.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>To protect the legal rights, safety, and security of the
                            institute or others.
                        </li>


                    </ul>
                    <p>We do not disclose personal information for marketing by unrelated third parties.</p>
                    <h4>5. Data Security</h4>
                    <p align="justify">We implement appropriate administrative, technical, and organizational measures to
                        protect your personal information against unauthorized access, alteration, disclosure, or
                        destruction.</p>
                    <p align="justify">While we strive to use commercially acceptable means to protect your information, no
                        method of electronic transmission or storage is completely secure.</p>

                    <h4>6. Data Retention</h4>
                    <p align="justify">We retain personal information only for as long as necessary to:</p>
                    <ul class="about__info-list list-wrap">
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Complete admission and academic processes.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Maintain institutional records.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Meet legal and regulatory obligations.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Resolve disputes and enforce our policies.
                        </li>

                    </ul>
                    <h4>7. Third-Party Websites</h4>
                    <p align="justify">Our website may contain links to third-party websites for your convenience.</p>

                    <p align="justify">We are not responsible for the privacy practices, security, or content of external
                        websites. Users are encouraged to review the privacy policies of those websites before providing any
                        personal information.
                    </p>
                    <h4>8. Your Rights</h4>
                    <p>Subject to applicable laws, you may have the right to:</p>
                    <ul class="about__info-list list-wrap">
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Access your personal information.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Request correction of inaccurate information.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Request deletion of information where legally permissible.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Withdraw consent where applicable.
                        </li>
                        <li class="about__info-list-item">
                            <i class="flaticon-angle-right"></i>Contact us regarding the processing of your personal data.
                        </li>


                    </ul>
                    <p>Requests may be subject to verification and legal requirements.</p>
                    <h4>9. Children's Privacy</h4>
                    <p align="justify">Our website is intended for students and parents seeking educational information.
                        Personal information relating to minors may be collected only as part of the admission process with
                        appropriate parental or guardian involvement where required.</p>

                    <h4>10. Changes to This Privacy Policy</h4>
                    <p align="justify">Dr. B. R. Ambedkar Industrial Training Institute reserves the right to modify this
                        Privacy Policy at any time. Any updates will be published on this page along with the revised
                        effective date.</p>
                    <p align="justify">Continued use of the website after changes are posted constitutes acceptance of the
                        updated Privacy Policy.</p>



                    <h4>11. Contact Information</h4>
                    <p align="justify">If you have any questions, concerns, or requests regarding this Privacy Policy or
                        the handling of your personal information, please contact us:</p>

                    <p><strong>Dr. B. R. Ambedkar Industrial Training Institute (ITI)</strong></p>
                    <p>Jalandhar, Punjab, India</p>

                    <p><strong>Email: info@ambedkar.com</strong></p>
                    <p><strong>Phone: +91 98140-54591</strong></p>
                    <p>We are committed to addressing your privacy-related concerns in a timely and transparent manner. </p>
                </div>

            </div>
    </section>
    <!-- courses-area-end --

@endsection

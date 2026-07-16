@extends('layouts.master')
@section('title', 'Contact Us')
@section('content')

    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title">Contact With Us</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href= "{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Contact</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__shape-wrap">
                <img src="assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
                <img src="assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right"
                    data-aos-delay="300">
                <img src="assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
                <img src="assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left"
                    data-aos-delay="400">
                <img src="assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left"
                    data-aos-delay="400">
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <section class="contact-area section-py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info-wrap">
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            viewBox="0 0 30 30" fill="none"
                                            data-inject-url="https://html.themegenix.com/skillgro/assets/img/icons/map.svg"
                                            class="injectable">
                                            <path
                                                d="M14.7494 0C11.8308 0.00330112 9.03278 1.16414 6.96907 3.22786C4.90536 5.29157 3.74451 8.08962 3.74121 11.0081C3.74121 16.896 13.8268 29.244 14.2561 29.7669C14.316 29.8398 14.3913 29.8985 14.4766 29.9388C14.5619 29.9791 14.655 30 14.7494 30C14.8437 30 14.9368 29.9791 15.0221 29.9388C15.1074 29.8985 15.1827 29.8398 15.2426 29.7669C15.6719 29.244 25.7575 16.896 25.7575 11.0081C25.7542 8.08962 24.5934 5.29157 22.5296 3.22786C20.4659 1.16414 17.6679 0.00330112 14.7494 0ZM14.7494 28.3415C12.7054 25.7618 5.01781 15.7433 5.01781 11.0082C5.01781 9.73019 5.26952 8.46474 5.75858 7.28405C6.24763 6.10337 6.96445 5.03057 7.86811 4.12691C8.77177 3.22325 9.84457 2.50643 11.0253 2.01738C12.2059 1.52832 13.4714 1.27661 14.7494 1.27661C16.0273 1.27661 17.2928 1.52832 18.4735 2.01738C19.6541 2.50643 20.7269 3.22325 21.6306 4.12691C22.5343 5.03057 23.2511 6.10337 23.7401 7.28405C24.2292 8.46474 24.4809 9.73019 24.4809 11.0082C24.4809 15.7433 16.7933 25.7618 14.7494 28.3415Z"
                                                fill="white"></path>
                                            <path
                                                d="M14.7494 6.14845C13.8608 6.14845 12.9922 6.41193 12.2534 6.90558C11.5146 7.39923 10.9388 8.10087 10.5988 8.92178C10.2588 9.74268 10.1698 10.646 10.3431 11.5175C10.5165 12.3889 10.9443 13.1894 11.5726 13.8177C12.2009 14.446 13.0014 14.8739 13.8729 15.0472C14.7444 15.2206 15.6477 15.1316 16.4686 14.7916C17.2895 14.4515 17.9911 13.8757 18.4848 13.1369C18.9784 12.3981 19.2419 11.5295 19.2419 10.641C19.2405 9.44992 18.7668 8.30802 17.9246 7.46579C17.0823 6.62357 15.9404 6.14981 14.7494 6.14845ZM14.7494 13.857C14.1133 13.857 13.4915 13.6683 12.9627 13.315C12.4338 12.9616 12.0216 12.4593 11.7782 11.8717C11.5348 11.2841 11.4711 10.6374 11.5952 10.0136C11.7193 9.38976 12.0256 8.81674 12.4753 8.36698C12.9251 7.91722 13.4981 7.61093 14.122 7.48684C14.7458 7.36275 15.3924 7.42644 15.98 7.66984C16.5677 7.91325 17.07 8.32545 17.4233 8.85431C17.7767 9.38317 17.9653 10.0049 17.9653 10.641C17.9643 11.4936 17.6252 12.311 17.0223 12.9139C16.4194 13.5168 15.602 13.856 14.7494 13.857Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Address</h4>
                                        <p>Chandan Nagar, Kartarpur Distt. Jalandhar, 144801, Punjab (India).</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            viewBox="0 0 30 30" fill="none"
                                            data-inject-url="https://html.themegenix.com/skillgro/assets/img/icons/contact_phone.svg"
                                            class="injectable">
                                            <g clip-path="url(#clip0_0_267--inject-5)">
                                                <path
                                                    d="M23.7221 18.5839C23.1071 17.9444 22.3652 17.6025 21.5789 17.6025C20.799 17.6025 20.0507 17.9381 19.4103 18.5776L17.4066 20.5721C17.2417 20.4834 17.0768 20.4011 16.9183 20.3188C16.69 20.2048 16.4745 20.0972 16.2906 19.9832C14.4137 18.7929 12.7079 17.2416 11.072 15.2345C10.2794 14.234 9.74673 13.3919 9.35993 12.5372C9.87989 12.0623 10.3618 11.5684 10.831 11.0935C11.0086 10.9162 11.1861 10.7326 11.3637 10.5553C12.6953 9.22567 12.6953 7.50345 11.3637 6.17379L9.6326 4.44523C9.43603 4.24895 9.23312 4.04633 9.04289 3.84372C8.66243 3.45115 8.26295 3.04592 7.85079 2.66602C7.23572 2.05818 6.50018 1.73526 5.72658 1.73526C4.95299 1.73526 4.20476 2.05818 3.57067 2.66602C3.56433 2.67235 3.56433 2.67235 3.55799 2.67868L1.40207 4.85046C0.590434 5.66092 0.127547 6.64867 0.026092 7.7947C-0.12609 9.64356 0.419229 11.3658 0.83773 12.4928C1.86496 15.2598 3.39946 17.8241 5.68854 20.5721C8.46586 23.8836 11.8075 26.4986 15.6248 28.3411C17.0832 29.0312 19.0298 29.848 21.2048 29.9873C21.3379 29.9937 21.4774 30 21.6043 30C23.069 30 24.2992 29.4745 25.263 28.4297C25.2693 28.4171 25.282 28.4107 25.2883 28.3981C25.6181 27.9992 25.9985 27.6383 26.398 27.252C26.6707 26.9924 26.9497 26.7202 27.2223 26.4352C27.8501 25.7831 28.1798 25.0233 28.1798 24.2445C28.1798 23.4593 27.8437 22.7059 27.2033 22.0727L23.7221 18.5839ZM25.9922 25.2512C25.9858 25.2576 25.9858 25.2512 25.9922 25.2512C25.7449 25.5172 25.4912 25.7578 25.2186 26.0237C24.8064 26.4163 24.3879 26.8278 23.9948 27.29C23.3544 27.9739 22.5998 28.2968 21.6106 28.2968C21.5155 28.2968 21.414 28.2968 21.3189 28.2904C19.4357 28.1701 17.6856 27.4357 16.373 26.8088C12.784 25.0739 9.6326 22.6109 7.01379 19.4894C4.85154 16.887 3.40581 14.481 2.44833 11.8976C1.85862 10.3211 1.64303 9.0927 1.73814 7.934C1.80155 7.19319 2.08689 6.57902 2.61319 6.05348L4.77545 3.89437C5.08615 3.60311 5.41588 3.44482 5.73927 3.44482C6.13874 3.44482 6.46213 3.68543 6.66504 3.88804C6.67138 3.89437 6.67772 3.9007 6.68406 3.90704C7.07086 4.26794 7.43863 4.64151 7.82543 5.04041C8.022 5.24303 8.22491 5.44564 8.42782 5.65459L10.1589 7.38314C10.831 8.0543 10.831 8.67481 10.1589 9.34597C9.975 9.52959 9.79746 9.71321 9.61357 9.8905C9.08093 10.435 8.57366 10.9416 8.022 11.4354C8.00932 11.4481 7.99664 11.4544 7.9903 11.4671C7.44498 12.0116 7.54643 12.5435 7.66057 12.9044C7.66691 12.9234 7.67325 12.9424 7.67959 12.9614C8.1298 14.0504 8.76389 15.0762 9.72771 16.2982L9.73405 16.3045C11.4841 18.4573 13.3294 20.1352 15.3648 21.4205C15.6248 21.5852 15.8911 21.7181 16.1447 21.8448C16.373 21.9587 16.5886 22.0664 16.7725 22.1803C16.7978 22.193 16.8232 22.212 16.8486 22.2247C17.0642 22.3323 17.2671 22.383 17.4763 22.383C18.0026 22.383 18.3323 22.0537 18.4401 21.9461L20.6087 19.7806C20.8243 19.5653 21.1667 19.3057 21.5662 19.3057C21.9594 19.3057 22.2827 19.5527 22.4793 19.768C22.4857 19.7743 22.4857 19.7743 22.492 19.7806L25.9858 23.2694C26.639 23.9152 26.639 24.5801 25.9922 25.2512Z"
                                                    fill="white"></path>
                                                <path
                                                    d="M16.2144 7.13619C17.8758 7.41479 19.3849 8.19992 20.5897 9.40294C21.7945 10.606 22.5744 12.1129 22.8597 13.7718C22.9295 14.1897 23.2909 14.481 23.7031 14.481C23.7538 14.481 23.7982 14.4746 23.8489 14.4683C24.3182 14.3923 24.6289 13.9491 24.5528 13.4806C24.2104 11.4734 23.2592 9.64355 21.8071 8.19359C20.3551 6.74363 18.5225 5.79387 16.5125 5.45196C16.0432 5.37598 15.6057 5.68623 15.5233 6.14845C15.4409 6.61066 15.7452 7.06021 16.2144 7.13619Z"
                                                    fill="white"></path>
                                                <path
                                                    d="M29.9869 13.2336C29.4226 9.92848 27.8627 6.92092 25.4659 4.52754C23.069 2.13415 20.0571 0.576553 16.7471 0.0130316C16.2842 -0.0692806 15.8467 0.247305 15.7642 0.709519C15.6882 1.17807 15.9989 1.61495 16.4681 1.69727C19.423 2.19747 22.1179 3.59678 24.2611 5.73056C26.4043 7.87068 27.7993 10.5617 28.3003 13.5122C28.37 13.9301 28.7314 14.2214 29.1436 14.2214C29.1943 14.2214 29.2387 14.215 29.2894 14.2087C29.7523 14.1391 30.0694 13.6959 29.9869 13.2336Z"
                                                    fill="white"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_0_267--inject-5">
                                                    <rect width="30" height="30" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Phone</h4>
                                        <a href="tel:919814854591">+91 98148-54591</a>
                                        <a href="tel:9814054591">+91 98140-54591</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            viewBox="0 0 30 30" fill="none"
                                            data-inject-url="https://html.themegenix.com/skillgro/assets/img/icons/emial.svg"
                                            class="injectable">
                                            <path
                                                d="M26.75 5H3.25C2.14544 5 1.25 5.95513 1.25 7.13333V22.8667C1.25 24.0449 2.14544 25 3.25 25H26.75C27.8546 25 28.75 24.0449 28.75 22.8667V7.13333C28.75 5.95513 27.8546 5 26.75 5V5ZM15 16.7917L3.465 6.33333H26.535L15 16.7917ZM2.5 7.20833L10.0308 14.0362L2.5 22.6869V7.20833ZM10.9841 14.9006L14.5952 18.1746C14.7119 18.2804 14.8559 18.3333 15 18.3333C15.1441 18.3333 15.2881 18.2804 15.4048 18.1746L19.0159 14.9006L26.6471 23.6667H3.35294L10.9841 14.9006ZM19.9692 14.0362L27.5 7.20833V22.6869L19.9692 14.0362Z"
                                                fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">E-mail Address</h4>
                                        <a href="mailto:info@ambedkar.com">info@ambedkar.com</a>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="contact-form-wrap">
                            <h4 class="title">Send Us Message</h4>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form id="contact-form" action="https://html.themegenix.com/skillgro/assets/mail.php"
                                method="POST">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-grp">
                                            <input name="name" type="text" placeholder="Name *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-grp">
                                            <input name="email" type="email" placeholder="E-mail *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-grp">
                                            <input name="website" type="url" placeholder="Website *" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-grp">
                                    <textarea name="message" placeholder="Comment" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-two arrow-btn">Submit Now <img
                                        src="assets/img/icons/right_arrow.svg" alt="img"
                                        class="injectable"></button>
                            </form>
                            <p class="ajax-response mb-0"></p>
                        </div>
                    </div>
                </div>
                <!-- contact-map -->
                <div class="contact-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d218339.1968691728!2d75.29027521978279!3d31.233195747966185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x391964aa569e7355%3A0x8fbd263103a38861!2sPunjab!3m2!1d31.1471305!2d75.34121789999999!4m5!1s0x391a5a62e15f7ad5%3A0x99d59052f410bbca!2sChandan%20nagar%2C%2017%2C%20near%20evergreen%20publishers%2C%20Neela%20Mahal%2C%20Jalandhar%2C%20Punjab%20144008!3m2!1d31.34046!2d75.5768702!5e0!3m2!1sen!2sin!4v1783601688613!5m2!1sen!2sin"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin"></iframe>
                </div>
                <!-- contact-map-end -->
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

@endsection

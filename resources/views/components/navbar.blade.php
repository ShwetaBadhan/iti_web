   <!-- header-area -->
   <header>
       <div id="header-fixed-height"></div>
       <div class="tg-header__top">
           <div class="container">
               <div class="row">
                   <div class="col-lg-6">
                       <ul class="tg-header__top-info list-wrap">
                           <li><img src="assets/img/icons/map_marker.svg" alt="Icon"> <span>Chandan Nagar ,Kartarpur
                                   Distt. | Jalandhar</span></li>
                           <li><img src="assets/img/icons/envelope.svg" alt="Icon"> <a
                                   href="mailto:info@ambedkariti.com">info@ambedkariti.com</a></li>
                       </ul>
                   </div>
                   <div class="col-lg-6">
                       <div class="tg-header__top-right">
                           <ul class="tg-header__top-social list-wrap">
                               <li>Follow Us On :</li>
                               <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                               <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                               <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                               <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div id="sticky-header" class="tg-header__area tg-header__style-six">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="tgmenu__wrap">
                           <nav class="tgmenu__nav">
                               <div class="logo">
                                   <a href="{{ route('home') }}"><img src="assets/img/logo/logo-iti.png"
                                           style="width: 220px;" alt="Logo"></a>
                               </div>
                               <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                   <ul class="navigation">
                                       <li class="active"><a href="{{ route('home') }}">Home</a>

                                       </li>
                                       <li class="menu-item-has-children"><a href="#">Who We Are</a>
                                           <ul class="sub-menu">
                                               <li><a href="{{ route('about') }}">About Us</a></li>
                                               <li><a href="{{ route('chairman-message') }}">Chairman Message</a></li>
                                               <li><a href="{{ route('director-message') }}">Director Message</a></li>
                                               <li><a href="{{ route('our-mission') }}">Our Mission</a></li>


                                           </ul>
                                       </li>
                                       <li class="menu-item-has-children"><a href="{{ route('courses') }}">Courses</a>




                                           <ul class="sub-menu">
                                               <li>
                                                   <a href="{{ route('truck-dispatch-details') }}">Truck Dispatcher</a>

                                               </li>
                                               <li>
                                                   <a href="{{ route('fire-safety-details') }}">Fire & Safety</a>

                                               </li>
                                               <li>
                                                   <a href="{{ route('trailer-training-details') }}">Trailer
                                                       Training</a>

                                               </li>
                                               <li>
                                                   <a href="{{ route('forklift-training-details') }}">Forklift
                                                       Training</a>

                                               </li>
                                               <li>
                                                   <a href="{{ route('jcb-training-details') }}">JCB Training</a>

                                               </li>
                                               <li>
                                                   <a href="{{ route('excavator-training-details') }}">Excavator
                                                       Training</a>

                                               </li>
                                               <li>
                                                   <a href="{{ route('motor-mechanic-details') }}">Motor Mechanic</a>

                                               </li>
                                               <li>
                                                   <a href="{{ route('video-editing-details') }}">Video Editing</a>

                                               </li>
                                               <li>
                                                   <a href="{{ route('car-driving-details') }}">Car Driving</a>

                                               </li>



                                           </ul>


                                       </li>
                                       <li><a href="{{ route('our-gallery') }}">Photo Gallery</a>

                                       </li>
                                     

                                       <li><a href="{{ route('our-results') }}">Results</a>

                                       </li>
                                         <li><a href="{{ route('our-blogs') }}">Our Blogs</a>

                                       </li>
                                       <li><a href="{{ route('contact-us') }}">Contact Us</a>

                                       </li>
                                   </ul>
                               </div>
                               <div class="tgmenu__action tgmenu__action-six">
                                   <ul class="list-wrap">

                                       {{-- <li class="header-btn">
                                           <a href="login.html" class="btn arrow-btn">Apply Now <img
                                                   src="assets/img/icons/right_arrow.svg" alt="img"
                                                   class="injectable"></a>
                                       </li> --}}
                                   </ul>
                               </div>
                               {{-- <div class="mobile-login-btn mobile-login-btn-two">
                                   <a href="login.html"><img src="assets/img/icons/user.svg" alt=""
                                           class="injectable"></a>
                               </div> --}}
                               <div class="mobile-nav-toggler"><i class="tg-flaticon-menu-1"></i></div>
                           </nav>
                       </div>
                       <!-- Mobile Menu  -->
                       <div class="tgmobile__menu">
                           <nav class="tgmobile__menu-box">
                               <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
                               <div class="nav-logo">
                                   <a href="{{ route('home') }}"><img src="assets/img/logo/logo-iti.png"
                                           alt="Logo"></a>
                               </div>
                               <div class="tgmobile__search">
                                   <form action="#">
                                       <input type="text" placeholder="Search here...">
                                       <button><i class="fas fa-search"></i></button>
                                   </form>
                               </div>
                               <div class="tgmobile__menu-outer">
                                   <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                               </div>
                               <div class="social-links">
                                   <ul class="list-wrap">
                                       <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                       <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                       <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                       <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                       <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                   </ul>
                               </div>
                           </nav>
                       </div>
                       <div class="tgmobile__menu-backdrop"></div>
                       <!-- End Mobile Menu -->
                   </div>
               </div>
           </div>
       </div>

       <!-- header-search -->
       <div class="search__popup">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="search__wrapper">
                           <div class="search__close">
                               <button type="button" class="search-close-btn">
                                   <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5"
                                           stroke-linecap="round" stroke-linejoin="round"></path>
                                       <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5"
                                           stroke-linecap="round" stroke-linejoin="round"></path>
                                   </svg>
                               </button>
                           </div>
                           <div class="search__form">
                               <form action="#">
                                   <div class="search__input">
                                       <input class="search-input-field" type="text"
                                           placeholder="Type keywords here">
                                       <span class="search-focus-border"></span>
                                       <button>
                                           <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                               <path
                                                   d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z"
                                                   stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                   stroke-linejoin="round"></path>
                                               <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentcolor"
                                                   stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                               </path>
                                           </svg>
                                       </button>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="search-popup-overlay"></div>
   </header>
   <!-- header-area-end -->

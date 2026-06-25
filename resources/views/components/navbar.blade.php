   <!-- header-area -->
   <header>
       <div id="header-fixed-height"></div>
       <div class="tg-header__top">
           <div class="container">
               <div class="row">
                   <div class="col-lg-6">
                       <ul class="tg-header__top-info list-wrap">
                           <li><img src="assets/img/icons/map_marker.svg" alt="Icon"> <span>589 5th Ave, NY 10024,
                                   USA</span></li>
                           <li><img src="assets/img/icons/envelope.svg" alt="Icon"> <a
                                   href="mailto:info@skillgrodemo.com">info@skillgrodemo.com</a></li>
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
                                   <a href="{{ route('home') }}"><img src="assets/img/logo/logo-iti.png" style="width: 220px;"
                                           alt="Logo"></a>
                               </div>
                               <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                   <ul class="navigation">
                                       <li class="active"><a href="{{ route('home') }}">Home</a>

                                       </li>
                                       <li class="menu-item-has-children"><a href="#">Who We Are</a>
                                           <ul class="sub-menu">
                                               <li><a href="{{ route('about') }}">About Us</a></li>
                                               <li><a href="{{ route('chairman-message') }}">Chairman Message</a></li>
                                               {{-- <li><a href="{{ route('our-team') }}">Our Team</a></li> --}}


                                           </ul>
                                       </li>
                                       <li class="menu-item-has-children"><a href="{{ route('courses') }}">Courses</a>




                                           <ul class="sub-menu">
                                               <li class="menu-item-has-children">
                                                   <a href="{{ route('auto-electrician') }}">Auto Electrician</a>
                                                   <ul class="sub-menu">
                                                       <li><a href="{{ route('auto-electrician') }}">Auto Electrician
                                                               (Basic)</a></li>
                                                       <li><a href="{{ route('auto-electrician') }}">Auto Electrician
                                                               (Advance)</a></li>
                                                   </ul>
                                               </li>

                                               <li class="menu-item-has-children">
                                                   <a href="javascript:void(0)">Automobile</a>
                                                   <ul class="sub-menu">
                                                       <li><a href="{{ route('automobile') }}#basic">Automobile (Basic)</a></li>
                                                       <li><a href="{{ route('automobile') }}#diesel">Automobile (Diesel)</a></li>
                                                       <li><a href="{{ route('automobile') }}#petrol">Automobile (Petrol)</a></li>
                                                   </ul>
                                               </li>

                                               <li class="menu-item-has-children">
                                                   <a href="#">Mechanical</a>
                                                   <ul class="sub-menu">
                                                       <li><a href="">Fitter</a></li>
                                                       <li><a href="">Welder</a></li>
                                                       <li><a href="">Tool & Die</a></li>
                                                       <li><a href="">Pump Operator</a></li>
                                                   </ul>
                                               </li>

                                               <li class="menu-item-has-children">
                                                   <a href="#">Electrical</a>
                                                   <ul class="sub-menu">
                                                       <li><a href="">Electrician</a></li>
                                                       <li><a href="">Wireman</a></li>
                                                       <li><a href="">Electrical
                                                               Technician</a></li>
                                                   </ul>
                                               </li>

                                               <li class="menu-item-has-children">
                                                   <a href="#">Computer & IT</a>
                                                   <ul class="sub-menu">
                                                       <li><a href="">Basic Computer</a></li>
                                                       <li><a href="">Computer Management</a>
                                                       </li>
                                                       <li><a href="">COPA</a></li>
                                                       <li><a href="">Tally</a></li>
                                                   </ul>
                                               </li>

                                               <li class="menu-item-has-children">
                                                   <a href="#">Construction</a>
                                                   <ul class="sub-menu">
                                                       <li><a href="">Plumber</a></li>
                                                       <li><a href="">Carpenter</a></li>
                                                       <li><a href="">Painter</a></li>
                                                       <li><a href="">Pipe Fitter</a></li>
                                                   </ul>
                                               </li>

                                               <li class="menu-item-has-children">
                                                   <a href="#">Beauty & Lifestyle</a>
                                                   <ul class="sub-menu">
                                                       <li><a href="">Beautician</a></li>
                                                       <li><a href="">Dress Making</a></li>
                                                       <li><a href="">Cooking</a></li>
                                                   </ul>
                                               </li>

                                               <li class="menu-item-has-children">
                                                   <a href="#">Mechanic Safety</a>
                                                   <ul class="sub-menu">
                                                       <li><a href="">Fire & Industrial
                                                               Safety</a></li>
                                                       <li><a href="">Hazardous Goods
                                                               Handling</a></li>
                                                   </ul>
                                               </li>

                                               <li class="menu-item-has-children">
                                                   <a href="#">Education</a>
                                                   <ul class="sub-menu">
                                                       <li><a href="">NTT (Nursery Teacher Training)</a></li>
                                                       <li><a href="">ETT (Elementary Teacher Training)</a>
                                                       </li>
                                                       <li><a href="">Nanny Training</a></li>
                                                   </ul>
                                               </li>
                                           </ul>


                                       </li>
                                       <li><a href="#">Photo Gallery</a>
                                          
                                       </li>

                                       <li><a href="{{ route('home') }}">Results</a>

                                       </li>
                                       <li><a href="{{ route('home') }}">Contact Us</a>

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
                                   <a href="{{ route('home') }}"><img src="assets/img/logo/logo-iti.png" alt="Logo"></a>
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

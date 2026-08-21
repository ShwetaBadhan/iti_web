<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div class="">
        <div class="sidebar-logo d-flex align-items-center justify-content-between">
           <a href="{{ route('dashboard') }}" class="">

    <img src="{{ isset($settings) && $settings->logo ? asset('storage/' . $settings->logo) : asset('images/logo.png') }}" 
         alt="site logo" class="light-logo">
         
  
    <img src="{{ isset($settings) && $settings->backend_logo ? asset('storage/' . $settings->backend_logo) : (isset($settings) && $settings->logo ? asset('storage/' . $settings->logo) : asset('images/logo-light.png')) }}" 
         alt="site logo" class="dark-logo">
         

    <img src="{{ isset($settings) && $settings->favicon ? asset('storage/' . $settings->favicon) : asset('images/logo-icon.png') }}" 
         alt="site logo" class="logo-icon">
</a>
            <button type="button" class="text-xxl d-xl-flex d-none line-height-1 sidebar-toggle text-neutral-500"
                aria-label="Collapse Sidebar">
                <i class="ri-contract-left-line"></i>
            </button>
        </div>
    </div>
   
    <!-- User Info end -->
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="ri-home-4-line"></i>
                    <span>Dashboard </span>
                </a>

            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-graduation-cap-line"></i>
                    <span>Home Page</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('sliders.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Slider
                        </a>
                    </li>
                   
                    <li>
                        <a href="{{ route('testimonials.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Testimonials
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('faqs.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Faqs
                        </a>
                    </li>

                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-graduation-cap-line"></i>
                    <span>About Us</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('chairman-message.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Chairman's Message
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('director-message.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Director's Message
                        </a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="{{ route('courses.index') }}">
                    <i class="ri-calendar-event-line"></i>
                    <span>Courses </span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-user-settings-line"></i>
                    <span>Blogs</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('blogs.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            All Blogs
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blogs.create') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Add New Blog
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="{{ route('gallery.index') }}">
                    <i class="ri-message-2-line"></i>
                    <span>Gallery </span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-graduation-cap-line"></i>
                    <span>Students</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('students.create') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Add New Student
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('students.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Student List
                        </a>
                    </li>


                </ul>
            </li>
            <li>
                <a href="{{ route('results.index') }}">
                    <i class="ri-price-tag-3-line"></i>
                    <span>Results </span>
                </a>
            </li>
            <li>
                <a href="{{ route('certificates.index') }}">
                    <i class="ri-award-line"></i>
                    <span>Certificate </span>
                </a>

            </li>
            <li>
                <a href="{{ route('fees.index') }}">
                    <i class="ri-money-rupee-circle-line"></i>
                    <span>Fee Receipts</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-graduation-cap-line"></i>
                    <span>Administration</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Admin Users
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('roles.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Roles
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('permissions.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Permissions
                        </a>
                    </li>

                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-user-settings-line"></i>
                    <span>Settings</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('general-settings') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            General
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('seo.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            SEO Setup
                        </a>
                    </li>

                </ul>

            </li>
        </ul>
    </div>
</aside>

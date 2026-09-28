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

    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">

            {{-- Dashboard --}}
            @can('dashboard-view')
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="ri-home-4-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @endcan

            {{-- Contact Leads --}}
            @can('contact-leads-view')
            <li>
                <a href="{{ route('contact-queries.index') }}">
                    <i class="ri-user-settings-line"></i>
                    <span>Contact Leads</span>
                </a>
            </li>
            @endcan

            {{-- Home Page (Dropdown) --}}
            @canany(['slider-view', 'testimonial-view', 'faq-view'])
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-graduation-cap-line"></i>
                    <span>Home Page</span>
                </a>
                <ul class="sidebar-submenu">
                    @can('slider-view')
                    <li>
                        <a href="{{ route('sliders.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Slider
                        </a>
                    </li>
                    @endcan

                    @can('testimonial-view')
                    <li>
                        <a href="{{ route('testimonials.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Testimonials
                        </a>
                    </li>
                    @endcan

                    @can('faq-view')
                    <li>
                        <a href="{{ route('faqs.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            FAQs
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            {{-- About Us (Dropdown) --}}
            @canany(['chairman-message-view', 'director-message-view'])
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-graduation-cap-line"></i>
                    <span>About Us</span>
                </a>
                <ul class="sidebar-submenu">
                    @can('chairman-message-view')
                    <li>
                        <a href="{{ route('chairman-message.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Chairman's Message
                        </a>
                    </li>
                    @endcan

                    @can('director-message-view')
                    <li>
                        <a href="{{ route('director-message.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Director's Message
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            {{-- Courses --}}
            @can('course-view')
            <li>
                <a href="{{ route('courses.index') }}">
                    <i class="ri-calendar-event-line"></i>
                    <span>Courses</span>
                </a>
            </li>
            @endcan

            {{-- Blogs (Dropdown) --}}
            @canany(['blog-view', 'blog-create'])
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-user-settings-line"></i>
                    <span>Blogs</span>
                </a>
                <ul class="sidebar-submenu">
                    @can('blog-view')
                    <li>
                        <a href="{{ route('blogs.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            All Blogs
                        </a>
                    </li>
                    @endcan

                    @can('blog-create')
                    <li>
                        <a href="{{ route('blogs.create') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Add New Blog
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            {{-- Gallery --}}
            @can('gallery-view')
            <li>
                <a href="{{ route('gallery.index') }}">
                    <i class="ri-message-2-line"></i>
                    <span>Gallery</span>
                </a>
            </li>
            @endcan

            {{-- Students (Dropdown) --}}
            @canany(['student-create', 'student-view'])
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-graduation-cap-line"></i>
                    <span>Students</span>
                </a>
                <ul class="sidebar-submenu">
                    @can('student-create')
                    <li>
                        <a href="{{ route('students.create') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Add New Student
                        </a>
                    </li>
                    @endcan

                    @can('student-view')
                    <li>
                        <a href="{{ route('students.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Student List
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            {{-- Results --}}
            @can('result-view')
            <li>
                <a href="{{ route('results.index') }}">
                    <i class="ri-price-tag-3-line"></i>
                    <span>Results</span>
                </a>
            </li>
            @endcan

            {{-- Certificates --}}
            @can('certificate-view')
            <li>
                <a href="{{ route('certificates.index') }}">
                    <i class="ri-award-line"></i>
                    <span>Certificate</span>
                </a>
            </li>
            @endcan

            {{-- Fee Receipts --}}
            @can('fee-view')
            <li>
                <a href="{{ route('fees.index') }}">
                    <i class="ri-money-rupee-circle-line"></i>
                    <span>Fee Receipts</span>
                </a>
            </li>
            @endcan

            {{-- Administration (Dropdown) --}}
            @canany(['user-view', 'role-view', 'permission-view'])
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-graduation-cap-line"></i>
                    <span>Administration</span>
                </a>
                <ul class="sidebar-submenu">
                    @can('user-view')
                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Admin Users
                        </a>
                    </li>
                    @endcan

                    @can('role-view')
                    <li>
                        <a href="{{ route('roles.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Roles
                        </a>
                    </li>
                    @endcan

                    @can('permission-view')
                    <li>
                        <a href="{{ route('permissions.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            Permissions
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            {{-- Settings (Dropdown) --}}
            @canany(['setting-view', 'seo-view'])
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <i class="ri-user-settings-line"></i>
                    <span>Settings</span>
                </a>
                <ul class="sidebar-submenu">
                    @can('setting-view')
                    <li>
                        <a href="{{ route('general-settings') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            General
                        </a>
                    </li>
                    @endcan

                    @can('seo-view')
                    <li>
                        <a href="{{ route('seo.index') }}">
                            <i class="ri-circle-fill circle-icon w-auto"></i>
                            SEO Setup
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

        </ul>
    </div>
</aside>
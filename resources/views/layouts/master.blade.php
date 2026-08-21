<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    @php
       
        $currentPage = request()->route() ? request()->route()->getName() : 'home';
        
       
        $dynamicData = [];
        if (isset($course)) {
            $dynamicData['course'] = $course;
        }

        // 3. SEO Helper se data fetch karein
        $seo = \App\Helpers\SeoHelper::generate($currentPage, $dynamicData);
    @endphp

    <!-- Primary Meta Tags -->
    <title>{{ $seo['title'] }}</title>
    <meta name="title" content="{{ $seo['title'] }}">
    <meta name="description" content="{{ $seo['description'] }}">
    <meta name="keywords" content="{{ $seo['keywords'] }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{{ $seo['canonical'] }}">

    @if($seo['noindex'])
        <meta name="robots" content="noindex, nofollow">
    @else
        <meta name="robots" content="index, follow">
    @endif

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seo['canonical'] }}">
    <meta property="og:title" content="{{ $seo['title'] }}">
    <meta property="og:description" content="{{ $seo['description'] }}">
    <meta property="og:image" content="{{ $seo['ogImage'] }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $seo['canonical'] }}">
    <meta property="twitter:title" content="{{ $seo['title'] }}">
    <meta property="twitter:description" content="{{ $seo['description'] }}">
    <meta property="twitter:image" content="{{ $seo['ogImage'] }}">

    <!-- Favicon -->
    @if (isset($settings) && $settings->favicon)
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/' . $settings->favicon) }}">
    @else
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    @endif

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/flaticon-skillgro.css">
    <link rel="stylesheet" href="assets/css/flaticon-skillgro-new.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/default-icons.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/odometer.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/plyr.css">
    <link rel="stylesheet" href="assets/css/spacing.css">
    <link rel="stylesheet" href="assets/css/tg-cursor.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <style>
        /* Custom Toastr Styling - More Prominent */
        #toast-container>div {
            opacity: 1 !important;
            background-color: #28a745 !important;
            color: #ffffff !important;
            font-weight: 600 !important;
            font-size: 16px !important;
            padding: 20px 25px !important;
            border-radius: 8px !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3) !important;
            border: 2px solid #1e7e34 !important;
        }
        #toast-container>div:hover {
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4) !important;
        }
        .toast-success {
            background-color: #28a745 !important;
        }
        .toast-success:before {
            font-size: 32px !important;
            line-height: 32px !important;
            opacity: 1 !important;
        }
        .toast-progress {
            background-color: rgba(255, 255, 255, 0.4) !important;
            opacity: 1 !important;
        }
        .toast-close-button {
            color: #ffffff !important;
            opacity: 0.8 !important;
            font-weight: bold !important;
        }
        .toast-close-button:hover {
            opacity: 1 !important;
        }
    </style>

    <!-- Google Tag Manager (Head) -->
    @if(!empty($seo['global']->google_tag_manager))
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{ $seo['global']->google_tag_manager }}');</script>
    @endif
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    @if(!empty($seo['global']->google_tag_manager))
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $seo['global']->google_tag_manager }}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endif

    <main class="main-area fix">
        @include('components.navbar')
        @yield('content')
    </main>
    
    @include('components.footer')

    <!-- JS here -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.odometer.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/tween-max.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/jquery.marquee.min.js"></script>
    <script src="assets/js/tg-cursor.min.js"></script>
    <script src="assets/js/vivus.min.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/svg-inject.min.js"></script>
    <script src="assets/js/jquery.circleType.js"></script>
    <script src="assets/js/jquery.lettering.min.js"></script>
    <script src="assets/js/plyr.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/main.js"></script>
    
    @stack('scripts')
    
    <script>
        SVGInject(document.querySelectorAll("img.injectable"));
    </script>
    
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if ($errors->any())
            toastr.error("{{ $errors->first() }}");
        @endif
    </script>

    <!-- Google Analytics -->
    @if(!empty($seo['global']->google_analytics))
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $seo['global']->google_analytics }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $seo['global']->google_analytics }}');
        </script>
    @endif
</body>
</html>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'D.R. BR Ambedkar ITI')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    

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
#toast-container > div {
    opacity: 1 !important;
    background-color: #28a745 !important; /* Darker green */
    color: #ffffff !important;
    font-weight: 600 !important;
    font-size: 16px !important;
    padding: 20px 25px !important;
    border-radius: 8px !important;
    box-shadow: 0 8px 25px rgba(0,0,0,0.3) !important;
    border: 2px solid #1e7e34 !important;
}

#toast-container > div:hover {
    box-shadow: 0 12px 35px rgba(0,0,0,0.4) !important;
}

/* Success icon को bold करें */
.toast-success {
    background-color: #28a745 !important;
}

.toast-success:before {
    font-size: 32px !important;
    line-height: 32px !important;
    opacity: 1 !important;
}

/* Progress bar को visible करें */
.toast-progress {
    background-color: rgba(255,255,255,0.4) !important;
    opacity: 1 !important;
}

/* Close button */
.toast-close-button {
    color: #ffffff !important;
    opacity: 0.8 !important;
    font-weight: bold !important;
}

.toast-close-button:hover {
    opacity: 1 !important;
}
</style>
</head>

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

    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if($errors->any())
        toastr.error("{{ $errors->first() }}");
    @endif
</script>
</body>

</html>
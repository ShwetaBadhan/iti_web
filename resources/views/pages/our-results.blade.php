@extends('layouts.master')
@section('title', 'Our Results')
@section('content')

    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title">Our Results</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href= "{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Our Results</span>
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
                <div class="result-search-card">

                    <h2>Verify Your Result</h2>

                    <form id="resultForm" class="result-form">

                        <select>
                            <option>Select Course</option>
                            <option value="">Truck Dispatch</option>
                            <option value="">Fire & Safety</option>
                            <option value="">Trailer Training</option>
                            <option value="">Forklift Training</option>
                            <option value="">JCB Training</option>
                            <option value="">Excavator Training</option>
                            <option value="">Motor Mechanic</option>
                            <option value="">Video Editing</option>
                            <option>Plumber & Drainage</option>
                            <option>Electrician</option>
                            <option>Welding</option>
                        </select>

                        <input type="text" placeholder="Enter Roll Number">

                        <button type="submit">
                            <i class="fas fa-search"></i>
                            Search
                        </button>

                    </form>

                </div>


                <!-- Show after search -->

                <div class="result-card mt-5" id="resultSection" style="display:none;">

                    <div class="verified">
                        <i class="fas fa-check-circle"></i>
                        Certificate Verified Successfully
                    </div>

                    <div class="row p-4">

                        <div class="col-lg-6 mb-5">
                            <h4 class="text-center mb-3">Diploma Certificate</h4>

                            <img src="{{ asset('assets/img/result/certificate.jpeg') }}"
                                class="img-fluid border rounded shadow">
                        </div>

                        <div class="col-lg-6">
                            <h4 class="text-center mb-3">Result / Marksheet</h4>

                            <img src="{{ asset('assets/img/result/marksheet.jpeg') }}"
                                class="img-fluid border rounded shadow">
                        </div>

                    </div>

                    <div class="text-center pb-4">

                        <a href="{{ asset('assets/img/result/certificate.jpeg') }}" download class="btn btn-primary me-2">
                            Download Certificate
                        </a>

                        <a href="{{ asset('assets/img/result/marksheet.jpeg') }}" download class="btn btn-warning me-2">
                            Download Marksheet
                        </a>

                        {{-- <button onclick="window.print()" class="btn btn-success">
            Print
        </button> --}}

                    </div>

                </div>

            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

@endsection

<style>
    .result-area {
        padding: 80px 0;
        background: #f6f8fb;
    }

    .result-search-card {
        background: #fff;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, .08);
        margin-bottom: 40px;
    }

    .result-search-card h2 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: 700;
    }

    .result-form {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .result-form select,
    .result-form input {
        flex: 1;
        height: 55px;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 0 20px;
    }

    .result-form button {
        background: #00306e;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 0 35px;
        font-weight: 600;
    }

    .result-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .1);
    }

    .verified {
        background: #009933;
        color: #fff;
        text-align: center;
        padding: 15px;
        font-size: 18px;
        font-weight: 600;
    }

    .result-card h3 {
        text-align: center;
        padding: 30px 0;
        margin: 0;
        color: #00306e;
        font-size: 34px;
    }

    .student-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        padding: 40px;
    }

    .item {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 18px;
    }

    .item span {
        display: block;
        color: #888;
        font-size: 14px;
    }

    .item strong {
        font-size: 18px;
        color: #222;
    }

    .full {
        grid-column: 1/-1;
    }

    .result-btns {
        display: flex;
        justify-content: center;
        gap: 20px;
        padding: 35px;
    }

    .btn1 {
        background: #00306e;
        color: #fff;
        padding: 14px 30px;
        border-radius: 40px;
        text-decoration: none;
    }

    .btn2 {
        background: #f7a707;
        color: #fff;
        padding: 14px 30px;
        border-radius: 40px;
        text-decoration: none;
    }

    @media(max-width:768px) {

        .student-grid {
            grid-template-columns: 1fr;
        }

        .result-form {
            flex-direction: column;
        }

        .result-form button {
            height: 55px;
        }

    }
</style>
@push('scripts')
    <script>
        document.getElementById('resultForm').addEventListener('submit', function(e) {

            e.preventDefault();

            // Frontend only
            document.getElementById('resultSection').style.display = 'block';

            // Scroll to result
            document.getElementById('resultSection').scrollIntoView({
                behavior: 'smooth'
            });

        });
    </script>
@endpush

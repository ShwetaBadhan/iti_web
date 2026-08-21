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
                                    <a href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Our Results</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <section class="contact-area section-py-120">
            <div class="container">
                <div class="result-search-card">
                    <h2>Verify Your Result</h2>

                    <form id="resultForm" class="result-form">
                        <select id="courseSelect" required>
                            <option value="">Select Course</option>
                            <option value="Electrician">Electrician</option>
                            <option value="Plumber & Drainage">Plumber & Drainage</option>
                            <option value="Welding">Welding</option>
                            <option value="Motor Mechanic">Motor Mechanic</option>
                            <option value="Forklift Training">Forklift Training</option>
                            <option value="JCB Training">JCB Training</option>
                            <option value="Excavator Training">Excavator Training</option>
                            <option value="Truck Dispatch">Truck Dispatch</option>
                            <option value="Fire & Safety">Fire & Safety</option>
                            <option value="Trailer Training">Trailer Training</option>
                            <option value="Video Editing">Video Editing</option>
                        </select>

                        <input type="text" id="rollInput" placeholder="Enter Roll Number" required>

                        <button type="submit">
                            <i class="fas fa-search"></i>
                            Search
                        </button>
                    </form>

                    <!-- Error Message -->
                    <div id="errorMessage" class="alert alert-danger mt-3 text-center" style="display:none;">
                        <i class="fas fa-exclamation-circle"></i> No result found for this Course and Roll Number.
                    </div>
                </div>

<!-- Show after search -->
<div class="result-card mt-5" id="resultSection" style="display:none;">
    <div class="verified">
        <i class="fas fa-check-circle"></i>
        Certificate Verified Successfully
    </div>

    <div class="student-info p-4">
        <h3 class="text-center mb-4" style="color: #00306e; font-weight: 700;">Student Details</h3>
        <div class="student-grid">
            <div class="item">
                <span>Student Name</span>
                <strong id="studentName">-</strong>
            </div>
            <div class="item">
                <span>Father's Name</span>
                <strong id="fatherName">-</strong>
            </div>
            <div class="item">
                <span>Roll Number</span>
                <strong id="rollNumber">-</strong>
            </div>
            <div class="item">
                <span>Course</span>
                <strong id="courseName">-</strong>
            </div>
            <div class="item">
                <span>Session</span>
                <strong id="session">-</strong>
            </div>
            <div class="item">
                <span>Result Status</span>
                <strong id="status" style="color: #009933;">-</strong>
            </div>
        </div>
    </div>

    <!-- Images Container -->
    <div class="row p-4" id="imagesContainer">
        <!-- Dynamic images will be inserted here -->
    </div>

    <!-- Download Buttons -->
    <div class="text-center pb-4" id="downloadContainer">
        <!-- Dynamic download buttons will be inserted here -->
    </div>
</div>

            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

@endsection

<style>
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
        font-size: 16px;
    }

    .result-form button {
        background: #00306e;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 0 35px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
    }

    .result-form button:hover {
        background: #002050;
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

    .student-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        padding: 20px;
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
        margin-bottom: 5px;
    }

    .item strong {
        font-size: 18px;
        color: #222;
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
document.getElementById('resultForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    // 1. Get input values
    const selectedCourse = document.getElementById('courseSelect').value;
    const enteredRoll = document.getElementById('rollInput').value.trim().toUpperCase();
    
    // 2. Get DOM elements
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;
    const errorMessage = document.getElementById('errorMessage');
    const resultSection = document.getElementById('resultSection');
    const imagesContainer = document.getElementById('imagesContainer');
    const downloadContainer = document.getElementById('downloadContainer');

    // 3. UI Reset & Loading State
    errorMessage.style.display = 'none';
    resultSection.style.display = 'none';
    imagesContainer.innerHTML = '';
    downloadContainer.innerHTML = ''; // Ab hum buttons card ke andar hi dalenge
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Searching...';
    submitBtn.disabled = true;

    try {
        // 4. Fetch data from Laravel Backend
        const response = await fetch(`{{ route('search.result') }}?course=${encodeURIComponent(selectedCourse)}&roll_number=${encodeURIComponent(enteredRoll)}`);
        const data = await response.json();

        // 5. If found, populate and show
        if (data.found && data.data) {
            const student = data.data;
            
            document.getElementById('studentName').textContent = student.student_name;
            document.getElementById('fatherName').textContent = student.father_name || 'N/A';
            document.getElementById('rollNumber').textContent = student.roll_number;
            document.getElementById('courseName').textContent = student.course;
            document.getElementById('session').textContent = student.session || 'N/A';
            document.getElementById('status').textContent = student.status;

            const docs = student.documents || [];
            
            // Dynamic column width based on number of documents
            const colWidth = docs.length >= 2 ? 'col-lg-6' : 'col-lg-12';

            // Generate PDF/Image cards dynamically
            docs.forEach((doc, index) => {
                const isPdf = doc.src.toLowerCase().includes('.pdf');
                
                // Preview content: iframe for PDF, img for images
                let previewContent = '';
                if (isPdf) {
                    previewContent = `
                        <div class="border rounded shadow-sm bg-light mb-3" style="height: 350px; overflow: hidden;">
                            <iframe src="${doc.src}#toolbar=0" width="100%" height="100%" style="border: none;"></iframe>
                        </div>
                    `;
                } else {
                    previewContent = `
                        <img src="${doc.src}" class="img-fluid border rounded shadow mb-3" alt="${doc.type}" style="max-height: 350px; width: 100%; object-fit: contain; background: #fff;">
                    `;
                }

                // Create Document Card
                const docCard = document.createElement('div');
                docCard.className = `${colWidth} mb-4`;
                docCard.innerHTML = `
                    <h4 class="text-center mb-3" style="color: #00306e; font-weight: 600;">${doc.type}</h4>
                    ${previewContent}
                    <div class="d-flex justify-content-center gap-2">
                        <a href="${doc.src}" target="_blank" class="btn btn-outline-primary">
                            <i class="fas fa-eye"></i> View in New Tab
                        </a>
                        <a href="${doc.src}" download class="btn ${doc.btnClass || 'btn-primary'}">
                            <i class="fas fa-download"></i> ${doc.btnText || 'Download'}
                        </a>
                    </div>
                `;
                imagesContainer.appendChild(docCard);
            });

            // Show result section and scroll to it
            resultSection.style.display = 'block';
            setTimeout(() => {
                resultSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        } 
        // 6. If not found, show error
        else {
            errorMessage.style.display = 'block';
        }
    } catch (error) {
        console.error('Search Error:', error);
        errorMessage.innerHTML = '<i class="fas fa-exclamation-circle"></i> Server error. Please try again later.';
        errorMessage.style.display = 'block';
    } finally {
        // 7. Reset button state
        submitBtn.innerHTML = originalBtnText;
        submitBtn.disabled = false;
    }
});
</script>
@endpush
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 5 Certificate - {{ $student->name ?? 'Student' }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
       
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Georgia', serif;
            background: #ffffff;
            {{-- overflow: hidden;  --}}
        }

        .no-print {
            text-align: center;
            padding: 16px;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
        }

        .btn-download,
        .btn-back {
            padding: 10px 24px;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            display: inline-block;
            margin: 0 4px;
        }

        .btn-download {
            background: #198754;
        }

        .btn-back {
            background: #6c757d;
            text-decoration: none;
        }

        /* Exact A4 Landscape dimensions */
        .certificate-container {
            width: 1123px;
            height: 794px;
            margin: 0 auto;
            padding: 0 !important;
            position: relative;
            background-image: url('{{ asset('storage/' . ($settings->form5_certificate ?? '')) }}');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
            overflow: hidden;
        }

        .overlay-text {
            position: absolute;
            color: #000;
            font-family: 'Georgia', serif;
            font-weight: bold;
        }

      
        .student-name {
            top: 51%;
            left: 29%;
            transform: translateX(-50%);
            text-align: center;
            white-space: nowrap;
            font-size: 20px;
        }

        .student-photo {
            top: 21%;
            right: 1%;
            transform: translateX(-50%);
            width: 128px;
            height: 165px;
            overflow: hidden;
            background: #f0f0f0;
        }

        .student-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .father-name {
            top: 51%;
            left: 75%;
            transform: translateX(-50%);
            font-size: 20px;
        }

        .dob {
            top: 46%;
            right: 9%;
            font-size: 18px;
        }

        .course {
            top: 61%;
            left: 22%;
            transform: translateX(-50%);
            font-size: 20px;
        }

        .cert-number {
            top: 46%;
            left: 14%;
            font-size: 18px;
        }

        .from-date {
            top: 61%;
            left: 57%;
            font-size: 20px;
        }

        .to-date {
            top: 61%;
            right: 10%;
            font-size: 20px;
        }

        .success {
            top: 71%;
            left: 29%;
            font-size: 20px;
        }

        .state {
            top: 56%;
            left: 52%;
            font-size: 20px;
        }

        .district {
            top: 56%;
            left: 18%;
            font-size: 20px;
        }

        .grade {
            top: 71%;
            right: 15%;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="no-print">
        <button class="btn-download" onclick="downloadPDF()">
            <i class="ri-download-line"></i> Download as PDF
        </button>
        <a href="{{ route('certificates.index') }}" class="btn-back">Back</a>
    </div>

    <div id="certificate-content">
        <div class="certificate-container">
            <div class="overlay-text student-name">{{ $student->name ?? 'Student Name' }}</div>
            <div class="overlay-text student-photo">
                @if ($student->photo)
                    <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo" class="student-img">
                @else
                    <div class="no-photo-placeholder">No Photo</div>
                @endif
            </div>
            <div class="overlay-text father-name">{{ $student->father_name ?? 'Father Name' }}</div>
            <div class="overlay-text dob">{{ $student->dob ? $student->dob->format('d M, Y') : '01 Jan 2000' }}</div>
            <div class="overlay-text course">{{ $student->course ?? 'Course Name' }}</div>
            <div class="overlay-text state">{{ $student->state ?? '' }}</div>
            <div class="overlay-text district">{{ $student->district ?? '' }}</div>
            <div class="overlay-text success">Successfully</div>
            <div class="overlay-text grade">A<sup style="font-size: 0.6em; vertical-align: super;">+</sup></div>
            <div class="overlay-text cert-number">{{ $student->roll_number ?? 'F5-001' }}</div>
            <div class="overlay-text from-date">
                {{ $student->course_from_date ? $student->course_from_date->format('d M, Y') : '' }}</div>
            <div class="overlay-text to-date">
                {{ $student->course_to_date ? $student->course_to_date->format('d M, Y') : '' }}</div>
        </div>
    </div>

    <script>
        function downloadPDF() {
            const element = document.getElementById('certificate-content');

            const opt = {
                margin: 0,
                filename: 'Form5_Certificate_{{ str_replace(' ', '_', $student->name) }}.pdf',
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 2,
                    useCORS: true,
                    allowTaint: true,
                    backgroundColor: '#ffffff',
                    scrollX: 0,
                    scrollY: 0,
                    windowWidth: document.documentElement.scrollWidth, // Dynamic width
                    windowHeight: document.documentElement.scrollHeight // Dynamic height
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'landscape',
                    compress: true
                },
                pagebreak: {
                    mode: 'avoid-all'
                }
            };

            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>

</html>

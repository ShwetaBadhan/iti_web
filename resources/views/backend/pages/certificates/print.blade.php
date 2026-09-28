<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $type === 'form5' ? 'Form 5' : 'Course' }} Certificate - {{ $student->name }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Georgia', serif;
            background: #ffffff;
            overflow-x: hidden;
        }

        .no-print { 
            text-align: center; 
            padding: 16px; 
            background: #fff; 
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .btn-download, .btn-back { 
            padding: 10px 24px; 
            border: none; 
            border-radius: 6px; 
            cursor: pointer; 
            font-size: 14px; 
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin: 0 4px;
        }
        .btn-download { background: #198754; color: white; }
        .btn-download:hover { background: #146c43; }
        .btn-back { background: #6c757d; color: white; }
        .btn-back:hover { background: #5c636a; }

        /* Certificate Container - A4 Landscape */
        .certificate-container {
            width: 1123px;
            height: 794px;
            margin: 0 auto;
            position: relative;
            background-image: url('{{ asset('storage/' . $template) }}');
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
            text-align: center;
        }

        .student-name {
            top: 64%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 35px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .roll-number { 
            top: 29%; 
            left: 84%; 
            font-size: 20px; 
            text-align: left;
            width: 200px;
        }

        .course-name {
            top: 38%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 3.2rem;
            width: 400px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 100;
        }

        .issue-date { 
            top: 84%; 
            left: 9%; 
            font-size: 20px; 
            text-align: right;
            width: 200px;
        }

        @media print {
            .no-print { display: none !important; }
            body { background: white; margin: 0; padding: 0; }
            .certificate-container {
                margin: 0;
                box-shadow: none;
                width: 100vw;
                height: 100vh;
            }
            @page { 
                size: A4 landscape; 
                margin: 0; 
            }
        }
    </style>
</head>
<body>

    <!-- Control Buttons -->
    <div class="no-print">
        <button class="btn-download" onclick="downloadPDF()">
            <!-- Download SVG Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Download as PDF
        </button>
        <a href="{{ route('certificates.index') }}" class="btn-back">
            <!-- Arrow Left SVG Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Back to List
        </a>
    </div>

    <!-- Certificate -->
    <div id="certificate-content">
        <div class="certificate-container">
            <div class="overlay-text student-name">{{ $student->name }}</div>
            <div class="overlay-text roll-number">{{ $student->roll_number }}</div>
            <div class="overlay-text course-name">{{ $student->course }}</div>
            <div class="overlay-text issue-date">
                {{ $student->course_to_date ? $student->course_to_date->format('d F, Y') : '' }}
            </div>
        </div>
    </div>

    <script>
        function downloadPDF() {
            const element = document.getElementById('certificate-content');
            const opt = {
                margin: 0,
                filename: 'Certificate_{{ str_replace(" ", "_", $student->name) }}.pdf',
                image: { type: 'jpeg', quality: 1 },
                html2canvas: {
                    scale: 2,
                    useCORS: true,
                    allowTaint: true,
                    backgroundColor: '#ffffff',
                    scrollX: 0,
                    scrollY: 0,
                    windowWidth: document.documentElement.scrollWidth,
                    windowHeight: document.documentElement.scrollHeight
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'landscape',
                    compress: true
                },
                pagebreak: { mode: 'avoid-all' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>
</html>
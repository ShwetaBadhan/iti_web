<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $type === 'form5' ? 'Form 5' : 'Course' }} Certificate - {{ $student->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Segoe UI', Tahoma, sans-serif; 
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
            gap: 6px;
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
            top: 63%; 
            left: 50%; 
            transform: translateX(-50%); 
            font-size: 28px; 
            letter-spacing: 2px;
        }
        .father-name { 
            top: 50%; 
            left: 50%; 
            transform: translateX(-50%); 
            font-size: 20px; 
        }
        .roll-number { 
            top: 29%; 
            left: 84%; 
            font-size: 18px; 
            text-align: left;
            width: 200px;
        }
        .course-name { 
            top: 38%; 
            left: 50%; 
            transform: translateX(-50%); 
            font-size: 2.8rem; 
            width: 400px;
            color: #fff;
        }
        .issue-date { 
            top: 84%; 
            left: 10%; 
            font-size: 18px; 
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
            <i class="ri-download-line"></i> Download as PDF
        </button>
        <a href="{{ route('certificates.index') }}" class="btn-back">
            <i class="ri-arrow-left-line"></i> Back to List
        </a>
    </div>

    <!-- Certificate -->
    <div id="certificate-content">
        <div class="certificate-container">
            <div class="overlay-text student-name">{{ $student->name }}</div>
            
            @if($student->father_name)
                <div class="overlay-text father-name">{{ $student->father_name }}</div>
            @endif
            
            <div class="overlay-text roll-number">{{ $student->roll_number }}</div>
            
            <div class="overlay-text course-name">{{ $student->course }}</div>
            
            <div class="overlay-text issue-date">
                {{ now()->format('d M, Y') }}
            </div>
        </div>
    </div>

    <script>
        function downloadPDF() {
            const element = document.getElementById('certificate-content');
            
            const opt = {
                margin: 0,
                filename: 'Certificate_{{ str_replace(" ", "_", $student->name) }}.pdf',
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
@php
    // 🎨 Background template fetch
    $setting = \App\Models\GeneralSetting::first();
    $bgTemplate = $setting && !empty($setting->admission_form_template) ? $setting->admission_form_template : '';
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form - {{ $student->name }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f3f4f6;
            color: #333;
            overflow-x: hidden;
        }

        .no-print {
            text-align: center;
            padding: 16px;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .btn-download,
        .btn-back {
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

        .btn-download {
            background: #198754;
            color: white;
        }

        .btn-download:hover {
            background: #146c43;
        }

        .btn-back {
            background: #6c757d;
            color: white;
        }

        .btn-back:hover {
            background: #5c636a;
        }

        /* A4 Portrait */
        .form-container {
            width: 794px;
            height: 1123px;
            margin: 0 auto;
            position: relative;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
            overflow: hidden;
        }

        .bg-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;

            @if ($bgTemplate)
                background-image: url('{{ asset('storage/' . $bgTemplate) }}');
            @endif
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
        }

        .content-wrapper {
            position: relative;
            z-index: 1;
            padding: 0;
        }

        /* Text Fields Positioning - Based on your template */
        .field {
            position: absolute;
            font-size: 13px;
            font-weight: 500;
            color: #1e293b;
            padding: 2px 6px;
            border: none;
            background: transparent;
        }

        /* Personal Information Section */
        .field-full-name {
            top: 282px;
            left: 45px;
            width: 240px;
        }

        .field-roll-number {
            top: 282px;
            left: 273px;
            width: 180px;
        }

        .field-course {
            top: 282px;
            left: 448px;
            width: 220px;
        }

        .field-course-start {
            top: 350px;
            left: 45px;
            width: 240px;
        }

        .field-course-end {
            top: 350px;
            left: 252px;
            width: 240px;
        }

        .field-fee-status {
            top: 350px;
            left: 456px;
            width: 160px;
        }

        .field-gender {
            top: 419px;
            left: 45px;
            width: 240px;
        }

        .field-dob {
            top: 419px;
            left: 251px;
            width: 240px;
        }

        .field-phone {
            top: 419px;
            left: 456px;
            width: 160px;
        }

        .field-father-name {
            top: 486px;
            left: 45px;
            width: 300px;
        }

        .field-state {
            top: 486px;
            left: 292px;
            width: 180px;
        }

        .field-district {
            top: 486px;
            left: 529px;
            width: 160px;
        }

        .field-guardian-address {
            top: 552px;
            left: 45px;
            width: 690px;
        }

        .field-status {
            top: 622px;
            left: 45px;
            width: 240px;
        }

        /* Student Photo */
        .student-photo {
            position: absolute;
            top: 255px;
            right: 35px;
            width: 102px;
            height: 138px;
            {{-- border: 1px solid #ddd; --}}
            display: flex;
            align-items: center;
            justify-content: center;
            {{-- background: #f8f9fa; --}}
            overflow: hidden;
        }

        .student-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Course Details Section */
        .field-course-name {
            top: 735px;
            left: 45px;
            width: 400px;
        }

        .field-course-duration {
            top: 735px;
            left: 423px;
            width: 220px;
        }

        .field-course-start-date {
            top: 799px;
            left: 45px;
            width: 400px;
        }

        .field-course-end-date {
            top: 799px;
            left: 423px;
            width: 220px;
        }

        /* Additional Information */
        .field-remarks {
            top: 880px;
            left: 45px;
            width: 690px;
            min-height: 60px;
            text-align: left;
            vertical-align: top;
        }

        /* Academic Session */
        .field-academic-session {
            top: 215px;
            right: 60px;
            width: 200px;
            text-align: right;
        }

        /* Date formatting */
        .date-field {
            font-family: 'Arial', sans-serif;
            font-size: 13px;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: white;
                margin: 0;
                padding: 0;
            }

            .form-container {
                margin: 0;
                box-shadow: none;
                width: 100%;
                min-height: 100vh;
            }

            @page {
                size: A4 portrait;
                margin: 0;
            }
        }
    </style>
</head>

<body>

    <div class="no-print">
        <button class="btn-download" onclick="downloadPDF()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                <polyline points="7 10 12 15 17 10" />
                <line x1="12" y1="15" x2="12" y2="3" />
            </svg>
            Download as PDF
        </button>
        <a href="{{ route('students.index') }}" class="btn-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
            Back to List
        </a>
    </div>

    <div id="form-content">
        <div class="form-container">
            <div class="bg-layer"></div>

            <div class="content-wrapper">

                {{-- Student Photo --}}
                <div class="student-photo">
                    @if ($student->photo)
                        <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo">
                    @endif
                </div>

                {{-- Academic Session --}}
                <div class="field field-academic-session">
                    {{ $student->academic_year ?? '__________' }}
                </div>

                {{-- 1. PERSONAL INFORMATION --}}
                <div class="field field-full-name">
                    {{ $student->name }}
                </div>

                <div class="field field-roll-number">
                    {{ $student->roll_number }}
                </div>

                <div class="field field-course">
                    {{ $student->course }}
                </div>

                <div class="field field-course-start date-field">
                    {{ $student->course_from_date ? \Carbon\Carbon::parse($student->course_from_date)->format('d/m/Y') : '' }}
                </div>

                <div class="field field-course-end date-field">
                    {{ $student->course_to_date ? \Carbon\Carbon::parse($student->course_to_date)->format('d/m/Y') : '' }}
                </div>

                <div class="field field-fee-status">
                    {{ ucfirst(str_replace('_', ' ', $student->fee_status ?? '')) }}
                </div>

                <div class="field field-gender">
                    {{ ucfirst($student->gender ?? '') }}
                </div>

                <div class="field field-dob date-field">
                    {{ $student->dob ? \Carbon\Carbon::parse($student->dob)->format('d/m/Y') : '' }}
                </div>

                <div class="field field-phone">
                    {{ $student->phone }}
                </div>

                <div class="field field-father-name">
                    {{ $student->father_name }}
                </div>

                <div class="field field-state">
                    {{ $student->state }}
                </div>

                <div class="field field-district">
                    {{ $student->district }}
                </div>

                <div class="field field-guardian-address">
                    {{ $student->guardian_address }}
                </div>

                <div class="field field-status">
                    {{ $student->status ? 'Active' : 'Inactive' }}
                </div>

                {{-- 2. COURSE DETAILS --}}
                <div class="field field-course-name">
                    {{ $student->course }}
                </div>

               {{-- ✅ DAYS CALCULATION HERE --}}
                <div class="field field-course-duration">
                    @if ($student->course_from_date && $student->course_to_date)
                        @php
                            $from = \Carbon\Carbon::parse($student->course_from_date);
                            $to = \Carbon\Carbon::parse($student->course_to_date);
                            $days = $from->diffInDays($to);
                        @endphp
                        {{ $days }} Days
                    @endif
                </div>

                <div class="field field-course-start-date date-field">
                    {{ $student->course_from_date ? \Carbon\Carbon::parse($student->course_from_date)->format('d/m/Y') : '' }}
                </div>

                <div class="field field-course-end-date date-field">
                    {{ $student->course_to_date ? \Carbon\Carbon::parse($student->course_to_date)->format('d/m/Y') : '' }}
                </div>

                {{-- 3. ADDITIONAL INFORMATION --}}
                <div class="field field-remarks">
                    {{ $student->remarks ?? '' }}
                </div>

            </div>
        </div>
    </div>

    <script>
        function downloadPDF() {
            const element = document.getElementById('form-content');
            const opt = {
                margin: 0,
                filename: 'Admission_Form_{{ str_replace(' ', '_', $student->roll_number) }}.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
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
                    orientation: 'portrait',
                    compress: true
                },
                pagebreak: {
                    mode: 'avoid-all'
                }
            };

            const btn = document.querySelector('.btn-download');
            const originalText = btn.innerHTML;
            btn.innerHTML = 'Generating PDF...';
            btn.disabled = true;

            html2pdf().set(opt).from(element).save().then(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }
    </script>
</body>

</html>

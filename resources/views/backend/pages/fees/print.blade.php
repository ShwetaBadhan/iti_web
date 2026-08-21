<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Receipt - {{ $receipt->receipt_no }}</title>
    
    <!-- html2pdf Library for direct PDF download -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        body { font-family: 'Segoe UI', Tahoma, sans-serif; background: #f4f6f9; margin: 0; padding: 20px; }
        .no-print { text-align: center; margin-bottom: 20px; }
        .btn { padding: 10px 20px; color: white; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; display: inline-block; margin: 0 5px; font-size: 14px; }
        .btn-download { background: #28a745; }
        .btn-print { background: #0d6efd; }
        .btn-back { background: #6c757d; }
        
        .receipt-container {
            width: 210mm; /* A4 Width */
            min-height: 148mm; 
            margin: 0 auto;
            background: white;
            padding: 30px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            position: relative;
            box-sizing: border-box;
        }
        .header { text-align: center; border-bottom: 2px solid #00306e; padding-bottom: 15px; margin-bottom: 20px; }
        .header h2 { margin: 0; color: #00306e; text-transform: uppercase; }
        .header p { margin: 5px 0 0; color: #666; font-size: 14px; }
        
        .receipt-meta { display: flex; justify-content: space-between; margin-bottom: 20px; font-size: 14px; }
        .receipt-meta strong { color: #00306e; }
        
        .student-info { background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        .student-info table { width: 100%; border-collapse: collapse; }
        .student-info td { padding: 8px 0; font-size: 14px; }
        .student-info td:first-child { font-weight: 600; width: 150px; color: #555; }
        
        .fee-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .fee-table th, .fee-table td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .fee-table th { background: #00306e; color: white; }
        .fee-table .total-row { font-weight: bold; background: #f8f9fa; }
        
        .footer { margin-top: 40px; display: flex; justify-content: space-between; align-items: flex-end; }
        .signature { text-align: center; border-top: 1px solid #333; padding-top: 5px; width: 200px; font-size: 14px; }

        @media print {
            .no-print { display: none !important; }
            body { background: white; padding: 0; }
            .receipt-container { border: none; box-shadow: none; width: 100%; margin: 0; }
            @page { size: A4 portrait; margin: 10mm; }
        }
    </style>
</head>
<body>
    <!-- Control Buttons -->
    <div class="no-print">
        <button class="btn btn-download" onclick="downloadPDF()">
            <i class="ri-download-line"></i> Download PDF
        </button>
        <button class="btn btn-print" onclick="window.print()">
            <i class="ri-printer-line"></i> Print Receipt
        </button>
        <a href="{{ route('fees.index') }}" class="btn btn-back">
            <i class="ri-arrow-left-line"></i> Back to List
        </a>
    </div>

    <!-- Receipt Content (Wrapped in ID for PDF capture) -->
    <div id="receipt-content">
        <div class="receipt-container">
            <div class="header">
                <h2>{{ $settings->site_name ?? 'DR. BR AMBEDKAR ITI' }}</h2>
                <p>{{ $settings->address ?? 'Jalandhar, Punjab' }} | Phone: {{ $settings->phone ?? 'N/A' }}</p>
                <h3 style="margin-top: 15px; color: #d63384; letter-spacing: 2px;">FEE RECEIPT</h3>
            </div>

            <div class="receipt-meta">
                <div>Receipt No: <strong>{{ $receipt->receipt_no }}</strong></div>
                <div>Date: <strong>{{ \Carbon\Carbon::parse($receipt->payment_date)->format('d M, Y') }}</strong></div>
            </div>

            <div class="student-info">
                <table>
                    <tr>
                        <td>Student Name:</td>
                        <td><strong>{{ $receipt->student->name }}</strong></td>
                        <td>Roll Number:</td>
                        <td><strong>{{ $receipt->student->roll_number }}</strong></td>
                    </tr>
                    <tr>
                        <td>Course:</td>
                        <td><strong>{{ $receipt->student->course }}</strong></td>
                        <td>Father's Name:</td>
                        <td><strong>{{ $receipt->student->father_name ?? 'N/A' }}</strong></td>
                    </tr>
                </table>
            </div>

            <table class="fee-table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th style="text-align: right;">Total Fees</th>
                        <th style="text-align: right;">Amount Paid</th>
                        <th style="text-align: right;">Pending Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ $receipt->student->course }} Course Fees 
                            @if($receipt->remarks) <br><small style="color: #666;">({{ $receipt->remarks }})</small> @endif
                            <br><small>Mode: {{ $receipt->payment_mode }}</small>
                        </td>
                        <td style="text-align: right;">₹{{ number_format($receipt->total_fees, 2) }}</td>
                        <td style="text-align: right; color: green;">{{ number_format($receipt->paid_amount, 2) }}</td>
                        <td style="text-align: right; color: red;">₹{{ number_format($receipt->pending_amount, 2) }}</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="3" style="text-align: right;">Amount in Words:</td>
                        <td style="text-align: right; font-style: italic;">
                            <!-- Fallback used to prevent errors if NumberToWords helper is missing -->
                            ₹{{ number_format($receipt->paid_amount, 2) }} Only
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="footer">
                <div style="font-size: 12px; color: #666;">
                    * This is a computer-generated receipt and does not require a physical signature.
                </div>
                <div class="signature">
                    Authorized Signatory
                </div>
            </div>
        </div>
    </div>

    <script>
        function downloadPDF() {
            const element = document.getElementById('receipt-content');
            
            const opt = {
                margin: 0,
                filename: 'Fee_Receipt_{{ str_replace(" ", "_", $receipt->receipt_no) }}.pdf',
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
                   windowWidth: document.documentElement.scrollWidth, // Dynamic width
                    windowHeight: document.documentElement.scrollHeight // Dynamic height
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait', // Changed to portrait to match 210mm width
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
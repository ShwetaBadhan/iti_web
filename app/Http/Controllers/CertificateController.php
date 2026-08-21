<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display list of students eligible for certificate (only paid fee students)
     */
    public function index(Request $request)
    {
        $query = Student::where('fee_status', 'paid');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('roll_number', 'like', "%{$search}%")
                  ->orWhere('course', 'like', "%{$search}%");
            });
        }

        $students = $query->latest()->paginate(10);
        $settings = GeneralSetting::first();

        return view('backend.pages.certificates.index', compact('students', 'settings'));
    }

    /**
     * Generate and show the certificate for a specific student
     */
    public function generate($id, $type)
    {
        $student = Student::findOrFail($id);

        // STRICT CHECK: Only paid students can get certificates
        if ($student->fee_status !== 'paid') {
            return redirect()->route('certificates.index')
                ->with('error', 'Certificates can be generated only for students who have paid the fees.');
        }

        $settings = GeneralSetting::first();

        // Select template based on type
        $template = ($type === 'form5') 
            ? $settings->form5_certificate 
            : $settings->sample_certificate;

        if (!$template) {
            return redirect()->route('certificates.index')
                ->with('error', 'The certificate template is not uploaded in the general settings.');
        }

        return view('backend.pages.certificates.print', compact('student', 'template', 'type', 'settings'));
    }




/**
 * Generate and show Form 5 Certificate for a specific student
 */
public function generateForm5($id)
{
  
    $student = Student::findOrFail($id);

   
    if ($student->fee_status !== 'paid') {
        return redirect()->route('certificates.index')
            ->with('error', 'The Form 5 certificate can be generated only for students who have paid the fees.');
    }

    // 3. Settings se Form 5 template 
    $settings = GeneralSetting::first();
    $template = $settings->form5_certificate;

    // 4. Check 
    if (!$template) {
        return redirect()->route('certificates.index')
            ->with('error', 'The Form 5 template is not uploaded in the general settings.');
    }

    // 5. Print view 
    return view('backend.pages.certificates.form5-print', compact('student', 'template', 'settings'));
}
}
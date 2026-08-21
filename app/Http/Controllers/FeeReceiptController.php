<?php
namespace App\Http\Controllers;

use App\Models\FeeReceipt;
use App\Models\Student;
use Illuminate\Http\Request;

class FeeReceiptController extends Controller
{
      public function index()
    {
        $receipts = FeeReceipt::with('student')->latest()->paginate(15);
        
       
        $students = Student::where('status', true)->orderBy('name')->get(); 
        
        return view('backend.pages.fees.index', compact('receipts', 'students'));
    }

    public function create()
    {
       
        $students = Student::where('status', true)->orderBy('name')->get();
        return view('backend.pages.fees.create', compact('students'));
    }

    public function getStudentDetails($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                'name' => $student->name,
                'roll_number' => $student->roll_number,
                'course' => $student->course,
                'father_name' => $student->father_name
            ]);
        }
        return response()->json(null, 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'total_fees' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'payment_mode' => 'required|in:Cash,UPI,Bank Transfer,Card',
            'payment_date' => 'required|date',
            'remarks' => 'nullable|string|max:255',
        ]);

        // Auto-calculate pending amount
        $validated['pending_amount'] = max(0, $validated['total_fees'] - $validated['paid_amount']);
        
        // Generate Unique Receipt No: REC-YYYYMMDD-Random
        $validated['receipt_no'] = 'REC-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

        $receipt = FeeReceipt::create($validated);

        // Optional: Update student fee status if fully paid
        if ($validated['pending_amount'] == 0) {
            Student::where('id', $validated['student_id'])->update(['fee_status' => 'paid']);
        } else {
            Student::where('id', $validated['student_id'])->update(['fee_status' => 'partially_paid']);
        }

        return redirect()->route('fees.print', $receipt->id)->with('success', 'Fee Receipt generated successfully!');
    }

    public function print($id)
    {
        $receipt = FeeReceipt::with('student')->findOrFail($id);
        return view('backend.pages.fees.print', compact('receipt'));
    }
        public function update(Request $request, FeeReceipt $receipt)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'total_fees' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'payment_mode' => 'required|in:Cash,UPI,Bank Transfer,Card',
            'payment_date' => 'required|date',
            'remarks' => 'nullable|string|max:255',
        ]);

        // Auto-calculate pending amount
        $validated['pending_amount'] = max(0, $validated['total_fees'] - $validated['paid_amount']);

        $receipt->update($validated);

        // Update student fee status
        if ($validated['pending_amount'] == 0) {
            Student::where('id', $validated['student_id'])->update(['fee_status' => 'paid']);
        } else {
            Student::where('id', $validated['student_id'])->update(['fee_status' => 'partially_paid']);
        }

        return redirect()->route('fees.index')->with('success', 'Fee Receipt updated successfully!');
    }

    public function destroy(FeeReceipt $receipt)
    {
        $receipt->delete();
        return redirect()->route('fees.index')->with('success', 'Fee Receipt deleted successfully!');
    }
}
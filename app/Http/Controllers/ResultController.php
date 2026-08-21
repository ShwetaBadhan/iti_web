<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with('student')->latest()->get();
        $students = Student::where('status', true)->orderBy('name')->get(); 
        return view('backend.pages.results.index', compact('results', 'students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id|unique:results,student_id',
            'marksheet' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'certificate_regular' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'certificate_form5' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'status' => 'required|boolean',
        ]);

        $student = Student::find($validated['student_id']);
        $validated['roll_number'] = $student->roll_number;
        $validated['course'] = $student->course;

        if ($request->hasFile('marksheet')) {
            $file = $request->file('marksheet');
            $validated['marksheet'] = $file->storeAs('results', time() . '_mark_' . Str::random(5) . '.' . $file->getClientOriginalExtension(), 'public');
        }

        if ($request->hasFile('certificate_regular')) {
            $file = $request->file('certificate_regular');
            $validated['certificate_regular'] = $file->storeAs('results', time() . '_cert_reg_' . Str::random(5) . '.' . $file->getClientOriginalExtension(), 'public');
        }

        if ($request->hasFile('certificate_form5')) {
            $file = $request->file('certificate_form5');
            $validated['certificate_form5'] = $file->storeAs('results', time() . '_cert_f5_' . Str::random(5) . '.' . $file->getClientOriginalExtension(), 'public');
        }

        Result::create($validated);
        return redirect()->route('results.index')->with('success', 'Result added successfully!');
    }

    public function update(Request $request, Result $result)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id|unique:results,student_id,' . $result->id,
            'marksheet' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'certificate_regular' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'certificate_form5' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'status' => 'required|boolean',
        ]);

        $student = Student::find($validated['student_id']);
        $validated['roll_number'] = $student->roll_number;
        $validated['course'] = $student->course;

        if ($request->hasFile('marksheet')) {
            if ($result->marksheet && Storage::exists('public/' . $result->marksheet)) Storage::delete('public/' . $result->marksheet);
            $file = $request->file('marksheet');
            $validated['marksheet'] = $file->storeAs('results', time() . '_mark_' . Str::random(5) . '.' . $file->getClientOriginalExtension(), 'public');
        }

        if ($request->hasFile('certificate_regular')) {
            if ($result->certificate_regular && Storage::exists('public/' . $result->certificate_regular)) Storage::delete('public/' . $result->certificate_regular);
            $file = $request->file('certificate_regular');
            $validated['certificate_regular'] = $file->storeAs('results', time() . '_cert_reg_' . Str::random(5) . '.' . $file->getClientOriginalExtension(), 'public');
        }

        if ($request->hasFile('certificate_form5')) {
            if ($result->certificate_form5 && Storage::exists('public/' . $result->certificate_form5)) Storage::delete('public/' . $result->certificate_form5);
            $file = $request->file('certificate_form5');
            $validated['certificate_form5'] = $file->storeAs('results', time() . '_cert_f5_' . Str::random(5) . '.' . $file->getClientOriginalExtension(), 'public');
        }

        $result->update($validated);
        return redirect()->route('results.index')->with('success', 'Result updated successfully!');
    }

    public function destroy(Result $result)
    {
        $result->delete();
        return redirect()->route('results.index')->with('success', 'Result deleted successfully!');
    }

    public function toggleStatus(Result $result)
    {
        $result->update(['status' => !$result->status]);
        return redirect()->route('results.index')->with('success', 'Status updated!');
    }
    public function searchResult(Request $request)
{
    $request->validate([
        'course' => 'required|string',
        'roll_number' => 'required|string',
    ]);


    $result = Result::where('course', $request->course)
                    ->where('roll_number', strtoupper($request->roll_number))
                    ->where('status', true) 
                    ->with('student')
                    ->first();

  
    if (!$result || !$result->student) {
        return response()->json(['found' => false]);
    }

  
    $documents = [];

    if ($result->marksheet) {
        $documents[] = [
            'type' => 'Marksheet',
            'src' => asset('storage/' . $result->marksheet),
            'btnText' => 'Download Marksheet',
            'btnClass' => 'btn-info'
        ];
    }

    if ($result->certificate_regular) {
        $documents[] = [
            'type' => 'Regular Certificate',
            'src' => asset('storage/' . $result->certificate_regular),
            'btnText' => 'Download Regular Certificate',
            'btnClass' => 'btn-primary'
        ];
    }

    if ($result->certificate_form5) {
        $documents[] = [
            'type' => 'Form 5 Certificate',
            'src' => asset('storage/' . $result->certificate_form5),
            'btnText' => 'Download Form 5 Certificate',
            'btnClass' => 'btn-success'
        ];
    }


    return response()->json([
        'found' => true,
        'data' => [
            'student_name' => $result->student->name,
            'father_name' => $result->student->father_name ?? 'N/A',
            'roll_number' => $result->roll_number,
            'course' => $result->course,
            'session' => $result->student->academic_year ?? 'N/A', 
            'status' => 'PASS', 
            'documents' => $documents
        ]
    ]);
}
}
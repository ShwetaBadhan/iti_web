<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    private function getCourseInitial($course)
    {
        $map = [
            'Truck Dispatch' => 'T',
            'Fire & Safety' => 'FS',
            'Trailer Training' => 'TR',
            'Forklift Training' => 'F',
            'JCB Training' => 'J',
            'Excavator Training' => 'EX',
            'Motor Mechanic' => 'M',
            'Video Editing' => 'V',
            'Car Driving' => 'C',
        ];
        return $map[$course] ?? 'XX';
    }

    private function generateRollNumber($course)
    {
        $initial = $this->getCourseInitial($course);
        $year = date('y'); // Current year last 2 digits (e.g., 26)
        $prefix = $year . $initial . ' ';

        // Find the last auto-generated roll number for this specific course and year
        // This prevents manual roll numbers from breaking the auto-increment logic
        $lastStudent = Student::where('roll_number', 'LIKE', $prefix . '%')
            ->orderBy('id', 'desc')
            ->first();

        $nextSerial = 1;
        if ($lastStudent && $lastStudent->roll_number) {
            $parts = explode(' ', trim($lastStudent->roll_number));
            $lastSerial = intval(end($parts));
            $nextSerial = $lastSerial + 1;
        }

        return $prefix . $nextSerial;
    }

    public function index()
    {
        $students = Student::latest()->get();
        return view('backend.pages.students.index', compact('students'));
    }

    public function create()
    {
        return view('backend.pages.students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'roll_number' => 'nullable|string|max:50|unique:students,roll_number',
            'name' => 'required|string|max:255',
            'course' => 'required|string',
            'academic_year' => 'nullable|string',
            'gender' => 'nullable|in:Male,Female',
            'dob' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'father_name' => 'nullable|string|max:255',
            'guardian_address' => 'nullable|string',
            'status' => 'required|boolean',
            'course_from_date' => 'nullable|date',
            'course_to_date' => 'nullable|date|after_or_equal:course_from_date',
            'fee_status' => 'nullable|in:unpaid,partially_paid,paid',
            'state' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
        ]);

        // Auto-generate ONLY if the user left it empty
        if (empty($validated['roll_number'])) {
            $validated['roll_number'] = $this->generateRollNumber($validated['course']);
        }

        if ($request->hasFile('photo')) {
            $imageName = time() . '_' . Str::random(10) . '.' . $request->photo->getClientOriginalExtension();
            $validated['photo'] = $request->file('photo')->storeAs('students', $imageName, 'public');
        }

        Student::create($validated);
        
        return redirect()->route('students.index')->with('success', 'Student added successfully! Roll No: ' . $validated['roll_number']);
    }

    public function edit(Student $student)
    {
        return view('backend.pages.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'roll_number' => 'nullable|string|max:50|unique:students,roll_number,' . $student->id,
            'name' => 'required|string|max:255',
            'course' => 'required|string',
            'academic_year' => 'nullable|string',
            'gender' => 'nullable|in:Male,Female',
            'dob' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'father_name' => 'nullable|string|max:255',
            'guardian_address' => 'nullable|string',
            'status' => 'required|boolean',
            'course_from_date' => 'nullable|date',
            'course_to_date' => 'nullable|date|after_or_equal:course_from_date',
            'fee_status' => 'nullable|in:unpaid,partially_paid,paid',
            'state' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
        ]);

        // If roll number is cleared during edit, retain the existing one
        if (empty($validated['roll_number'])) {
            $validated['roll_number'] = $student->roll_number;
        }
        
        if ($request->hasFile('photo')) {
            if ($student->photo && Storage::exists('public/' . $student->photo)) {
                Storage::delete('public/' . $student->photo);
            }
            $imageName = time() . '_' . Str::random(10) . '.' . $request->photo->getClientOriginalExtension();
            $validated['photo'] = $request->file('photo')->storeAs('students', $imageName, 'public');
        }

        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
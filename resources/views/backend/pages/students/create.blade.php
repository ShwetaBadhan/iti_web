@extends('backend.layouts.master')
@section('content')
    <div class="dashboard-main-body">

        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div>
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Add New Student</h1>
                <div>
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard</a>
                    <span class="text-secondary-light">/ <a href="{{ route('students.index') }}">Students</a> / Add</span>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const errorList = @json($errors->all()).map(err => `<li>${err}</li>`).join('');
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: `<ul class="text-start mb-0">${errorList}</ul>`,
                        confirmButtonText: 'Got it',
                        confirmButtonColor: '#dc3545'
                    });
                });
            </script>
        @endif

        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="mt-24">
            @csrf
            <div class="row gy-3">
                <div class="col-lg-12">
                    <div class="shadow-1 radius-12 bg-base h-100 overflow-hidden">
                        <div
                            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
                            <h6 class="text-lg fw-semibold mb-0">Personal Info</h6>
                        </div>
                        <div class="card-body p-20">
                            <div class="row gy-3">
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Full Name
                                        <span class="text-danger-600">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        placeholder="Enter Full Name" required>
                                </div>

                                {{-- <div class="col-xxl-3 col-xl-4 col-sm-6">
                                <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Academic Year</label>
                                <select name="academic_year" class="form-control form-select">
                                    <option value="2025/2026" {{ old('academic_year') == '2025/2026' ? 'selected' : '' }}>2025/2026</option>
                                    <option value="2026/2027" {{ old('academic_year') == '2026/2027' ? 'selected' : '' }}>2026/2027</option>
                                    <option value="2027/2028" {{ old('academic_year') == '2027/2028' ? 'selected' : '' }}>2027/2028</option>
                                </select>
                            </div> --}}
{{-- Add this block right before the Course dropdown --}}
<div class="col-xxl-3 col-xl-4 col-sm-6">
    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Roll Number</label>
    <input type="text" name="roll_number" class="form-control" value="{{ old('roll_number') }}" placeholder="Leave empty to auto-generate">
    <small class="text-muted">Leave empty to auto-generate based on Course.</small>
</div>
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Course <span
                                            class="text-danger-600">*</span></label>
                                    <select name="course" class="form-control form-select" required>
                                        <option value="" disabled selected>Select a course</option>
                                        <option value="Truck Dispatch"
                                            {{ old('course') == 'Truck Dispatch' ? 'selected' : '' }}>Truck Dispatch
                                        </option>
                                        <option value="Fire & Safety"
                                            {{ old('course') == 'Fire & Safety' ? 'selected' : '' }}>Fire & Safety</option>
                                        <option value="HTV Trailer"
                                            {{ old('course') == 'HTV Trailer' ? 'selected' : '' }}>HTV Trailer
                                        </option>
                                        <option value="Forklift"
                                            {{ old('course') == 'Forklift' ? 'selected' : '' }}>Forklift
                                        </option>
                                        <option value="JCB"
                                            {{ old('course') == 'JCB' ? 'selected' : '' }}>JCB</option>
                                        <option value="Excavator"
                                            {{ old('course') == 'Excavator' ? 'selected' : '' }}>Excavator
                                        </option>
                                        <option value="Motor Mechanic"
                                            {{ old('course') == 'Motor Mechanic' ? 'selected' : '' }}>Motor Mechanic
                                        </option>
                                        <option value="Video Editing"
                                            {{ old('course') == 'Video Editing' ? 'selected' : '' }}>Video Editing</option>
                                        <option value="Car Driving" {{ old('course') == 'Car Driving' ? 'selected' : '' }}>
                                            Car Driving</option>
                                    </select>
                                    <small class="text-muted">Roll No will be auto-generated based on this.</small>
                                </div>

                                <div class="col-xxl-4 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Course Start
                                        Date</label>
                                    <input type="date" name="course_from_date" class="form-control"
                                        value="{{ old('course_from_date') }}">
                                </div>

                                <div class="col-xxl-4 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Course End
                                        Date</label>
                                    <input type="date" name="course_to_date" class="form-control"
                                        value="{{ old('course_to_date') }}">
                                </div>

                                <div class="col-xxl-4 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Fee
                                        Status</label>
                                    <select name="fee_status" class="form-control form-select">
                                        <option value="unpaid"
                                            {{ old('fee_status', 'unpaid') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                        <option value="partially_paid"
                                            {{ old('fee_status') == 'partially_paid' ? 'selected' : '' }}>Partially Paid
                                        </option>
                                        <option value="paid" {{ old('fee_status') == 'paid' ? 'selected' : '' }}>Paid
                                        </option>
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Gender</label>
                                    <select name="gender" class="form-control form-select">
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Date Of
                                        Birth</label>
                                    <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Phone Number
                                        <span class="text-danger-600">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                        placeholder="Enter Phone Number" required>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Student
                                        Photo</label>
                                    <input type="file" name="photo" class="form-control" accept="image/*">
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Father's
                                        Name</label>
                                    <input type="text" name="father_name" class="form-control"
                                        value="{{ old('father_name') }}" placeholder="Enter Father's Name">
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">State</label>
                                    <input type="text" name="state" class="form-control" value="{{ old('state') }}"
                                        placeholder="Enter State">
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label
                                        class="text-sm fw-semibold text-primary-light d-inline-block mb-8">District</label>
                                    <input type="text" name="district" class="form-control"
                                        value="{{ old('district') }}" placeholder="Enter District">
                                </div>
                                <div class="col-xl-12 col-sm-12">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Guardian
                                        Address</label>
                                    <input type="text" name="guardian_address" class="form-control"
                                        value="{{ old('guardian_address') }}" placeholder="Enter Guardian Address">
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label
                                        class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Status</label>
                                    <select name="status" class="form-control form-select">
                                        <option value="1"
                                            {{ old('status') === '1' || old('status') === null ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center gap-3 mt-8">
                        <a href="{{ route('students.index') }}"
                            class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-50 py-11 radius-8">Cancel</a>
                        <button type="submit"
                            class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8">Save
                            Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

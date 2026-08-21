@extends('backend.layouts.master')
@section('content')
    <div class="dashboard-main-body">

        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div>
                <h1 class="fw-semibold mb-4 h6 text-primary-light">Edit Student</h1>
                <div>
                    <a href="{{ route('dashboard') }}"
                        class="text-secondary-light hover-text-primary hover-underline">Dashboard</a>
                    <span class="text-secondary-light">/ <a href="{{ route('students.index') }}">Students</a> / Edit</span>
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

        <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data" class="mt-24">
            @csrf
            @method('PUT')
            <div class="row gy-3">
                <div class="col-lg-12">
                    <div class="shadow-1 radius-12 bg-base h-100 overflow-hidden">
                        <div
                            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
                            <h6 class="text-lg fw-semibold mb-0">Personal Info</h6>
                        </div>
                        <div class="card-body p-20">
                            <div class="row gy-3">

                                <!-- Full Name -->
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Full Name
                                        <span class="text-danger-600">*</span></label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $student->name) }}" placeholder="Enter Full Name" required>
                                </div>

                                <!-- Roll Number (Read Only) -->
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Roll Number
                                        (Auto)</label>
                                    <input type="text" class="form-control" value="{{ $student->roll_number }}"
                                        >
                                  
                                </div>

                                <!-- Academic Year -->
                                {{-- <div class="col-xxl-3 col-xl-4 col-sm-6">
                                <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Academic Year</label>
                                <select name="academic_year" class="form-control form-select">
                                    <option value="2025/2026" {{ old('academic_year', $student->academic_year) == '2025/2026' ? 'selected' : '' }}>2025/2026</option>
                                    <option value="2026/2027" {{ old('academic_year', $student->academic_year) == '2026/2027' ? 'selected' : '' }}>2026/2027</option>
                                    <option value="2027/2028" {{ old('academic_year', $student->academic_year) == '2027/2028' ? 'selected' : '' }}>2027/2028</option>
                                </select>
                            </div> --}}

                                <!-- Course -->
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Course <span
                                            class="text-danger-600">*</span></label>
                                    <select name="course" class="form-control form-select" required>
                                        <option value="" disabled>Select a course</option>
                                        <option value="Truck Dispatch"
                                            {{ old('course', $student->course) == 'Truck Dispatch' ? 'selected' : '' }}>
                                            Truck Dispatch</option>
                                        <option value="Fire & Safety"
                                            {{ old('course', $student->course) == 'Fire & Safety' ? 'selected' : '' }}>Fire
                                            & Safety</option>
                                        <option value="Trailer Training"
                                            {{ old('course', $student->course) == 'Trailer Training' ? 'selected' : '' }}>
                                            Trailer Training</option>
                                        <option value="Forklift Training"
                                            {{ old('course', $student->course) == 'Forklift Training' ? 'selected' : '' }}>
                                            Forklift Training</option>
                                        <option value="JCB Training"
                                            {{ old('course', $student->course) == 'JCB Training' ? 'selected' : '' }}>JCB
                                            Training</option>
                                        <option value="Excavator Training"
                                            {{ old('course', $student->course) == 'Excavator Training' ? 'selected' : '' }}>
                                            Excavator Training</option>
                                        <option value="Motor Mechanic"
                                            {{ old('course', $student->course) == 'Motor Mechanic' ? 'selected' : '' }}>
                                            Motor Mechanic</option>
                                        <option value="Video Editing"
                                            {{ old('course', $student->course) == 'Video Editing' ? 'selected' : '' }}>
                                            Video Editing</option>
                                        <option value="Car Driving"
                                            {{ old('course', $student->course) == 'Car Driving' ? 'selected' : '' }}>Car
                                            Driving</option>
                                    </select>
                                </div>
                                <div class="col-xxl-4 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Course Start
                                        Date</label>
                                    <input type="date" name="course_from_date" class="form-control"
                                        value="{{ old('course_from_date', $student->course_from_date?->format('Y-m-d')) }}">
                                </div>

                                <div class="col-xxl-4 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Course End
                                        Date</label>
                                    <input type="date" name="course_to_date" class="form-control"
                                        value="{{ old('course_to_date', $student->course_to_date?->format('Y-m-d')) }}">
                                </div>

                                <div class="col-xxl-4 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Fee
                                        Status</label>
                                    <select name="fee_status" class="form-control form-select">
                                        <option value="unpaid"
                                            {{ old('fee_status', $student->fee_status) == 'unpaid' ? 'selected' : '' }}>
                                            Unpaid</option>
                                        <option value="partially_paid"
                                            {{ old('fee_status', $student->fee_status) == 'partially_paid' ? 'selected' : '' }}>
                                            Partially Paid</option>
                                        <option value="paid"
                                            {{ old('fee_status', $student->fee_status) == 'paid' ? 'selected' : '' }}>Paid
                                        </option>
                                    </select>
                                </div>
                                <!-- Gender -->
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Gender</label>
                                    <select name="gender" class="form-control form-select">
                                        <option value="Male"
                                            {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female"
                                            {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>

                                <!-- Date Of Birth -->
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Date Of
                                        Birth</label>
                                    <input type="date" name="dob" class="form-control"
                                        value="{{ old('dob', $student->dob ? $student->dob->format('Y-m-d') : '') }}">
                                </div>

                                <!-- Phone Number -->
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Phone Number
                                        <span class="text-danger-600">*</span></label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ old('phone', $student->phone) }}" placeholder="Enter Phone Number"
                                        required>
                                </div>

                                <!-- Student Photo -->
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Student
                                        Photo</label>
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        @if ($student->photo)
                                            <img src="{{ asset('storage/' . $student->photo) }}"
                                                class="rounded-circle border"
                                                style="width: 40px; height: 40px; object-fit: cover;">
                                            <small class="text-muted">Current Photo</small>
                                        @else
                                            <div class="avatar avatar-sm bg-light text-dark rounded-circle"><i
                                                    class="ti ti-user"></i></div>
                                            <small class="text-muted">No Photo</small>
                                        @endif
                                    </div>
                                    <input type="file" name="photo" class="form-control" accept="image/*">
                                    <small class="text-muted">Upload new to replace</small>
                                </div>

                                <!-- Father's Name -->
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Father's
                                        Name</label>
                                    <input type="text" name="father_name" class="form-control"
                                        value="{{ old('father_name', $student->father_name) }}"
                                        placeholder="Enter Father's Name">
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">State</label>
                                    <input type="text" name="state" class="form-control"
                                        value="{{ old('state', $student->state) }}" placeholder="Enter State">
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label
                                        class="text-sm fw-semibold text-primary-light d-inline-block mb-8">District</label>
                                    <input type="text" name="district" class="form-control"
                                        value="{{ old('district', $student->district) }}" placeholder="Enter District">
                                </div>
                                <!-- Guardian Address -->
                                <div class="col-xl-12 col-sm-12">
                                    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Guardian
                                        Address</label>
                                    <input type="text" name="guardian_address" class="form-control"
                                        value="{{ old('guardian_address', $student->guardian_address) }}"
                                        placeholder="Enter Guardian Address">
                                </div>

                                <!-- Status -->
                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <label
                                        class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Status</label>
                                    <select name="status" class="form-control form-select">
                                        <option value="1"
                                            {{ old('status', $student->status) == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0"
                                            {{ old('status', $student->status) == '0' ? 'selected' : '' }}>Inactive
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
                            class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8">Update
                            Student</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

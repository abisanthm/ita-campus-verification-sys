@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Profile Image -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <center>
                        <h6>Student Image</h6>
                        <!-- Check if profile_image_path exists before displaying the image -->
                        @if ($student->profile_image_path)
                            <img src="{{ asset('storage/' . $student->profile_image_path) }}" alt="Profile Image" class="img-fluid rounded mb-3">
                        @else
                            <p>No profile image available</p>
                        @endif
                    </center>
                </div>
            </div>
        </div>
        <!-- Student Details -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Student Details</h5>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Name:</dt>
                        <dd class="col-sm-8">{{ $student->full_name }}</dd>

                        <dt class="col-sm-4">NIC Number:</dt>
                        <dd class="col-sm-8">{{ $student->nic_no }}</dd>

                        <dt class="col-sm-4">Contact Number:</dt>
                        <dd class="col-sm-8">{{ $student->contact_no }}</dd>

                        <dt class="col-sm-4">Address:</dt>
                        <dd class="col-sm-8">{{ $student->address }}</dd>

                        <dt class="col-sm-4">Date of Birth:</dt>
                        <dd class="col-sm-8">{{ $student->date_of_birth ? \Carbon\Carbon::parse($student->date_of_birth)->format('d-m-Y') : 'N/A' }}</dd>

                        <dt class="col-sm-4">Register Number:</dt>
                        <dd class="col-sm-8">{{ $student->register_no }}</dd>

                        <dt class="col-sm-4">Certificate Number:</dt>
                        <dd class="col-sm-8">{{ $student->certificate_no }}</dd>

                        <dt class="col-sm-4">Course Name:</dt>
                        <dd class="col-sm-8">{{ $student->course_name }}</dd>

                        <dt class="col-sm-4">Course Enrollment Date:</dt>
                        <dd class="col-sm-8">{{ $student->course_enrollment_date ? \Carbon\Carbon::parse($student->course_enrollment_date)->format('d-m-Y') : 'N/A' }}</dd>

                        <dt class="col-sm-4">Course Completion Date:</dt>
                        <dd class="col-sm-8">{{ $student->course_completion_date ? \Carbon\Carbon::parse($student->course_completion_date)->format('d-m-Y') : 'N/A' }}</dd>

                        <dt class="col-sm-4">Duration:</dt>
                        <dd class="col-sm-8">{{ $student->duration }}</dd>

                        <dt class="col-sm-4">Award Date:</dt>
                        <dd class="col-sm-8">{{ $student->award_date ? \Carbon\Carbon::parse($student->award_date)->format('d-m-Y') : 'N/A' }}</dd>

                        <dt class="col-sm-4">Status:</dt>
                        <dd class="col-sm-8">
                            @if ($student->status == 'Following')
                                Following
                            @elseif ($student->status == 'Complete')
                                ✅ Complete
                            @elseif ($student->status == 'Dropped Out')
                                ❌ Dropped Out
                            @else
                                N/A
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

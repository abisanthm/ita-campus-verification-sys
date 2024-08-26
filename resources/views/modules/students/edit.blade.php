@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Student Details Card -->
                <div class="card">
                    <div class="card-header"><h5>Edit Student Details</h5></div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="full_name">STUDENT FULL NAME</label>
                                <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name', $student->full_name) }}">
                                @error('full_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="nic_no">STUDENT NIC NO</label>
                                <input id="nic_no" type="text" class="form-control @error('nic_no') is-invalid @enderror" name="nic_no" value="{{ old('nic_no', $student->nic_no) }}">
                                @error('nic_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="contact_no">CONTACT NO</label>
                                <input id="contact_no" type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no', $student->contact_no) }}">
                                @error('contact_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <label for="address">STUDENT ADDRESS</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $student->address) }}">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="register_no">STUDENT REGISTER NO</label>
                                <input id="register_no" type="text" class="form-control @error('register_no') is-invalid @enderror" name="register_no" value="{{ old('register_no', $student->register_no) }}">
                                @error('register_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="certificate_no">CERTIFICATE NO</label>
                                <input id="certificate_no" type="text" class="form-control @error('certificate_no') is-invalid @enderror" name="certificate_no" value="{{ old('certificate_no', $student->certificate_no) }}">
                                @error('certificate_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="course_name">COURSE NAME</label>
                                <input id="course_name" type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{ old('course_name', $student->course_name) }}">
                                @error('course_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="course_enrollment_date">COURSE ENROLLMENT DATE</label>
                                <input id="course_enrollment_date" type="date" class="form-control @error('course_enrollment_date') is-invalid @enderror" name="course_enrollment_date" value="{{ old('course_enrollment_date', $student->course_enrollment_date->format('Y-m-d')) }}">
                                @error('course_enrollment_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="course_completion_date">COURSE COMPLETION DATE</label>
                                <input id="course_completion_date" type="date" class="form-control @error('course_completion_date') is-invalid @enderror" name="course_completion_date" value="{{ old('course_completion_date', $student->course_completion_date->format('Y-m-d')) }}">
                                @error('course_completion_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="duration">DURATION</label>
                                <input id="duration" type="text" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration', $student->duration) }}">
                                @error('duration')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="status">STATUS</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="">Choose...</option>
                                    <option value="Following" {{ old('status', $student->status) == 'Following' ? 'selected' : '' }}>Following</option>
                                    <option value="Complete" {{ old('status', $student->status) == 'Complete' ? 'selected' : '' }}>Complete</option>
                                    <option value="Dropped Out" {{ old('status', $student->status) == 'Dropped Out' ? 'selected' : '' }}>Dropped Out</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="award_date">AWARD DATE</label>
                                <input id="award_date" type="date" class="form-control @error('award_date') is-invalid @enderror" 
                                       name="award_date" 
                                       value="{{ old('award_date', optional($student->award_date)->format('Y-m-d')) }}">
                                @error('award_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <label for="profile_image">PROFILE IMAGE</label>
                                <input type="file" class="form-control" name="profile_image" accept="image/*" onchange="previewImage1(this)">
                                @if($student->profile_image_path)
                                    <img id="ProfileImagePreview" src="{{ asset('storage/' . $student->profile_image_path) }}" alt="Profile Image Preview" style="max-width: 100%; max-height: 150px; display: block;">
                                @else
                                    <img id="ProfileImagePreview" src="#" alt="Profile Image Preview" style="max-width: 100%; max-height: 150px; display: none;">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Buttons Card -->
                <div class="card mt-3">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary btn-block">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function previewImage1(input) {
        var preview = document.getElementById("ProfileImagePreview");
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#programType').on('change', function() {
            var selectedProgramTypeId = $(this).val();

            $.ajax({
                type: 'GET',
                url: '/fetch-programs/' + selectedProgramTypeId,
                success: function(data) {
                    var programs = data.programs;
                    var programSelect = $('#program');

                    programSelect.empty();

                    $.each(programs, function(index, program) {
                        programSelect.append('<option value="' + program.id + '">' + program.program_full_name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred:", xhr, status, error);
                    alert("Error fetching programs. Please try again later.");
                    $('#program').empty();
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#course_name').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '/search-courses', // Endpoint to fetch course names
                    dataType: 'json',
                    data: {
                        term: request.term // Send the user's input term
                    },
                    success: function(data) {
                        response(data); // Return the autocomplete suggestions
                    }
                });
            },
            minLength: 2, // Minimum length of input before triggering autocomplete
            select: function(event, ui) {
                $('#course_name').val(ui.item.value); // Set selected value
                return false; // Prevent default action
            }
        });
    });
</script>

@endsection

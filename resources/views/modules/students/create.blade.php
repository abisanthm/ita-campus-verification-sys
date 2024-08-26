@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
@csrf
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h5>Student Details</h5></div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="full_name">STUDENT FULL NAME</label>
                            <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name">
                            @if ($errors->has('full_name'))
                                <span class="text-danger">{{ $errors->first('full_name') }}</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="nic_no">STUDENT NIC NO</label>
                            <input id="nic_no" type="text" class="form-control @error('nic_no') is-invalid @enderror" name="nic_no">
                            @if ($errors->has('nic_no'))
                                <span class="text-danger">{{ $errors->first('nic_no') }}</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="contact_no">CONTACT NO</label>
                            <input id="contact_no" type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no">
                            @if ($errors->has('contact_no'))
                                <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-8">
                            <label for="address">STUDENT ADDRESS</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address">
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="register_no">STUDENT REGISTER NO</label>
                            <input id="register_no" type="text" class="form-control @error('register_no') is-invalid @enderror" name="register_no">
                            @if ($errors->has('register_no'))
                                <span class="text-danger">{{ $errors->first('register_no') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="certificate_no">CERTIFICATE NO</label>
                            <input id="certificate_no" type="text" class="form-control @error('certificate_no') is-invalid @enderror" name="certificate_no">
                            @if ($errors->has('certificate_no'))
                                <span class="text-danger">{{ $errors->first('certificate_no') }}</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="course_name">COURSE NAME</label>
                            <input id="course_name" type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name">
                            @if ($errors->has('course_name'))
                                <span class="text-danger">{{ $errors->first('course_name') }}</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="course_enrollment_date">COURSE ENROLLMENT DATE</label>
                            <input id="course_enrollment_date" type="date" class="form-control @error('course_enrollment_date') is-invalid @enderror" name="course_enrollment_date">
                            @if ($errors->has('course_enrollment_date'))
                                <span class="text-danger">{{ $errors->first('course_enrollment_date') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="course_completion_date">COURSE COMPLETION DATE</label>
                            <input id="course_completion_date" type="date" class="form-control @error('course_completion_date') is-invalid @enderror" name="course_completion_date">
                            @if ($errors->has('course_completion_date'))
                                <span class="text-danger">{{ $errors->first('course_completion_date') }}</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="duration">DURATION</label>
                            <input id="duration" type="text" class="form-control @error('duration') is-invalid @enderror" name="duration">
                            @if ($errors->has('duration'))
                                <span class="text-danger">{{ $errors->first('duration') }}</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="status">STATUS</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="">Choose...</option>
                                <option value="Following">Following</option>
                                <option value="Complete">Complete</option>
                                <option value="Dropped Out">Dropped Out</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="award_date">AWARD DATE</label>
                            <input id="award_date" type="date" class="form-control @error('award_date') is-invalid @enderror" name="award_date">
                            @if ($errors->has('award_date'))
                                <span class="text-danger">{{ $errors->first('award_date') }}</span>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="profile_image">PROFILE IMAGE</label>
                            <input type="file" name="profile_image" accept="image/*" onchange="previewImage1(this, 'ProfileImagePreview')">
                            <img id="ProfileImagePreview" src="#" alt="Profile Image Preview" style="max-width: 100%; max-height: 150px; display: none;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card col-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <input value="Save" type="submit" class="btn btn-primary btn-block">
                        <input value="Clear" type="reset" class="btn btn-danger btn-block">
                    </div>
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
<script>
    $(document).ready(function() {
        $('#programType').on('change', function() {
            var selectedProgramTypeId = $(this).val();

            // Make an AJAX request to fetch programs based on the selected program type
            $.ajax({
                type: 'GET',
                url: '/fetch-programs/' + selectedProgramTypeId,
                success: function(data) {
                    var programs = data.programs;
                    var programSelect = $('#program');

                    // Clear existing options
                    programSelect.empty();

                    // Populate program options based on fetched data
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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>A Campus Website - Student Verification</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="{{ $setting->desc }}" />
    <meta name="keywords" content="{{ $setting->tags }}" />
    <meta name="author" content="Extreme Coders" />
    <!-- External CSS -->
    @include('components.styles')

    @if(!empty($setting->favicon) && file_exists(public_path('storage/' . $setting->favicon)))
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $setting->favicon) }}">
    @else
        <link rel="icon" type="image/gif" href="https://raw.githubusercontent.com/abisanthm/abisanthm.github.io/main2/favicon.gif">
    @endif

    <style>
        @media (max-width: 767px) {
            .mobile-column {
                display: none; /* Hide the column content on desktop */
            }
        }

        @media (min-width: 768px) {
            .mobile-column {
                display: block; /* Show the column content on mobile */
            }
        }
    </style>
</head>
<body>

<!-- Login page -->
<div class="login_wrapper">
    <div class="container">
        <div class="col-md-12">
            <div class="row login-box-13">
                <div class="col-lg-12 col-sm-12">
                    <div class="login-inner-form">
                        <div class="details">
                            <div class="">
                                @if(!empty($setting->logo) && file_exists(public_path('storage/' . $setting->logo)))
                                    <img width="400px" src="{{ asset('storage/' . $setting->logo) }}" alt="" class="logo logo-lg" style="background-color: {{ $setting->logo_color }};">
                                @else
                                    <img width="400px" src="{{ asset('https://raw.githubusercontent.com/abisanthm/abisanthm.github.io/main2/1.png') }}" alt="Default Image" class="logo logo-lg" style="background-color: {{ $setting->logo_color }};">
                                @endif
                            </div>
                            <h5 class="py-2">{{ config('cer_setting.welcome_message') }}</h5>
                            <div class="table-responsive py-3" id="fileContent">
                                <img src="{{ 'https://verify.itacampus.lk/storage/' . $student->profile_image_path }}" width="150px"><br><br>
                                <table class="table col-lg-12 col-md-6" border="1">
                                    <thead>
                                        <tr>
                                            <th>FULL NAME :</th>
                                            <th>REG NO :</th>
                                            <th>CER NO :</th>
                                            <th>COURSE NAME :</th>
                                            <th>ENROLLMENT DATE :</th>
                                            <th>COMPLETE DATE :</th>
                                            <th>DURATION :</th>
                                            <th>STATUS :</th>
                                            <th>AWARD DATE :</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $student->full_name }}</td>
                                            <td>{{ $student->register_no }}</td>
                                            <td>{{ $student->certificate_no }}</td>
                                            <td>{{ $student->course_name }}</td>
                                            <td>{{ $student->course_enrollment_date ? \Carbon\Carbon::parse($student->course_enrollment_date)->format('d-m-Y') : 'N/A' }}</td>
                                            <td>{{ $student->course_completion_date ? \Carbon\Carbon::parse($student->course_completion_date)->format('d-m-Y') : 'N/A' }}</td>
                                            <td>{{ $student->duration }}</td>
                                            <td>
                                                @if ($student->status == 'Following')
                                                    Following
                                                @elseif ($student->status == 'Complete')
                                                    ✅ Complete
                                                @elseif ($student->status == 'Dropped Out')
                                                    ❌ Dropped Out
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $student->award_date ? \Carbon\Carbon::parse($student->award_date)->format('d-m-Y') : 'N/A' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="/" class="btn btn-primary">Go Back</a>
                            </div>
                            <p class="text-danger"><b><u>{{ config('cer_setting.footer_title') }}</u></b><br>
                                {{ config('cer_setting.footer_message') }}</p>
                            <div style="margin-top:40px">
                                If you need any clarification, please contact us at <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                            </div>
                            <div class="">
                                &copy; {{ date('Y') }} {{ $setting->company_name }}. All Rights Reserved
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. Login page -->

@include('components.scripts')

</body>
</html>

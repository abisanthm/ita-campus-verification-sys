
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $setting->company_name }}</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta  name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
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


</head>
<body>

<!-- Login page -->
<div class="login_wrapper">
    <div class="container">
        <div class="col-md-12 pad-0">
            <div class="row login-box-12">
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
                            <div>
                                <h5 class="py-2">{{ config('cer_setting.welcome_message') }}</h5>
                                <form action="{{ route('verify-certificate') }}" method="POST" class="py-3">
                                    @csrf
                                    <div class="form-group" style="padding:30px">
                                        <h2 class="text-danger">🚫 {{ config('cer_setting.invalid_title') }}</h2>
                                        <p>{{ config('cer_setting.invalid_message') }}</p>
                                        <a href="/" class="btn btn-primary">Go Back</a>
                                    </div>
                                    <div class="">
                                        If you need any clarification, please contact us at <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                                    </div>
                                    <div class="py-1">
                                        &copy; {{ date('Y') }} {{ $setting->company_name }}. All Rights Reserved
                                    </div>
                                </form>
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
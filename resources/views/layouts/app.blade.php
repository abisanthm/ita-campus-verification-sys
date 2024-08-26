<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $setting->company_name }}</title>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta  name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="{{ $setting->desc }}" />
    <meta name="keywords" content="{{ $setting->tags }}" />
    <meta name="author" content="Extreme Coders" />
    @if(!empty($setting->favicon) && file_exists(public_path('storage/' . $setting->favicon)))
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $setting->favicon) }}">
    @else
        <link rel="icon" type="image/gif" href="https://raw.githubusercontent.com/abisanthm/abisanthm.github.io/main2/favicon.gif">
    @endif

    @include('components.styles')

</head>
<body class="theme-1">
    <header class="site-header">
        <div class="header-wrapper">
            <div class="me-auto flex-grow-1 d-flex align-items-center">
                <ul class="list-unstyled header-menu-nav">
                    <li class="hdr-itm mob-hamburger">
                    <a href="#!" class="app-head-link" id="mobile-collapse">
                        <div class="hamburger hamburger-arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner">
                                
                            </div>
                        </div>
                        </div>
                    </a>
                    </li>
                </ul>
            </div>
            <div class="justify-content-center py-3">
                <a href="/" target="_blank" class="btn btn-primary btn-sm">Visit Site</a>
            </div>
        </div>
    </header>

    @include('layouts.nav')

</body>

<div class="page-content-wrapper">
    <div class="content-container">
        <div class="page-content">
            @if ($message = Session::get('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ $message }}
                </div>
            @endif
            @if ($message = Session::get('danger'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ $message }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</div>

<footer class="app-footer">
  <div class="footer-wrapper">
    <div class="py-1">
        <span class="text-muted">&copy; {{ date('Y') }} {{ $setting->company_name }}. All Rights Reserved.</span>
    </div>
  </div>
</footer>

@include('components.scripts')
@include('components.modal')
@include('components.modal-scripts')

</body>
</html>

@extends('layouts.auth')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif               

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="row mb-3">
            <label for="email" class="col-md-12 col-form-label text-md-start">{{ __('Email Address') }}</label>

            <div class="col-md-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">
                    Reset Now
                </button>
            </div>
        </div>
    </form>
@endsection

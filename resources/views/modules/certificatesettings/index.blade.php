@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Verification Area Configrations</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('verification-config.update', $certificateSetting->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="welcome_message">Welcome Message</label>
                            <input type="text" class="form-control" id="welcome_message" name="welcome_message" value="{{ $certificateSetting->welcome_message }}" placeholder="Welcome Message">
                        </div>

                        <div class="form-group">
                            <label for="footer_title">Footer Title</label>
                            <input type="text" class="form-control" id="footer_title" name="footer_title" value="{{ $certificateSetting->footer_title }}" placeholder="Footer Title">
                        </div>

                        <div class="form-group">
                            <label for="footer_message">Footer Message</label>
                            <textarea class="form-control" id="footer_message" name="footer_message" rows="3" placeholder="Footer Message">{{ $certificateSetting->footer_message }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="invalid_title">Invalid Title</label>
                            <input type="text" class="form-control" id="invalid_title" name="invalid_title" value="{{ $certificateSetting->invalid_title }}" placeholder="Invalid Title">
                        </div>

                        <div class="form-group">
                            <label for="invalid_message">Invalid Message</label>
                            <textarea class="form-control" id="invalid_message" name="invalid_message" rows="3" placeholder="Invalid Message">{{ $certificateSetting->invalid_message }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
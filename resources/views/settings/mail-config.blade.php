@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h5>Mail Configration</h5></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('mail-config.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="MAIL_DRIVER" class="form-label">Mailer</label>
                                    <select class="form-select" id="MAIL_DRIVER" name="MAIL_DRIVER" required>
                                        <option value="smtp" {{ env('MAIL_DRIVER') === 'smtp' ? 'selected' : '' }}>SMTP</option>
                                        <option value="imap" {{ env('MAIL_DRIVER') === 'imap' ? 'selected' : '' }}>IMAP</option>
                                        <option value="pop3" {{ env('MAIL_DRIVER') === 'pop3' ? 'selected' : '' }}>POP3</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="MAIL_HOST" class="form-label">Host</label>
                                    <input type="text" class="form-control" id="MAIL_HOST" name="MAIL_HOST" value="{{ env('MAIL_HOST') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="MAIL_PORT" class="form-label">Port</label>
                                    <input type="text" class="form-control" id="MAIL_PORT" name="MAIL_PORT" value="{{ env('MAIL_PORT') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="MAIL_USERNAME" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="MAIL_USERNAME" name="MAIL_USERNAME" value="{{ env('MAIL_USERNAME') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="MAIL_PASSWORD" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="MAIL_PASSWORD" name="MAIL_PASSWORD" value="{{ env('MAIL_PASSWORD') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="MAIL_ENCRYPTION" class="form-label">Encryption</label>
                                    <select class="form-select" id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION" required>
                                        <option value="tls" {{ env('MAIL_ENCRYPTION') === 'tls' ? 'selected' : '' }}>TLS</option>
                                        <option value="ssl" {{ env('MAIL_ENCRYPTION') === 'ssl' ? 'selected' : '' }}>SSL</option>
                                        <!-- Add other encryption types if needed -->
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="MAIL_FROM_ADDRESS" class="form-label">From Address</label>
                                    <input type="email" class="form-control" id="MAIL_FROM_ADDRESS" name="MAIL_FROM_ADDRESS" value="{{ env('MAIL_FROM_ADDRESS') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="MAIL_FROM_NAME" class="form-label">From Name</label>
                                    <input type="text" class="form-control" id="MAIL_FROM_NAME" name="MAIL_FROM_NAME" value="{{ env('MAIL_FROM_NAME') }}" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">{{ __('Update Environment') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('vendor.installer.layouts.master')
<style>

.error-message {
    color: red;
}

    /* Style for form container */
.form-container {
  max-width: 400px;
  margin: 0 auto;
}

/* Style for form elements */
.form-label {
  display: block;
  margin-bottom: -10px;
  font-weight: bold;
}

.form-input {
  width: 100%;
  padding: 8px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.btnn{
  margin-top:-25px; 
}

</style>
@section('template_title')
	{{ trans('installer_messages.welcome.templateTitle') }}
@endsection

@section('icon')
    {{ asset('installer/img/icons/requirements.svg') }}
@endsection

@section('main')
  <form method="POST" action="{{ route('LaravelInstaller::verificationConfirm') }}">
      @csrf
      <label class="form-label">Enter Your Purchase Code</label><br>
      <input type="text" name="purchase_code" class="form-input" >
      <p class="text-center">
        @if(session('error'))
          <span class="error-message">{{ session('error') }}</span>
        @endif
      </p>
@endsection

@section('actions')
	<button type="submit" class="btnn button is-primary">
		Verify Now
		<i class="ion ion-ios-arrow-forward"></i>
	</button>
</form>
@endsection

@section('progress')
	<div class="step-progress" style="width: 20%"></div>
@endsection

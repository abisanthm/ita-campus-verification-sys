@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.final.templateTitle') }}
@endsection

@section('icon')
	{{ asset('installer/img/icons/finished.svg') }}
@endsection

@section('title')
    {{ trans('installer_messages.final.title') }}
@endsection

@section('main')

	<div class="step-illustration">
		<img src="{{ asset('installer/img/illustrations/finished-success.svg') }}" alt="">
	</div>

	<div class="spacer-40"></div>


@endsection

@section('actions')
	<a href="{{ url('/') }}" class="button is-primary">
		<i class="ion ion-ios-checkmark-circle"></i>
		<span>{{ trans('installer_messages.final.exit') }}</span>
	</a>
@endsection

@section('progress')
  <div class="step-progress is-success" style="width: 100%"></div>
@endsection

@extends('layouts.app')

@section('content')
<div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body bg-extreme rounded-3">
                                    <div class="row">
                                      <div class="col-lg-12 col-md-12 col-12">
                                        <div class="d-lg-flex justify-content-between align-items-center ">
                                          <div class="d-md-flex align-items-center">
                                            @if(!empty($setting->profile) && file_exists(public_path('storage/' . $setting->profile)))
                                                <img src="{{ asset('storage/' . $setting->profile) }}" alt="Image" width="60px" class="rounded-circle avatar avatar-xl">
                                            @else
                                                <img src="https://raw.githubusercontent.com/abisanthm/abisanthm.github.io/main2/profile-girl.png" alt="Default Image" width="60px" class="rounded-circle border border-light border-3 avatar avatar-xl">
                                            @endif
                                            <div class="ms-md-4 mt-3">
                                              <h3 class="text-white fw-600 mb-1">Welcome, {{ auth()->user()->name }}!</h3>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body rounded border border-extreme">
                                    <div class="d-flex align-items-center">
                                        <div class="numbers flex-grow-1 pe-3">
                                            <p class="fw-600 mb-1 text-muted">Total Students</p>
                                            <h4 class="fw-700 mb-0 text-dark-black">{{ $std_sum }}</h4>
                                        </div>
                                        <div class="icon-shape bg-extreme ">
                                            <i class="ti ti-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body rounded border border-extreme">
                                    <div class="d-flex align-items-center">
                                        <div class="numbers flex-grow-1 pe-3">
                                            <p class="fw-600 mb-1 text-muted">Total Users</p>
                                            <h4 class="fw-700 mb-0 text-dark-black">{{ $user_sum }}</h4>
                                        </div>
                                        <div class="icon-shape bg-extreme ">
                                            <i class="ti ti-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body rounded border border-extreme">
                                    <div class="d-flex align-items-center">
                                        <div class="numbers flex-grow-1">
                                            <p class="fw-600 mb-1 text-muted">Total Requests</p>
                                            <h4 class="fw-700 mb-0 text-dark-black">{{ $req_sum }}</h4>
                                        </div>
                                        <div class="icon-shape bg-extreme ">
                                            <i class="ti ti-rss"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-12 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Latest Students</h4>
                                </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="10px">#</th>
                                                <th >Student ID</th>
                                                <th>Full Name</th>
                                                <th>NIC</th>
                                                <th>Contact No</th>
                                                <th>{{ config('field_name.program_name') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $student )
                                                <tr>
                                                    <td>{{ $student->id }}</td>
                                                    <td>{{ $student->register_no}}</td>
                                                    <td> {{ $student->full_name }}</td>
                                                    <td> {{ $student->nic_no }}</td>
                                                    <td> {{ $student->contact_no }}</td>
                                                    <td> {{ $student->course_name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

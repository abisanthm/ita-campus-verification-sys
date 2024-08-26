@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>{{ isset($program) ? 'Update '. config('field_name.program_name') : 'Create '. config('field_name.program_name') }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ isset($program) ? route('programs.update', $program->id) : route('programs.store') }}" method="POST">
                    @csrf
                    @if(isset($program))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="program_full_name">{{ config('field_name.program_name') }} Name:</label>
                        <input type="text" class="form-control" id="program_full_name" name="program_full_name" value="{{ isset($program) ? $program->program_full_name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="program_short_name">{{ config('field_name.program_name') }} Short Name:</label>
                        <input type="text" class="form-control" id="program_short_name" name="program_short_name" value="{{ isset($program) ? $program->program_short_name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="program_code">{{ config('field_name.program_name') }} Code:</label>
                        <input type="text" class="form-control" id="program_code" name="program_code" value="{{ isset($program) ? $program->program_code : '' }}">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($program) ? 'Update' : 'Create' }}</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>{{ config('field_name.program_name') }}s List</h5>
            </div>
                <table class="table" id="dt-simple">
                    <thead>
                        <tr>
                            <th>{{ config('field_name.program_name') }} Name</th>
                            <th>{{ config('field_name.program_name') }} Short Name</th>
                            <th>{{ config('field_name.program_name') }}Code</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td>{{ $program->program_full_name }}</td>
                                <td>{{ $program->program_short_name }}</td>
                                <td>{{ $program->program_code }}</td>
                                <td>
                                    <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('programs.destroy', $program->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection

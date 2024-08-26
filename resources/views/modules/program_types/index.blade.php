@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>{{ isset($program) ? 'Update ' . config('field_name.program_type') : 'Create ' . config('field_name.program_type') }}</h5>
            </div>
            <div class="card-body">
                @if(isset($programType))
                    <form action="{{ route('program-types.update', $programType->id) }}" method="POST">
                        @method('PUT')
                @else
                    <form action="{{ route('program-types.store') }}" method="POST">
                @endif
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ config('field_name.program_type') }} Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($programType) ? $programType->name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="programs">Associate {{ config('field_name.program_name') }}s:</label>
                            <select multiple class="form-control" id="programs" name="programs[]">
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}" {{ isset($programType) && $programType->programs->contains($program->id) ? 'selected' : '' }} > {{ $program->program_full_name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ isset($programType) ? 'Update' : 'Create' }}</button>
                    </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>{{ config('field_name.program_type') }} List</h5>
            </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ config('field_name.program_type') }}</th>
                            <th>{{ config('field_name.program_name') }}s</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($programTypes as $programType)
                            <tr>
                                <td>{{ $programType->name }}</td>
                                <td>
                                    <ul>
                                        @foreach($programType->programs as $program)
                                            <li>{{ $program->program_full_name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('program-types.edit', $programType->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('program-types.destroy', $programType->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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

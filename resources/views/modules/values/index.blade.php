@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>{{ isset($value) ? 'Update Value' : 'Please select a value' }}</h5>
            </div>
            <div class="card-body">
                @if(isset($value))
                    <form action="{{ isset($value) ? route('values.update', $value->id) : route('values.store') }}" method="POST">
                        @csrf
                        @if(isset($value))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="field_name">Field Name:</label>
                            <input type="text" readonly class="form-control" id="field_name" name="field_name" value="{{ isset($value) ? $value->field_name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="custom_name">Custom Name:</label>
                            <input type="text" class="form-control" id="custom_name" name="custom_name" value="{{ isset($value) ? $value->custom_name : '' }}">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ isset($value) ? 'Update' : 'Create' }}</button>
                    </form>
                @else
                   <p>Please select a record to edit.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Values</h5>
            </div>
                <table class="table" id="dt-simple">
                    <thead>
                        <tr>
                            <th>Field Name</th>
                            <th>Custom Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($values as $value)
                            <tr>
                                <td>{{ $value->field_name }}</td>
                                <td>{{ $value->custom_name }}</td>
                                <td>
                                    <a href="{{ route('values.edit', $value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection

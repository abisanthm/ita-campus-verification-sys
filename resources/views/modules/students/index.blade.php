@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>Student List</h4>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('students.create') }}" class="btn btn-sm btn-block btn-primary">Create New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="studentTable">
                        <thead>
                            <tr>
                                <th width="170px">Reg No</th>
                                <th width="170px">Cer No</th>
                                <th width="270px">Name</th>
                                <th>Course Name</th>

                                <th>Duration</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->register_no }}</td>
                                <td>{{ $student->certificate_no }}</td>
                                <td>{{ $student->full_name }}</td>
                                <td>{{ $student->course_name }}</td>

                                <td>{{ $student->duration }}</td>
                                <td>
                                    @if ($student->status == 'Following')
                                        <span class="badge bg-info">Following</span>
                                    @elseif ($student->status == 'Complete')
                                        <span class="badge bg-success">Complete</span>
                                    @elseif ($student->status == 'Dropped Out')
                                        <span class="badge bg-danger">Dropped Out</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('students.show', [$student->id]) }}" class="btn btn-sm btn-warning">View</a>
                                        <a href="{{ route('students.edit', [$student->id]) }}" class="btn btn-sm btn-primary">Edit</a>
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
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#studentTable').DataTable();
    });
</script>
@endsection

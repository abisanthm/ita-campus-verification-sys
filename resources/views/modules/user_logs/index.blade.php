@extends('layouts.app') <!-- Assuming you have a layout structure -->

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>User Logs</h4>
                        </div>
                    </div>
                </div>
            <table class="table" id="userLogsTable">
                <thead>
                    <tr>
                        <th>Entry ID</th>
                        <th>IP Address</th>
                        <th>User Agent</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userLogs as $userLog)
                    <tr>
                        <td>{{ $userLog->std_id }}</td>
                        <td>{{ $userLog->ip_address }}</td>
                        <td>{{ $userLog->user_agent }}</td>
                        <td>{{ $userLog->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#userLogsTable').DataTable();
    });
</script>
@endsection

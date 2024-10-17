@extends('admin.app')

@section('content')
<div class="container">
    <h1>Attendance List</h1>

    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->user->name }}</td>
                    <td>{{ $attendance->status }}</td>
                    <td>
                        <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $attendances->links() }}
</div>
@endsection

@extends('admin.app')

@section('content')
    <h1>Leave List</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
                <tr>
                    <td>{{ $leave->user->name }}</td>
                    <td>{{ $leave->description }}</td>
                    <td>{{ $leave->start_of_date }}</td>
                    <td>{{ $leave->end_of_date }}</td>
                    <td>{{ ucfirst($leave->status) }}</td>
                    <td>
                        <a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $leaves->links() }}
@endsection

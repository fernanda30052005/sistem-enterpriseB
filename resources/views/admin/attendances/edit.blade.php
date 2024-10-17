@extends('admin.app')

@section('content')
<div class="container">
    <h1>Edit Attendance</h1>

    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $attendance->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>Present</option>
                <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>Absent</option>
                <option value="late" {{ $attendance->status == 'late' ? 'selected' : '' }}>Late</option>
                <option value="leave" {{ $attendance->status == 'leave' ? 'selected' : '' }}>Leave</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

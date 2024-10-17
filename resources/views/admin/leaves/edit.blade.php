@extends('admin.app')

@section('content')
    <h1>Edit Leave</h1>

    <form action="{{ route('leaves.update', $leave->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $leave->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $leave->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="start_of_date">Start Date</label>
            <input type="date" name="start_of_date" class="form-control" value="{{ $leave->start_of_date }}" required>
        </div>

        <div class="form-group">
            <label for="end_of_date">End Date</label>
            <input type="date" name="end_of_date" class="form-control" value="{{ $leave->end_of_date }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $leave->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $leave->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $leave->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

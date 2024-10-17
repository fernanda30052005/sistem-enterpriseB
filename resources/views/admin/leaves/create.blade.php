@extends('admin.app')

@section('content')
    <h1>Create Leave</h1>

    <form action="{{ route('leaves.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="start_of_date">Start Date</label>
            <input type="date" name="start_of_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_of_date">End Date</label>
            <input type="date" name="end_of_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection

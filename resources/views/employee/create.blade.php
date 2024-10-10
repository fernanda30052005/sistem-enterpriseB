@extends('layouts.app')

@section('content')
    <h1>Create New Employee</h1>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" required>
        </div>

        <div class="form-group">
            <label for="depart_id">Department ID</label>
            <input type="text" class="form-control" id="depart_id" name="depart_id" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" required>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
        </div>

        <div class="form-group">
            <label for="religion">Religion</label>
            <input type="text" class="form-control" id="religion" name="religion" required>
        </div>

        <div class="form-group">
            <label for="sex">Sex</label>
            <select class="form-control" id="sex" name="sex" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" required>
        </div>

        <button type="submit" class="btn btn-success">Create Employee</button>
    </form>
@endsection

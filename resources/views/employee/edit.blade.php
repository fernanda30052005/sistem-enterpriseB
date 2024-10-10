@extends('layouts.app')

@section('content')
    <h1>Edit Employee</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $employee->user_id }}" required>
        </div>

        <div class="form-group">
            <label for="depart_id">Department ID</label>
            <input type="text" class="form-control" id="depart_id" name="depart_id" value="{{ $employee->depart_id }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $employee->address }}" required>
        </div>

        <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{ $employee->place_of_birth }}" required>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="{{ $employee->dob }}" required>
        </div>

        <div class="form-group">
            <label for="religion">Religion</label>
            <input type="text" class="form-control" id="religion" name="religion" value="{{ $employee->religion }}" required>
        </div>

        <div class="form-group">
            <label for="sex">Sex</label>
            <select class="form-control" id="sex" name="sex" required>
                <option value="male" {{ $employee->sex == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $employee->sex == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}" required>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" value="{{ $employee->salary }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
@endsection

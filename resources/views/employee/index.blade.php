
@extends('layouts.app')

@section('content')
    <h1>Employees</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Depart ID</th>
                <th>Address</th>
                <th>Place of Birth</th>
                <th>DOB</th>
                <th>Religion</th>
                <th>Sex</th>
                <th>Phone</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->user_id }}</td>
                    <td>{{ $employee->depart_id }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->place_of_birth }}</td>
                    <td>{{ $employee->dob }}</td>
                    <td>{{ $employee->religion }}</td>
                    <td>{{ $employee->sex }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('employees.create') }}" class="btn btn-success">Create New Employee</a>
@endsection
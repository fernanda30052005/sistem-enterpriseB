<!-- resources/views/departments/index.blade.php -->
@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Departments</h1>

            <!-- Add New Department Button -->
            <a href="{{ route('departements.create') }}" class="btn btn-primary mb-3 float-right">
                Add Department
            </a>

            <!-- Search Field -->
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search..." id="search">
            </div>

            <!-- Departments Table -->
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departements as $key => $departements)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $departements->name }}</td>
                            <td>{{ $departements->description }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('departements.edit', $departements->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('departements.destroy', $departements->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination (optional) -->
          
        </div>
    </div>
</div>
@endsection
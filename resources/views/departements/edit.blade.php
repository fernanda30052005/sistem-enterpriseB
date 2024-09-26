<!-- resources/views/departments/edit.blade.php -->
@extends('admin.app')

@section('content')
<div class="container">
    <h1>Edit Department</h1>
    <form action="{{ route('departements.update', $departements->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Department Name</label>
            <input type="text" name="name" class="form-control" value="{{ $departements->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Department Description</label>
            <textarea name="description" class="form-control">{{ $departements->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('departements.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
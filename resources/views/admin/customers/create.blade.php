@extends('admin.app')

@section('content')
<h1>Add Customer</h1>
<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <label>Name</label>
    <input type="text" name="name" required>
    <label>Email</label>
    <input type="email" name="email" required>
    <label>Phone</label>
    <input type="text" name="phone">
    <button type="submit">Save</button>
</form>
@endsection

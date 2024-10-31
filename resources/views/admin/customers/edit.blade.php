@extends('admin.app')

@section('content')
<h1>Edit Customer</h1>
<form action="{{ route('customers.update', $customer) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Name</label>
    <input type="text" name="name" value="{{ $customer->name }}" required>
    <label>Email</label>
    <input type="email" name="email" value="{{ $customer->email }}" required>
    <label>Phone</label>
    <input type="text" name="phone" value="{{ $customer->phone }}">
    <button type="submit">Update</button>
</form>
@endsection

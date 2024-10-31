@extends('app')

@section('content')
<h1>Edit Promotion</h1>
<form action="{{ route('promotions.update', $promotion) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Title</label>
    <input type="text" name="title" value="{{ $promotion->title }}" required>
    <label>Month</label>
    <input type="text" name="month" value="{{ $promotion->month }}" required>
    <label>Category</label>
    <input type="text" name="category" value="{{ $promotion->category }}" required>
    <button type="submit">Update</button>
</form>
@endsection

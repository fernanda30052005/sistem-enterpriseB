<!-- resources/views/crm/send_promotion.blade.php -->
@extends('admin.app') <!-- Memastikan ini extend dari app.blade.php -->

@section('content')
<div class="container">
    <h1>Send Promotions</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('send.promotion') }}" method="POST">
        @csrf
        <label for="customer_id">Customer Name:</label>
        <select name="customer_id" id="customer_id" required>
            <option value="">Choose Customer Name</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select><br>

        <label for="promotion_id">Promotion Name:</label>
        <select name="promotion_id" id="promotion_id" required>
            <option value="">Choose Promotion Name</option>
            @foreach($promotions as $promotion)
                <option value="{{ $promotion->id }}">{{ $promotion->title }}</option>
            @endforeach
        </select><br>

        <button type="submit" class="btn btn-primary">Send Promotion</button>
    </form>
</div>
@endsection

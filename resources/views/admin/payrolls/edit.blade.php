@extends('admin.app')

@section('content')
    <div class="container">
        <h1>Edit Payroll</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('payrolls.update', $payroll->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_id">Select User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $payroll->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="number" name="salary" id="salary" class="form-control" value="{{ $payroll->salary }}" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
            <a href="{{ route('payrolls.index') }}" class="btn btn-secondary mt-3">Cancel</a>
        </form>
    </div>
@endsection

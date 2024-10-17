@extends('admin.app')

@section('content')
    <div class="container">
        <h1>Payrolls</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('payrolls.create') }}" class="btn btn-primary mb-3">Create New Payroll</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payroll as $payrolls)
                    <tr>
                        <td>{{ $payrolls->user->name }}</td>
                        <td>${{ number_format($payrolls->salary, 2) }}</td>
                        <td>
                            <a href="{{ route('payrolls.edit', $payrolls->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('payrolls.destroy', $payrolls->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $payroll->links() }}
    </div>
@endsection

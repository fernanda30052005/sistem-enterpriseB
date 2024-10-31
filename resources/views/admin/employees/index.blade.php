@extends('admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Daftar Karyawan</h3>
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Karyawan
                    </a>
                </div>

                <div class="card-body">
                    <!-- Search Field -->
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari karyawan..." id="search">
                        </div>
                    </div>

                    <!-- Employees Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Departemen</th>
                                    <th>Alamat</th>
                                    <th>Tempat Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>No. Telepon</th>
                                    <th>Gaji</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $key => $employee)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $employee->user->name ?? 'N/A' }}</td>
                                        <td>{{ $employee->departement->name ?? '-' }}</td>
                                        <td>{{ $employee->address ?: '-' }}</td>
                                        <td>{{ $employee->place_of_birth ?: '-' }}</td>
                                        <td>{{ $employee->sex ?: '-' }}</td>
                                        <td>{{ $employee->religion ?: '-' }}</td>
                                        <td>{{ $employee->phone ?: '-' }}</td>
                                        <td>Rp {{ number_format($employee->salary, 0, ',', '.') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('employees.edit', $employee->id) }}" 
                                                   class="btn btn-warning btn-sm" 
                                                   data-toggle="tooltip" 
                                                   title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('employees.destroy', $employee->id) }}" 
                                                      method="POST" 
                                                      class="d-inline"
                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-danger btn-sm"
                                                            data-toggle="tooltip" 
                                                            title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Tidak ada data karyawan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-end mt-3">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }
    .btn-group {
        gap: 5px;
    }
</style>
@endpush
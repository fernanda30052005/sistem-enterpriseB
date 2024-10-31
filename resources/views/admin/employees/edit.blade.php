@extends('admin.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Edit Data Karyawan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <!-- User Selection -->
                        <div class="form-group mb-3">
                            <label for="user_id" class="form-label">Nama Pengguna</label>
                            <select name="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                                <option value="">Pilih Pengguna</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $employee->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Department Selection -->
                        <div class="form-group mb-3">
                            <label for="departements_id" class="form-label">Departemen</label>
                            <select name="departements_id" class="form-select @error('departements_id') is-invalid @enderror" required>
                                <option value="">Pilih Departemen</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('departements_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3" required>{{ $employee->address }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Place & Date of Birth -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                                    <input type="text" name="place_of_birth" class="form-control @error('place_of_birth') is-invalid @enderror" value="{{ $employee->place_of_birth }}">
                                    @error('place_of_birth')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="dob" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ $employee->dob }}">
                                    @error('dob')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Religion -->
                        <div class="form-group mb-3">
                            <label for="religion" class="form-label">Agama</label>
                            <select name="religion" class="form-select @error('religion') is-invalid @enderror" required>
                                <option value="">Pilih Agama</option>
                                @foreach(['Islam', 'Katolik', 'Protestan', 'Hindu', 'Budha', 'Konghucu'] as $religion)
                                    <option value="{{ $religion }}" {{ $employee->religion == $religion ? 'selected' : '' }}>
                                        {{ $religion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('religion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sex -->
                        <div class="form-group mb-3">
                            <label for="sex" class="form-label">Jenis Kelamin</label>
                            <select name="sex" class="form-select @error('sex') is-invalid @enderror" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ $employee->sex == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $employee->sex == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('sex')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">No. Telepon</label>
                            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $employee->phone }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Salary -->
                        <div class="form-group mb-3">
                            <label for="salary" class="form-label">Gaji</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ $employee->salary }}" required>
                            </div>
                            @error('salary')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
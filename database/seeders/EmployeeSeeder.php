<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data karyawan untuk diinsert ke database
        Employee::create([
            'user_id' => 1,
            'depart_id' => 101,
            'address' => 'Jl. Mawar No. 123',
            'place_of_birth' => 'Jakarta',
            'dob' => '1990-05-15',
            'religion' => 'Islam',
            'sex' => 'Male',
            'phone' => '081234567890',
            'salary' => 5000000,
        ]);

        Employee::create([
            'user_id' => 2,
            'depart_id' => 102,
            'address' => 'Jl. Melati No. 456',
            'place_of_birth' => 'Bandung',
            'dob' => '1985-10-21',
            'religion' => 'Kristen',
            'sex' => 'Female',
            'phone' => '081234567891',
            'salary' => 6000000,
        ]);

        // Tambahkan data lain sesuai kebutuhan
    }
}

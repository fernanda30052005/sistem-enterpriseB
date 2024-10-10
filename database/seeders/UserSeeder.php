<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengupdate atau membuat pengguna adi
        $adi = User::updateOrCreate(
            ['email' => 'adi@email.com'], // Kondisi pencarian
            ['name' => 'adi', 'password' => bcrypt('password')] // Data yang akan diperbarui atau dibuat
        );
        $adi->assignRole('admin');

        // Mengupdate atau membuat pengguna budi
        $budi = User::updateOrCreate(
            ['email' => 'budi@email.com'],
            ['name' => 'Budi', 'password' => bcrypt('password')]
        );
        $budi->assignRole('operator');

        // Mengupdate atau membuat pengguna cindy
        $cindy = User::updateOrCreate(
            ['email' => 'cindy@email.com'],
            ['name' => 'cindy', 'password' => bcrypt('password')]
        );
        $cindy->assignRole('operator'); // Menambahkan role
        $cindy->givePermissionTo('delete users'); // Memberikan permission langsung
    }
}

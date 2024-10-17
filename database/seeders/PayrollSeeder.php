<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Payroll;
use Illuminate\Support\Facades\DB;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all users
        $users = User::all();

        // Insert payroll for each user
        foreach ($users as $user) {
            DB::table('payrolls')->insert([
                'user_id' => $user->id,
                'salary' => rand(3000, 10000), // Generate a random salary between 3000 and 10000
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

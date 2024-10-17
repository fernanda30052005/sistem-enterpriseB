<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pastikan ada user yang tersedia untuk dihubungkan dengan leave
        $users = User::all();
        
        if ($users->isEmpty()) {
            $this->command->info('No users found. Please seed the users table first.');
            return;
        }

        // Generate beberapa contoh leave
        foreach ($users as $user) {
            Leave::create([
                'user_id' => $user->id,
                'description' => 'Taking leave for personal reasons.',
                'start_of_date' => now()->addDays(rand(1, 10))->format('Y-m-d'),
                'end_of_date' => now()->addDays(rand(11, 20))->format('Y-m-d'),
                'status' => 'pending', // Bisa juga random: ['pending', 'approved', 'rejected'][array_rand(['pending', 'approved', 'rejected'])],
            ]);
        }
    }
}
                                               
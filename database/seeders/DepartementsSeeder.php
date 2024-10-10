<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementsSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Human Resources',
                'description' => '_',
            ],
            [
                'name' => 'Human Resources',
                'description' => '_',
            ],
        ];
        
       foreach($departments as $departements) {
            Departement::create($departements);
        }
    }
}
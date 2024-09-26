<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //permission untuk mengelola users
    Permission::updateORcreate(['name' => 'show users']);
    Permission::updateORcreate(['name' => 'add users']);
    Permission::updateORcreate(['name' => 'edit users']);
    Permission::updateORcreate(['name' => 'delete users']);

    //permission untuk departements
    Permission::updateORcreate(['name' => 'show departements']);
    Permission::updateORcreate(['name' => 'add departements']);
    Permission::updateORcreate(['name' => 'edit departements']);
    Permission::updateORcreate(['name' => 'delete departements']);


    }
}
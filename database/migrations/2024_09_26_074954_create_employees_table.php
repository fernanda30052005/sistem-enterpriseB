<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('employees')) {
            Schema::create('employees', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id')->unsigned();
                $table->bigInteger('depart_id')->unsigned();
                $table->string('address');
                $table->string('place_of_birth');
                $table->date('dob');
                $table->string('religion');
                $table->string('sex');
                $table->string('phone');
                $table->integer('salary');
                $table->timestamps();
            });
        }
    }
}
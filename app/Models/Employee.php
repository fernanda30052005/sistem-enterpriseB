<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'depart_id',
        'address',
        'place_of_birth',
        'dob',
        'religion',
        'sex',
        'phone',
        'salary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}

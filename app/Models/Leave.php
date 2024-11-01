<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'description', 
        'start_of_date', 
        'end_of_date', 
        'status'
    ];

    // Relationship dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

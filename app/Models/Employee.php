<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id', 
        'departements_id', // pastikan nama kolom ini sesuai dengan di database
        'address', 
        'place_of_birth', 
        'dob', 
        'religion', 
        'sex', 
        'phone', 
        'salary',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Departement
    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departements_id'); // Kolom foreign key yang sesuai
    }
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = [
        'name', 
        'description',
    ];

    // Relasi dengan Employee
    public function employees()
    {
        return $this->hasMany(Employee::class, 'departements_id'); // Foreign key di tabel employees
    }
}

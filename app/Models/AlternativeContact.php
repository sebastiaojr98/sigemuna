<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'degree_of_kinship_id',
        'full_name',
        'phone',
        'employee_id',
        'user_create_id'
    ];

    public function degreeOfKinship()
    {
        return $this->belongsTo(DegreeOfKinship::class, "degree_of_kinship_id", "id");
    }
}

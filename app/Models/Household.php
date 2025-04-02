<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
            'degree_of_kinship_id',
            'birth',
            'profession',
            'workplace',
            'gender_id',
            'marital_status_id',
            'document',
            'employee_id',
            'user_create_id'
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class, "gender_id", "id");
    }

    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class, "marital_status_id", "id");
    }

    public function degreeOfKinship()
    {
        return $this->belongsTo(DegreeOfKinship::class, "degree_of_kinship_id", "id");
    }
}

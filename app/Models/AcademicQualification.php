<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicQualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'academic_level',
        'conclusion_year',
        'course',
        'country_of_training_id',
        'document',
        'educational_institution',
        'employee_id',
        'user_create_id'
    ];

    public function country()
    {
        return $this->belongsTo(Nationality::class, "country_of_training_id", "id");
    }
}

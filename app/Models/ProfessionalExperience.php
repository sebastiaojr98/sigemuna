<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer',
        'function_performed',
        'begin',
        'finish',
        'document',
        'employee_id',
        'user_create_id'
    ];
}

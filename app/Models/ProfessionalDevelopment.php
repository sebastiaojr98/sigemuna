<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalDevelopment extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'process_code',
        'position_company_id',
        'category',
        'dispatch_process',
        'dispatch_date',
        'visa_date',
        'begin',
        'finish',
        'document',
        'employee_id',
        'user_create_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, "department_id", "id");
    }

    public function positionCompany()
    {
        return $this->belongsTo(PositionCompany::class, "position_company_id", "id");
    }
}

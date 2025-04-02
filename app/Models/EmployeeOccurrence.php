<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeOccurrence extends Model
{
    use HasFactory;

    protected $fillable = [
        "start_date",
        "end_date",
        "description",
        "status",
        "employee_id",
        "document",
        "user_id"
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiring extends Model
{
    use HasFactory;

    protected $fillable = [
        'process_code',
        'dispatch',
        'dispatch_date',
        'visa_date',
        'document',
        'start_of_functions',
        'employee_id',
        'user_create_id'
    ];
}

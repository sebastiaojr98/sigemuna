<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefinitiveAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'process_code',
        'dispatch',
        'dispatch_date',
        'visa_date',
        'document',
        'employee_id',
        'user_create_id'
    ];
}

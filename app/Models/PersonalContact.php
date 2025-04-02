<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_contact_id',
        'contact',
        'employee_id',
        'user_create_id'
    ];

    public function typeContact()
    {
        return $this->belongsTo(TypeContact::class, "type_contact_id", "id");
    }
}

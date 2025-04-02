<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DegreeOfKinship extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
    ];
}

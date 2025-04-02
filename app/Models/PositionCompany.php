<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}

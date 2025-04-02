<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'birth',
        'profession',
        'workplace',
        'document',
        'nationality_id',
        'employee_id',
        'user_create_id'
    ];

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, "nationality_id", "id");
    }
}

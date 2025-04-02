<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfrastructureHistoryFile extends Model
{
    use HasFactory;

    protected $fillable = [
        "path", 
        "infrastructure_history_id"
    ];
}

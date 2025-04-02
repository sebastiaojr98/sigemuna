<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfrastructureHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_date',
        'begin',
        'end',
        'responsible_technician',
        'activities_performed',
        'infrastructure_id',
        "user_id"
    ];

    public function files()
    {
        return $this->hasMany(InfrastructureHistoryFile::class, "infrastructure_history_id", "id");
    }

    public function infrastructure()
    {
        return $this->belongsTo(Infrastructure::class, "infrastructure_id", "id");
    }
}

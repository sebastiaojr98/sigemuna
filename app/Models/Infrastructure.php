<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'code',
        'status',
        'image',
        'infrastructure_type_id',
        'neighborhood_id',
        'description',
        "user_id"
    ];
    
    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class, "neighborhood_id", "id");
    }

    public function infrastructureType()
    {
        return $this->belongsTo(InfrastructureType::class, "infrastructure_type_id", "id");
    }


    public function histories()
    {
        return $this->hasMany(InfrastructureHistory::class, "infrastructure_id", "id");
    }
}

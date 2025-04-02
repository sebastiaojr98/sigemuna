<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunalUnity extends Model
{
    use HasFactory;

    protected $fillable = [
        "label",
        "neighborhood_id"
    ];

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class, "neighborhood_id", "id");
    }
}

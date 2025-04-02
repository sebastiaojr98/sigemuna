<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;

    protected $fillable =[
        "label",
        "amount",
        "service_id"
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, "service_id", "id");
    }
}

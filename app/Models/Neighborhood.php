<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    use HasFactory;

    protected $fillable = [
        "label",
        "administrative_post_id"
    ];

    public function administrativePost()
    {
        return $this->belongsTo(AdministrativePost::class, "administrative_post_id", "id");
    }
}

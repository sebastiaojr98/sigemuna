<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'administrative_post_id',
        'neighborhood_id',
        'communal_unity_id',
        'house_number',
        'block_number',
        'document',
        'employee_id',
        'user_create_id'
    ];

    public function administrativePost()
    {
        return $this->belongsTo(AdministrativePost::class, "administrative_post_id", "id");
    }

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class, "neighborhood_id", "id");
    }

    public function communalUnity()
    {
        return $this->belongsTo(CommunalUnity::class, "communal_unity_id", "id");
    }
}

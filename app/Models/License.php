<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'service_contracted_id',
        'customer_id',
        'car_brand',
        'car_model',
        'car_registration',
        'house_number',
        'block',
        'communal_unit_id',
        'issue_date',
        'due_date',
        'status',
    ];

    public function serviceContracted()
    {
        return $this->belongsTo(ServiceContracted::class, 'service_contracted_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function communalUnit()
    {
        return $this->belongsTo(CommunalUnity::class, 'communal_unit_id');
    }
}

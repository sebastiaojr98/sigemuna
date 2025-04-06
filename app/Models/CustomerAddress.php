<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'neighborhood_id',
        'street',
        'number',
        'user_create_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

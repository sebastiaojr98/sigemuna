<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;

    protected $fillable = [
        'investor_type_id',
        'name',
        'address',
        'city',
        'state',
        'country',
        'phone',
        'email',
        'site',
        'user_id',
    ];

    public function investorType()
    {
        return $this->belongsTo(TypeInvestor::class, "investor_type_id", "id");
    }
}

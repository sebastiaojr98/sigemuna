<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'process_number',
        'investor_id',
        'amount',
        'start_date',
        'end_date',
        'return_rate',
        'status',
        'description',
        'document',
        'user_id',
    ];

    public function investor()
    {
        return $this->belongsTo(Investor::class, "investor_id", "id");
    }
    
}

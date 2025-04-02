<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financing extends Model
{
    use HasFactory;

    protected $fillable = [
        'process_number',
        'financier_id',
        'amount',
        'start_date',
        'end_date',
        'interest_rate',
        'status',
        'description',
        'document',
        'user_id',
    ];

    public function financier()
    {
        return $this->belongsTo(Financier::class, "financier_id", "id");
    }
}

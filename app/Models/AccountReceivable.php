<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountReceivable extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'amount_due',
        'amount_paid',
        'status',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'number',
        'type',
        'total_amount',
        'due_date',
        'service_contracted_id',
        'description'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function accountsReceivable()
    {
        return $this->hasMany(AccountReceivable::class);
    }

    public function fines()
    {
        return $this->hasMany(Fine::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

    public function serviceContracted(): BelongsTo
    {
        return $this->belongsTo(ServiceContracted::class, 'service_contracted_id', 'id');
    }
}

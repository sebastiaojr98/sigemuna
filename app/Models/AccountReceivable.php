<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountReceivable extends Model
{
    use HasFactory;

    protected $table = "accounts_receivable";

    protected $fillable = [
        'invoice_id',
        'customer_id',
        'amount_due',
        'amount_paid',
        'due_date',
        'invoice_number',
        'status',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

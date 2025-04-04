<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccountPayable extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_id',
        'amount_due',
        'amount_paid',
        'payment_date',
        'due_date',
        'status',
    ];

    public function expense(): BelongsTo
    {
        return $this->belongsTo(Expense::class, 'expense_id');
    }
}

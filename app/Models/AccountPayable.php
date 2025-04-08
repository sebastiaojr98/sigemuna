<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AccountPayable extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_id',
        'supplier_id',
        'amount_due',
        'amount_paid',
        'due_date',
        'status',
    ];

    public function expense(): BelongsTo
    {
        return $this->belongsTo(Expense::class, 'expense_id');
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function supplierPayment(): HasMany
    {
        return $this->hasMany(SupplierPayment::class, 'account_payable_id', 'id');
    }
}

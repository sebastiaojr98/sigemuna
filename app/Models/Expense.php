<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'supplier_id',
        'amount',
        'start_date',
        'is_recurring',
        'frequency',
        'description',
        'user_create_id'
    ];
    
    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'category_id');
    }
    
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}

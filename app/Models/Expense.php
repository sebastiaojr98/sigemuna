<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'type_expense_id',
        'amount',
        'expense_date',
        'description',
        'document',
        'user_create_id'
    ];


    //chart

    public function typeExpense()
    {
        return $this->belongsTo(TypeExpense::class, "type_expense_id", "id");
    }

}

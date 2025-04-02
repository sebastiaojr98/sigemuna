<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankingDomicile extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_card_issue_id',
        'account_number',
        'nib',
        'card_number',
        'validity',
        'employee_id',
        'user_create_id'
    ];

    public function bankCardIssue()
    {
        return $this->belongsTo(BankCardIssuer::class, "bank_card_issue_id", "id");
    }
}

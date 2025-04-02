<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalRevenue extends Model
{
    use HasFactory;

    protected $fillable = [
        "amount",
        "form_payment_id",
        "process_number",
        "type_revenue_id",
        'description',
        "client_id",
        'user_create_id',
        'user_pay_id',
        'document',
        'revenue_date',
        'payday',
        'status',
        "reference",
    ];

    public function client(){
        return $this->belongsTo(Client::class, "client_id", "id");
    }

    public function typeRevenue(){
        return $this->belongsTo(TypeRevenue::class, "type_revenue_id", "id");
    }

    public function form_payment(){
        return $this->belongsTo(FormPayment::class);
    }

    public function user_create(){
        return $this->belongsTo(User::class, 'user_create_id', 'id');
    }

    public function user_pay(){
        return $this->belongsTo(User::class, 'user_pay_id', 'id');
    }
}
